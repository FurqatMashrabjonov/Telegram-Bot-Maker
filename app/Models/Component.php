<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = ['framework_id', 'name', 'body'];

    public function framework(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Component::class);
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Component::class);
    }
}
