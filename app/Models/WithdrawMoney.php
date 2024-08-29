<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawMoney extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'withdraw_money';
    protected $guarded = [];
}
