<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['slider_image', 'slider_title' , 'slider_desc','slider_url','user_id'];
    function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
