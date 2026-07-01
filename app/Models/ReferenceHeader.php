<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceHeader extends Model
{
    protected $fillable = [

        'test_parameter_id',

        'method_id',

        'result_format',

        'is_active'

    ];

    protected $casts = [

        'is_active' => 'boolean'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

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

    public function details()
{
    return $this->hasMany(ReferenceDetail::class)
        ->orderByRaw("
            CASE flag
                WHEN 'NORMAL' THEN 1
                WHEN 'LOW' THEN 2
                WHEN 'HIGH' THEN 3
                WHEN 'XLOW' THEN 4
                WHEN 'XHIGH' THEN 5
            END
        ")
        ->orderBy('gender')
        ->orderBy('begin_age');
}
}