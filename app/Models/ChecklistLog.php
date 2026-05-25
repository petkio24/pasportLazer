<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistLog extends Model
{
    protected $fillable = ['checklist_item_id', 'operator_name', 'status', 'comment', 'checked_at'];

    protected $casts = [
        'checked_at' => 'datetime',
        'status' => 'boolean',
    ];

    public function item()
    {
        return $this->belongsTo(ChecklistItem::class, 'checklist_item_id');
    }
}
