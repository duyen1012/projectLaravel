<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'post_id';
    protected $fillable = ['post_id','post_title','post_slug','post_images', 'post_content','post_status', 'user_id','category_post_id'];

    public function category() {
        return $this->belongsTo(CategoryPost::class, 'category_post_id');
    }
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
