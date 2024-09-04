<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;
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
        try {
            if (Auth::guard('admin')->attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {
                if (Auth::guard('admin')->user()->status == 1) {
                    return redirect()->route('admin.dashboard.index');
                } else {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('messageError', 'Bạn không có quyền truy cập');;
                }
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());      
            return redirect()->route('admin.login')->with('messageError',  config('message.login_failed'))->withInput();
        }
    }

    public function getLogOut()
    {
        if (Auth::guard('admin')) {
            return redirect()->route('admin.login');
        }
        return redirect()->route('admin.login');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }

}
