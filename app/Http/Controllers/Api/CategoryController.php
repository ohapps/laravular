<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends BaseController
{
    /**
    * Display a listing of the resource.
    *
    * @method GET
    * @return Response
    */
    public function index()
    {
        return $this->user->categories;
    }

    /**
    * Store a newly created resource in storage.
    *
    * @method POST
    * @return Response
    */
    public function store(Request $request)
    {
        $category = new Category;
        $category->description = $request->description;
        $category->user_id = $this->user->id;
        $category->save();
        return $category;
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
        $category = $this->getRecordOrFail($id);
        $category->description = $request->description;
        $category->save();
        return $category;
    }

    /**
    * Gets specified record from database or fails and logs error
    *
    * @param  int  $id
    * @return Application
    */
    protected function getRecordOrFail($id)
    {
        $category = $this->user->categories()->where('id',$id)->first();
        if($category == null){
            $this->abortAndLog('invalid category id ' . $id . ' for user ' . $this->user->id);
        }
        return $category;
    }
}
