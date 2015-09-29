<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Device;
use App\Application;
use App\DeviceApplications;

class DeviceApplicationController extends BaseController
{
    /**
    * Store a newly created resource in storage.
    *
    * @method POST
    * @return Response
    */
    public function store(Request $request)
    {
        $device = $this->user->devices()->where('id',$request->device_id)->first();
        if($device == null){
            $this->abortAndLog('invalid device id ' . $request->device_id . ' for user ' . $this->user->id);
        }
        $application = $this->user->applications()->where('id',$request->application_id)->first();
        if($application == null){
            $this->abortAndLog('invalid application id ' . $request->application_id. ' for user ' . $this->user->id);
        }
        $deviceApplication = DeviceApplications::where('application_id',$application->id)->where('device_id',$device->id)->first();
        if( $deviceApplication == null ){
            $deviceApplication = new DeviceApplications;
            $deviceApplication->application_id = $application->id;
            $deviceApplication->device_id = $device->id;
            $deviceApplication->save();
        }
        return $deviceApplication;
    }

    /**
    * Store a newly created resource in storage.
    *
    * @method DELETE
    * @return Response
    */
    public function delete(Request $request)
    {
        $device = $this->user->devices()->where('id',$request->device_id)->first();
        if($device == null){
            $this->abortAndLog('invalid device id ' . $request->device_id . ' for user ' . $this->user->id);
        }
        $application = $this->user->applications()->where('id',$request->application_id)->first();
        if($application == null){
            $this->abortAndLog('invalid application id ' . $request->application_id. ' for user ' . $this->user->id);
        }
        $deletedRows = DeviceApplications::where('application_id',$application->id)
                        ->where('device_id',$device->id)
                        ->delete();
        return $deletedRows;
    }
}
