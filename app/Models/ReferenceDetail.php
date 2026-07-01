<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceDetail extends Model
{
    protected $fillable = [

        'reference_header_id',

        'flag',

        'gender',

        'begin_age',

        'end_age',

        'reference_value',

        'lower_limit',

        'upper_limit'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function header()
    {
        return $this->belongsTo(
            ReferenceHeader::class,
            'reference_header_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER
    |--------------------------------------------------------------------------
    */

    public function getBeginAgeTextAttribute()
    {

        return

            substr($this->begin_age,0,3)

            ." Tahun "

            .substr($this->begin_age,3,2)

            ." Bulan "

            .substr($this->begin_age,5,2)

            ." Hari";

    }

    public function getEndAgeTextAttribute()
    {

        return

            substr($this->end_age,0,3)

            ." Tahun "

            .substr($this->end_age,3,2)

            ." Bulan "

            .substr($this->end_age,5,2)

            ." Hari";

    }

    /**
 * Menentukan Flag berdasarkan hasil numeric
 */
public static function getFlag($headerId, $gender, $age, $result)
{
    $reference = self::where('reference_header_id', $headerId)

        ->where(function ($q) use ($gender) {

            $q->where('gender', $gender)
              ->orWhere('gender', 'ALL');

        })

        ->where('begin_age', '<=', $age)

        ->where('end_age', '>=', $age)

        ->orderByRaw("
            CASE gender
                WHEN '{$gender}' THEN 1
                ELSE 2
            END
        ")

        ->get();

    foreach ($reference as $row) {

        if (
            $row->lower_limit !== null &&
            $row->upper_limit !== null
        ) {

            if (
                $result >= $row->lower_limit &&
                $result <= $row->upper_limit
            ) {

                return $row;
            }

        }

    }

    return null;
}

}