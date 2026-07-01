<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [

        'unit_code',

        'unit_name',

        'is_active'

    ];

    public function analyzerMappings()
{
    return $this->hasMany(
        AnalyzerTestMapping::class
    );
}
}