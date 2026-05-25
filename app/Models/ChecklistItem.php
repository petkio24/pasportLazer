<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $fillable = ['name', 'description', 'order', 'is_active'];

    public function logs()
    {
        return $this->hasMany(ChecklistLog::class)->latest('checked_at');
    }

    public function lastLog()
    {
        return $this->hasOne(ChecklistLog::class)->latest('checked_at');
    }
}
