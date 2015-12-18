<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $timestamps = false;

    public function populateDevices(){        
        $this->devices = $this->belongsToMany('App\Device','device_applications')->get();
    }
}
