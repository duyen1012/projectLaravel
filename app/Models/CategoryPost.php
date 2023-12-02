<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    public function catPostChild() {
        return $this->hasMany(CategoryPost::class, 'parent_id');
    }

    public function catPostParent() {
        return $this->belongsTo(CategoryPost::class, 'parent_id');
    }
}
