<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];
    protected $hidden = [
        'password',
    ];
    
    public function information():HasOne
    {
        return $this->hasOne(UserInformation ::class,'user_id','id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class,'owner_id','id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function following():BelongsToMany
    {
        return $this->belongsToMany(__CLASS__,'followers','user_id','author_id');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(__CLASS__,'followers','author_id','user_id');
    }

    public function likes():BelongsToMany
    {
        return $this->belongsToMany(Post::class,'likes','user_id','post_id');
    }

}
