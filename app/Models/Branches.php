<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branches extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    use HasFactory;

    protected $fillable = ['name', 'manegere', 'phone'];

    public function centers(){
        return  $this->hasMany('App\Models\Centers','branches_id');
       }
   
}

