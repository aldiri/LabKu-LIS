<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestGroup extends Model
{
   protected $fillable = [
    'group_code',
    'group_name',
    'seq'
];
}
