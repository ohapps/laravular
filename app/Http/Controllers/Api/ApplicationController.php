<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Application;

class ApplicationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @method GET
     * @return Response
     */
    public function index()
    {
        return $this->user->applications;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @method POST
     * @return Response
     */
    public function store(Request $request)
    {
        $application = new Application;
        $application->name = $request->name;
        $application->portable = $request->portable;
        $application->category_id = $request->category_id;
        $application->user_id = $this->user->id;
        $application->save();
        return $application;
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
        $application = $this->getRecordOrFail($id);
        $application->name = $request->name;
        $application->portable = $request->portable;
        $application->category_id = $request->category_id;
        $application->save();
        return $application;
    }

    /**
    * Gets specified record from database or fails and logs error
    *
    * @param  int  $id
    * @return Application
    */
    protected function getRecordOrFail($id)
    {
        $application = $this->user->applications()->where('id',$id)->first();
        if($application == null){
            $this->abortAndLog('invalid application id ' . $id . ' for user ' . $this->user->id);
        }
        return $application;
    }
}
