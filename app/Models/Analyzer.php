<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analyzer extends Model
{
    protected $fillable = [

        'analyzer_code',

        'analyzer_name',

        'category',

        'manufacturer',

        'is_active'

    ];

    public function mappings()
{
    return $this->hasMany(
        AnalyzerTestMapping::class
    );
}
}