<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleType extends Model
{
    protected $fillable = [

    'sample_id',

    'barcode_code',

    'sample_name',

    'tube_color',

    'description'

];

    public function testParameters()
    {
        return $this->hasMany(TestParameter::class);
    }
    public function registrationSamples()
{
    return $this->hasMany(
        RegistrationSample::class
    );
}

public function sampleType()
{
    return $this->belongsTo(SampleType::class);
}
}