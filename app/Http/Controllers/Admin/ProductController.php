<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();

        $products =  Product::orderBy('date_product', 'desc')->get();

        foreach ($products as $imageName) {
            $signedUrl = $defaultBucket->object($imageName->image)->signedUrl(now()->addHours(5));
            $imageName->image = $signedUrl;
        }
        return view('admin.product.list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.form', ['isUpdate' => false]);
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
                $nameImg = 'productnanaytb/' . (string) Str::uuid() . "." . $image->getClientOriginalExtension();
                $dateProduct = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date_product)->format('Y-m-d');
                Product::create([
                    'title' => $request->title,
                    'url' => $request->url,
                    'image' => $nameImg,
                    'videoId' => $request->videoId,
                    'date_product' => $dateProduct,
                    'status' =>  $request->status,
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
            return redirect()->route('admin.product.index')->with('messageSuccess', config('message.create_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.product.create')->with('messageError', config('message.create_error'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) return redirect()->route('admin.product.index')->with('messageError', config('message.data_not_found'));


        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();
        $product->image = $defaultBucket->object($product->image)->signedUrl(now()->addHours(5));

        return view('admin.product.form', ['product' => $product, 'isUpdate' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);
            if (!$product) return redirect()->route('admin.product.index')->with('messageError', config('message.data_not_found'));

            $oldPath = $product->image;
            $data = $request->all();

            if ($request->has('date_product')) {
                $data['date_product'] = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date_product)->format('Y-m-d');
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameImg = 'productnanaytb/' . (string) Str::uuid() . "." . $image->getClientOriginalExtension();
                $data['image'] = $nameImg;
            }
            unset($data['imageCheck']);
            $product->fill($data)->save();

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

            return redirect()->route('admin.product.index')->with('messageSuccess', config('message.update_success'));
        } catch (Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->route('admin.product.update', $id)->with('messageError', config('message.update_failed'));
        }
    }

    public function destroy(string $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            if (!$product) return redirect()->route('admin.product.index')->with('messageError', config('message.data_not_found'));

            $oldPath = $product->image;
            DB::beginTransaction();
            $product->delete();
            DB::commit();

            // Delete image in firestorage
            $imageReference = app('firebase.storage')->getBucket()->object($oldPath);
            if ($imageReference->exists()) $imageReference->delete();
            return redirect()->route('admin.product.index')->with('messageSuccess', config('message.delete_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.product.update', ['id' => $product->id])->with('messageError', config('message.delete_error'));
        }
    }

    public function postStatus($id)
    {
        $product = Product::where('id', $id)->first();
        if (!$product) return back()->with('messageError', config('message.data_not_found'));
        try {
            DB::beginTransaction();
            $product->status = ($product->status == 2 ? 1 : 2);
            $product->save();
            DB::commit();
            return redirect()->route('admin.product.index')->with('messageSuccess', config('message.status_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.product.index')->with('messageError', config('message.status_error'));
        }
    }
}
