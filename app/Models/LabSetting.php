<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabSetting extends Model
{
    protected $fillable = [

        'lab_name',

        'address',

        'city',

        'province',

        'postal_code',

        'phone',

        'email',

        'website',

        'director',

        'logo',

        'footer_invoice',

        'footer_result',

        'invoice_prefix',

        'registration_prefix',

        'active'

    ];
}