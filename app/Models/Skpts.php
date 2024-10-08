<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skpts extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $table = 'skpts';
    protected $guarded = [
        "id",
    ];

    public function kutipan(): HasMany
    {
        return $this->hasMany(Kutipan::class);
    }
}
