<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'karyawan';
    protected $guarded = ['id'];
    public function kutipan(): HasMany
    {
        return $this->hasMany(Kutipan::class, 'nik_sap');
    }
}
