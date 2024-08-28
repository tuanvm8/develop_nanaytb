<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instruction\CreateRequest;
use App\Http\Requests\Instruction\UpdateRequest;
use App\Models\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();
        $instructions = Instruction::orderBy('id', 'DESC')->get();

        foreach ($instructions as $imageName) {
            $signedUrl = $defaultBucket->object($imageName->image)->signedUrl(now()->addHours(5));
            $imageName->image = $signedUrl;
        }

        return view('admin.instruction.list', ['instructions' => $instructions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instruction.form', ['isUpdate' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $image = $request->file('image');
            if (isset($image)) {
                $nameImg = 'instruction/' . (string) Str::uuid() . "." . $image->getClientOriginalExtension();
                Instruction::create([
                    'name' => $request->name,
                    'content' => $request->content,
                    'image' => $nameImg,
                    'slug' => $request->slug,
                    'status' =>  $request->status,
                    'user_id' => $request->user_id,
                ]);
            }
            DB::commit();
            $storage = app('firebase.storage');
            $defaultBucket = $storage->getBucket();
            $pathName = $image->getPathName();
            $file = fopen($pathName, 'r');
            $defaultBucket->upload($file, [
                'name' => $nameImg,
            ]);
            return redirect()->route('admin.instruction.index')->with('messageSuccess', config('message.create_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.instruction.create')->with('messageError', config('message.create_error'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $instruction = Instruction::where('id', $id)->first();
        if (!$instruction) return redirect()->route('admin.instruction.index')->with('messageError', config('message.data_not_found'));

        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();
        $instruction->image = $defaultBucket->object($instruction->image)->signedUrl(now()->addHours(5));

        return view('admin.instruction.form', ['instruction' => $instruction, 'isUpdate' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $instruction = Instruction::findOrFail($id);
            if (!$instruction) {
                return redirect()->route('admin.instruction.index')->with('messageError', config('message.data_not_found'));
            }

            $oldPath = $instruction->image;
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameImg = 'instruction/' . (string) Str::uuid() . "." . $image->getClientOriginalExtension();
                $data['image'] = $nameImg;
            }
            unset($data['imageCheck']);
            $instruction->fill($data)->save();

            DB::commit();

            if ($request->hasFile('image')) {
                $storage = app('firebase.storage');
                $defaultBucket = $storage->getBucket();
                $pathName = $image->getPathName();
                $file = fopen($pathName, 'r');
                $defaultBucket->upload($file, [
                    'name' => $nameImg
                ]);

                // Delete image in firestorage
                $imageReference = $defaultBucket->object($oldPath);
                if ($imageReference->exists()) {
                    $imageReference->delete();
                }
            }

            return redirect()->route('admin.instruction.index')->with('messageSuccess', config('message.create_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.instruction.update', ['id' => $instruction->id])->with('messageError', config('message.update_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instruction = Instruction::where('id', $id)->first();
        if (!$instruction) return redirect()->route('admin.instruction.index')->with('messageError', config('message.data_not_found'));
        try {
            $oldPath = $instruction->image;
            DB::beginTransaction();
            $instruction->delete();
            DB::commit();

            // Delete image in firestorage
            $imageReference = app('firebase.storage')->getBucket()->object($oldPath);
            if ($imageReference->exists()) $imageReference->delete();
            return redirect()->route('admin.instruction.index')->with('messageSuccess', config('message.delete_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.instruction.update', ['id' => $instruction->id])->with('messageError', config('message.delete_error'));
        }
    }

    public function postStatus($id)
    {
        $instruction = Instruction::where('id', $id)->first();
        if (!$instruction) return back()->with('messageError', config('message.data_not_found'));
        try {
            DB::beginTransaction();
            $instruction->status = ($instruction->status == 1 ? 2 : 1);
            $instruction->save();
            DB::commit();
            return redirect()->route('admin.instruction.index')->with('messageSuccess', config('message.status_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.instruction.index')->with('messageError', config('message.status_error'));
        }
    }
}
