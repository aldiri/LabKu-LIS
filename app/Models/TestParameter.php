<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationDetail;
use App\Models\SampleType;

class TestParameter extends Model
{
    protected $fillable = [

    'test_id',

    'test_type',

    'nama_test',

    'test_group_id',

    'print_group_id',

    'sample_type_id',

    'price',

    'seq',

    'head',

    'bold',

    'italic',

    'is_print'

];
public function testGroup()
{
    return $this->belongsTo(TestGroup::class);
}

public function printGroup()
{
    return $this->belongsTo(PrintGroup::class);
}
public function sampleType()
{
    return $this->belongsTo(SampleType::class);
}

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
