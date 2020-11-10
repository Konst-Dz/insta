<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'friend_id'

    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function myFriends()
    {
        return $this->belongsTo('App\Models\User','friend_id','id');
    }

}
