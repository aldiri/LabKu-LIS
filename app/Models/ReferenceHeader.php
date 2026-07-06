<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceHeader extends Model
{
    protected $fillable = [

        'test_parameter_id',

        'method_id',

        'unit_id',

        'result_format',

        'is_active'

    ];

    protected $casts = [

        'is_active' => 'boolean'

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

    public function unit()
    {
        return $this->belongsTo(
            Unit::class
        );
    }

    public function details()
    {
        return $this->hasMany(
            ReferenceDetail::class,
            'reference_header_id'
        );
    }
}