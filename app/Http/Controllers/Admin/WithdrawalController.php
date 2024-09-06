<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserStatusChanged;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Models\WithdrawMoney;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $withdRawMoneys = WithdrawMoney::with('user')->get();
        return view('admin.withdraw.list', ['withdRawMoneys' => $withdRawMoneys]);
    }
}
