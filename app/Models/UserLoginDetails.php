<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoginDetails extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','login_date','login_time','lunch_time_start','lunch_time_end','logout_time'];
}
