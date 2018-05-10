<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BUPhotos extends Model
{
    protected $table = "BuildingPhotos";
    protected $fillable =[
        'bu_id', 'photo_name',
    ];
}
