<?php

namespace App\Services;

use App\Models\ReferenceHeader;

class ReferenceService
{
    public static function findReference(
        $testParameterId,
        $methodId,
        $gender,
        $age,
        $result
    )
    {
        $header = ReferenceHeader::with('details')
            ->where('test_parameter_id', $testParameterId)
            ->where('method_id', $methodId)
            ->first();

        if (!$header) {
            return null;
        }

        $details = $header->details
            ->whereIn('gender', [$gender, 'ALL'])
            ->filter(function ($item) use ($age) {
                return $age >= $item->begin_age &&
                       $age <= $item->end_age;
            });

        foreach ($details as $detail) {

            if (
                $detail->lower_limit !== null &&
                $detail->upper_limit !== null &&
                $result >= $detail->lower_limit &&
                $result <= $detail->upper_limit
            ) {

                return [
                    'flag' => $detail->flag,
                    'reference_value' => $detail->reference_value,
                    'lower_limit' => $detail->lower_limit,
                    'upper_limit' => $detail->upper_limit,
                    'result_format' => $header->result_format,
                ];
            }
        }

        return null;
    }
}