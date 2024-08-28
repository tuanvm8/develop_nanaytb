<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class DashboardController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) return redirect()->route('admin.dashboard.index');
        return view('admin.dashboard.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.login')->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        
        if (Auth::guard('admin')->attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {
            if(Auth::guard('admin')->user()->status == 1 ) {
                return redirect()->route('admin.dashboard.index');
            } else {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('messageError', 'Bạn không có quyền truy cập');;
            }   
        }
        return redirect()->route('admin.login')->with('messageError',  config('message.login_failed'))->withInput();
    }

    public function getLogOut()
    {
        if ( Auth::guard('admin')) {
            return redirect()->route('admin.login');
        }
        return redirect()->route('admin.login');
    }

    public function getData() {
        return view('admin.dashboard.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        return view('admin.dashboard.index');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
