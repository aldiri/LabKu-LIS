<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationSample extends Model
{
    protected $fillable = [

        'registration_id',

        'sample_type_id',

        'sample_no',

        'barcode',

        'status',

        'collector',

        'collection_time',

        'received_time'

    ];

    public function registration()
    {
        return $this->belongsTo(
            Registration::class
        );
    }

    public function sampleType()
    {
        return $this->belongsTo(
            SampleType::class
        );
    }

    public function details()
{
    return $this->hasMany(
        RegistrationDetail::class
    );
}
}