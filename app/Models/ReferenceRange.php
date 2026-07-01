<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceRange extends Model
{
    protected $fillable = [

        'test_parameter_id',

        'method_id',

        'result_format',

        'gender',

        'flag',

        'begin_age',

        'end_age',

        'reference_value',

        'batas_awal',

        'batas_akhir',

        'is_active'

    ];

    public function testParameter()
    {
        return $this->belongsTo(
            TestParameter::class
        );
    }

    public function method()
    {
        return $this->belongsTo(
            Method::class
        );
    }
}