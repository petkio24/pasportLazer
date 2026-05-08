<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['number', 'title', 'content', 'parent_id', 'level', 'order'];

    public function children()
    {
        return $this->hasMany(Chapter::class, 'parent_id')->orderBy('order');
    }

    public function parent()
    {
        return $this->belongsTo(Chapter::class, 'parent_id');
    }
}
