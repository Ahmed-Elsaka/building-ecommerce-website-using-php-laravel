<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = "contact";
    protected $fillable =[
        'contact_name', 'contact_email', 'contact_subject', 'contact_message', 'view', 'contact_type'
    ];

}
