<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $fillable = [

        'method_code',

        'method_name',

        'is_active'

    ];

    public function analyzerMappings()
{
    return $this->hasMany(
        AnalyzerTestMapping::class
    );
}

public function referenceRanges()
{
    return $this->hasMany(
        ReferenceRange::class
    );
}
}