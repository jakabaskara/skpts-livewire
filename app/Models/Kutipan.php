<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kutipan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $table = "kutipan";
    protected $guarded = [
        "id",
    ];
    public function skpts(): BelongsTo
    {
        return $this->belongsTo(Skpts::class);
    }
    public function karaywan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'nik_sap');
    }
}
