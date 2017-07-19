<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
     public function facilities()
    {
        return $this->belongsToMany('App\Models\Facility', 'facility_recipient', 'recipient_id','facility_id');
    }
}
