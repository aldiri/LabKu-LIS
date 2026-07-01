<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'kode_dokter',
        'nama',
        'spesialis',
        'no_telp',
        'email'
    ];
public function registrations()
{
    return $this->hasMany(Registration::class);
}
    }
