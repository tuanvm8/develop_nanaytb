<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\WithdrawMoney;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class WithdrawMoneyController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('user.withdraw_money');
        } else {
            return redirect()->route('home');
        }
    }


    public function post(Request $request)
    {
        if (Auth::check()) {

            $messages = [
                'point.required' => 'Số tiền không được để trống.',
                'point.numeric' => 'Số tiền phải là một số.',
                'point.min' => 'Số tiền rút ít nhất là 200.000.',
                'point.max' => 'Số tiền không được vượt quá 11 chữ số.',
                'account_number.required' => 'Số tài khoản không được để trống.',
                'account_number.numeric' => 'Số tài khoản phải là một số.',
                'account_number.digits_between' => 'Số tài khoản phải là số và có từ 3 đến 30 ký tự.',
                'name_bank.required' => 'Tên ngân hàng không được để trống.',
                'name_bank.max' => 'Tên ngân hàng không được vượt quá 255 ký tự.',
                'branch.required' => 'Chi nhánh không được để trống.',
                'branch.max' => 'Chi nhánh không được vượt quá 255 ký tự.',
                'introducee.max' => 'Người giới thiệu không được vượt quá 255 ký tự.',
            ];

            $request->validate([
                'point' => 'required|numeric|min:200000|max:99999999999',
                'account_number' => 'required|digits_between:3,30',
                'name_bank' => 'required|max:255',
                'branch' => 'required|max:255',
                'introducee' => 'nullable|max:255',
            ], $messages);

            $user = Auth::user();
            $cash = $user->point;
            $text = 'Số tiền không đủ để thực hiện yêu cầu.';
            if ($user->point >= 200000 && $user->point >= $request->point) {
                $items = new \App\Models\WithdrawMoney();
                $items->user_id = $user->id;
                $items->point = $request->point;
                $items->account_number = $request->account_number;
                $items->name_bank = $request->name_bank;
                $items->branch = $request->branch;
                $items->save();
                $cash -= $request->point;
                User::where('id', $user->id)->update(['point' => $cash]);
                $text = 'Gửi yêu cầu rút tiền thành công.';
            }

            return back()->withErrors([
                'msg' => $text
            ]);
        } else {
            return back()->withErrors([
                'msg' => 'Bạn cần đăng nhập để thực hiện rút tiền.',
            ]);
        }
    }
}
