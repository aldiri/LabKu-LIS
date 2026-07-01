<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TestParameter;
use App\Models\Registration;

class RegistrationDetail extends Model
{
   protected $fillable = [

    'registration_id',

    'registration_sample_id',

    'test_parameter_id',

    'price',

    'status'

];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function testParameter()
    {
        return $this->belongsTo(TestParameter::class);
    }

    public function registrationSample()
{
    return $this->belongsTo(
        RegistrationSample::class
    );
}

}