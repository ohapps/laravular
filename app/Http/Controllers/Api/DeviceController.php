<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Device;

class DeviceController extends BaseController
{
    /**
    * Display a listing of the resource.
    *
    * @method GET
    * @return Response
    */
    public function index()
    {
        return $this->user->devices;
    }

    /**
    * Store a newly created resource in storage.
    *
    * @method POST
    * @return Response
    */
    public function store(Request $request)
    {
        $device = new Device;
        $device->name = $request->name;
        $device->os = $request->os;
        $device->user_id = $this->user->id;
        $device->save();
        return $device;
    }

    /**
    * Update the specified resource in storage.
    *
    * @method PUT/PATCH
    * @param  int  $id
    * @return Response
    */
    public function update($id, Request $request)
    {
        $device = $this->getRecordOrFail($id);
        $device->name = $request->name;
        $device->os = $request->os;
        $device->save();
        return $device;
    }

    /**
    * Gets specified record from database or fails and logs error
    *
    * @param  int  $id
    * @return Application
    */
    protected function getRecordOrFail($id)
    {
        $device = $this->user->devices()->where('id',$id)->first();
        if($device == null){
            $this->abortAndLog('invalid device id ' . $id . ' for user ' . $this->user->id);
        }
        return $device;
    }
}
