<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
    'norm',
    'nama',
    'jenis_kelamin',
    'tanggal_lahir',
    'alamat'
];  
public function registrations()
{
    return $this->hasMany(Registration::class);
}
}
