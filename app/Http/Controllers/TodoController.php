<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TodoRepositories;
use App\Models\Todo;
use  App\Http\Requests\CreateTodoRequest;

class TodoController extends Controller
{


    public function __construct()
    {
        $this->todoRepo = new TodoRepositories();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = $this->todoRepo->IndexData($request->all());
        return response()->json($res, $res['code']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createAction(CreateTodoRequest $request)
    {
        $payload =$request->all();
        $res = $this->todoRepo->CreateData($payload);
        return response()->json($res,$res['code']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function readAction($id)
    {
        $res = $this->todoRepo->ReadDataById($id);
        return response()->json($res, $res['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAction(Request $request, $id)
    {
        $payload = $request->all();
        $res = $this->todoRepo->UpdateData($id,$payload);
        return response()->json($res, $res['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAction($id)
    {
        $res = $this->todoRepo->delete($id);
        return response()->json($res, $res['code']);
    }
}
