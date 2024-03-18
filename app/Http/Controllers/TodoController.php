<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todo_list = Todo::where('users_id', Auth::user()->id)->get();

        if(empty($todo_list)) {
            return response()->json([
                'msg' => 'No todo',
            ]);
        } else {
            return response()->json([
                "data" => $todo_list
            ], 200);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validators = Validator::make($request->all(), [
            "todo" => "required"
        ]);
        if ($validators->fails()) {
            return response()->json([
                'msg' => 'Error validation',
                'error' => $validators->errors()
            ],422);
        }
        $todo = Todo::create([
            'todo' => $request->get('todo'),
            'status' => 'unfinish',
            'users_id' => Auth::user()->id
        ]);
        
        return response()->json([
            "msg" => "Todo berhasil ditambah",
            "data" => $todo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todo_list = Todo::where('id', $id)->first();

        if(empty($todo_list)) {
            return response()->json([
                'msg' => 'No todo',
            ]);
        } else {
            return response()->json([
                "data" => $todo_list
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $todo_list = Todo::where('id',$request->get("id"))->where('users_id', Auth::user()->id)->first();
        $validators = Validator::make($request->all(), [
            "id" => "required",
            "todo" => "required|string",
            "status" => "required|in:finish,unfinish"
        ]);
        if ($validators->fails()) {
            return response()->json([
                'msg' => 'Error validation',
                'error' => $validators->errors()
            ],422);
        }
        if($todo_list) {
            $todo_list->update([
                'todo' => $request->get('todo'),
                'status' => $request->get('status')
            ]);
            return response()->json([
                "msg" => "data berhasil di update",
                "data" => $todo_list
            ]);
        } else {
            return response()->json([
                'msg' => 'Todo tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $todo_list = Todo::where('id',$request->get("id"))->where('users_id', Auth::user()->id)->first();
        $validators = Validator::make($request->all(), [
            "id" => "required",
        ]);
        if ($validators->fails()) {
            return response()->json([
                'msg' => 'Error validation',
                'error' => $validators->errors()
            ],422);
        }
        if($todo_list) {
            $todo_list->delete();
            return response()->json([
                "msg" => "data berhasil di delete",
            ]);
        } else {
            return response()->json([
                'msg' => 'Todo tidak ditemukan'
            ], 404);
        }
    }
}
