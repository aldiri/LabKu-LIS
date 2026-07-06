<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyzerTestMapping extends Model
{
    protected $fillable = [

        'analyzer_id',

        'test_parameter_id',

        'method_id',

        'is_active'

    ];

    protected $casts = [

        'is_active' => 'boolean'

    ];

    public function analyzer()
    {
        return $this->belongsTo(Analyzer::class);
    }

    public function testParameter()
    {
        return $this->belongsTo(TestParameter::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }
}