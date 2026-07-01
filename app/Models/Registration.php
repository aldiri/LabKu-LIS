<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationDetail;
use App\Models\RegistrationSample;

class Registration extends Model
{
    protected $fillable = [
        'no_reg',
        'patient_id',
        'doctor_id',
        'status'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function details()
{
    return $this->hasMany(
        RegistrationDetail::class
    );
}
public function samples()
{
    return $this->hasMany(
        RegistrationSample::class
    );
}
}