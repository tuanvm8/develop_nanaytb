<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserClient extends Controller
{

    public function index()
    {
        return view('user.login');
    }
    public function postLogin(Request $request)
    {
        $messages = [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá :max ký tự.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá :max ký tự.',
        ];

        $request->validate([
            'email' => 'required|email|max:150',
            'password' => 'required|min:6|max:50',
        ], $messages);

        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 2])) {
                if ($request->login == 2) {
                    return redirect()->route('today_video');
                } else if ($request->login == 4 && $request->id) {
                    return redirect()->route('watch_videos', ['id' => $request->id]);
                } else {
                    return redirect()->route('home');
                }
            }

            return back()->withErrors([
                'msg' => 'Email hoặc mật khẩu không đúng, hoặc tài khoản của bạn chưa được kích hoạt.',
                'email' => $request->email,
                'password' => $request->password,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function indexRegister(Request $request)
    {
        return view('user.register');
    }

    public function postRegister(Request $request)
    {
        $messages = [
            'ho_ten.required' => 'Họ tên là bắt buộc.',
            'ho_ten.min' => 'Họ tên phải có ít nhất :min ký tự.',
            'ho_ten.max' => 'Họ tên không được vượt quá :max ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'email.max' => 'Email không được vượt quá :max ký tự.',
            'dien_thoai.required' => 'Số điện thoại là bắt buộc.',
            'dien_thoai.unique' => 'Số điện thoại đã tồn tại.',
            'dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số.',
            'mat_khau.required' => 'Mật khẩu là bắt buộc.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'mat_khau.max' => 'Mật khẩu không được vượt quá :max ký tự.',
            'mat_khau2.required' => 'Xác nhận mật khẩu là bắt buộc.',
            'mat_khau2.same' => 'Xác nhận mật khẩu không khớp.',
        ];

        $request->validate([
            'ho_ten' => 'required|min:5|max:50',
            'email' => 'required|email|max:150|unique:m_user,email',
            'dien_thoai' => 'required|regex:/^0[0-9]{9}$/|unique:m_user,phone',
            'mat_khau' => 'required|min:6|max:50',
            'mat_khau2' => 'required|same:mat_khau',
        ], $messages);

        try {
            DB::beginTransaction();
            
            $user = new \App\Models\User();
            $user->username = $request->ho_ten;
            $user->email = $request->email;
            $user->phone = $request->dien_thoai;
            $user->password = Hash::make($request->mat_khau);
            $user->save();
            
            DB::commit();

            return redirect()->route('home')->with('messageSuccess', config('message.create_success'));
        } catch (\Throwable $th) {
            DB::rollBack(); 
            return redirect()->back()->withErrors(['msg' => 'Có lỗi xảy ra. Vui lòng thử lại sau.']);
        }
    }
}
