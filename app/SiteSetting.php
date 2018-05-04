<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = "siteSetting";

    protected $fillable = [
        'slug', 'namesetting', 'value','type',
    ];
}
