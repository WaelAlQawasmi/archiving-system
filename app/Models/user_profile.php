<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'berthday',
        'position',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');

    }

}
