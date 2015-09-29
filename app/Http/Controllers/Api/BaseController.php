<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Log;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        if($request->user()){
            $this->user = $request->user();
        }else{
            $this->abortAndLog('invalid user');
        }
    }

    /**
    * Gets specified record from database or fails and logs error
    *
    * @param  string  $errorMessage
    */
    protected function abortAndLog($errorMessage)
    {
        Log::error($errorMessage);
        abort(500, $errorMessage);
    }

    /**
    * Display the specified resource.
    *
    * @method GET
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
        $record = $this->getRecordOrFail($id);
        return $record;
    }

    /**
    * Remove the specified resource from storage.
    *
    * @method DELETE
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        $record = $this->getRecordOrFail($id);
        $record->delete();
    }

    /**
    * Place holder function that should be defined by child classes
    *
    * @param  int  $id
    */
    protected function getRecordOrFail($id)
    {
        $this->abortAndLog('find record function not defined: user ' . $this->user->id);
    }
}
