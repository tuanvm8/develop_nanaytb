<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\VeryFileEmailRequest;
use App\Mail\UserMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class ResetPassWordController extends Controller
{
    public function getForgotPassword()
    {
        return view('user.forgot_password');
    }

    public function postForgotPassword(VeryFileEmailRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return redirect()->route('admin.resetPassword.create');
            }

            $user->email_verified_at = Carbon::now();

            $user->forgot_url = Str::random(64);
            $user->save();

            Mail::to($user->email)->send(new UserMail($user->forgot_url, $user->username));

            DB::commit();

            return back()->with('messageSuccess', config('message.send_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.resetPassword.create')->with('messageError', config('message.send_error'));
        }
    }

    public function showResetPasswordForm($forgot_url)
    {
        return view('user.resetPasswords.check-pass-word', ['forgot_url' => $forgot_url]);
    }

    public function submitResetPasswordForm(UpdatePasswordRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::where('forgot_url', $request->forgot_url)->first();
            if (!$user) {
                return redirect()->route('resetPassword.getCreatePass')->with('messageError', 'Link không hợp lệ hoặc đã hết hạn.');
            }
            $user->password = Hash::make($request->password);
            $user->forgot_url = null;
            $user->save();

            DB::commit();

            return redirect()->route('login.index')->with('messageSuccess', 'Mật khẩu đã được thay đổi thành công.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);

            return redirect()->route('resetPassword.getCreatePass')->with('messageError', 'Đã có lỗi xảy ra, vui lòng thử lại.');
        }
    }
}
