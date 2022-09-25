<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centers extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'manegere', 'phone','branches_id'];

    public function branch()
    {
        return  $this->belongsTo('App\Models\Branches', 'branches_id');
    }
}
