<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body'];

    public function framework(){
        return $this->belongsTo(Component::class);
    }

    public function language(){
        return $this->belongsTo(Component::class);
    }
}
