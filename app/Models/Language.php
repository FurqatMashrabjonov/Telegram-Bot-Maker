<?php

namespace App\Models;

use App\Enums\LanguageStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'key', 'extension'];

    public function frameworks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Framework::class);
    }

}
