<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchVideoHistory extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'watch_video_history';
    protected $guarded = [];
}
