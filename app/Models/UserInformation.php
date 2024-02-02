<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'birthday'=>'datetime:d-m-Y'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,"user_id",'id');
    }
}
