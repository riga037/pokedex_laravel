<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Monster;
use Validator;

class monstersController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        $monsters = monster::paginate(6);
        
        $response = [
            'success' => true,
            'message' => "Monsters list recovered successfully.",
            'data' => $monsters,
        ];
        
        //return $response;
        return response()->json($response,200);
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index2()
    {
        //
        $monsters = monster::with('moves')->get();
        
        $response = [
            'success' => true,
            'message' => "Monsters list recovered successfully.",
            'data' => $monsters,
        ];
        
        //return $response;
        return response()->json($monsters);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
        //Per validar camps
        $input = $request->all();
        $validator = Validator::make($input,
        [
            'monstername' => 'required | min:3',
            'category' => 'required | min:3', 
            'description' => 'required | min:3',
            'type_id' => 'required|exists:types,id' 
        ]);
        
        if($validator->fails()) {
            $response = [
                'success' => false,
                'message' => "Validation error",
                'data' => $validator->errors()->all(),
            ];
            return response()->json($response,400);
        }
        
        $monster = Monster::create($input);
        
        $response = [
            'success' => true,
            'message' => "Monster successfully created.",
            'data' => $monster,
        ];
        
        return response()->json($response,200);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
        $monster = Monster::find($id);
        
        if($monster == null) {
            
            $response = [
                'success' => false,
                'message' => "Monster not found.",
                'data' => [],
            ];
            
            return response()->json($response,404);
            
        }
        
        $response = [
            'success' => true,
            'message' => "Monster recovered.",
            'data' => $monster,
        ];
        
        return response()->json($response,200);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
        
        $monster = Monster::find($id);
        if($monster==null) {
            
            $response = [
                'success' => false,
                'message' => "Monster not found.",
                'data' => [],
            ];
            
            return response()->json($response, 404);
            
        }
        
        //Per validar camps
        $input = $request->all();
        $validator = Validator::make($input,
        [
            'monstername' => 'required | min:3',
            'category' => 'required | min:3', 
            'description' => 'required | min:3',
            'type_id' => 'required|exists:types,id' 
        ]);
        
        if($validator->fails()) {
            $response = [
                'success' => false,
                'message' => "Validation error.",
                'data' => $validator->errors()->all(),
            ];
            return response()->json($response,400);
        }
        
        //versio 1
        $monster->update($input);
        $monster->refresh();
        
        
        $response = [
            'success' => true,
            'message' => "Monster updated successfully",
            'data' => $monster,
        ];
        
        return response()->json($response,200);
    }
    
    /**
    * Remonster the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
        $monster = Monster::find($id);
        
        if($monster == null) {
            
            $response = [
                'success' => false,
                'message' => "Monster not found.",
                'data' => [],
            ];
            
            return response()->json($response,404);
            
        }
        
        try {
            
            $monster -> delete();
            
            $response = [
                'success' => true,
                'message' => "Monster deleted.",
                'data' => $monster,
            ];
            
            return response()->json($response,200);
            
        }
        
        catch(\Exception $e) {
            
            $response = [
                'success' => false,
                'message' => "Error deleting monster.",
            ];
            
            return response()->json($response,400);
            
        }
        
    }
    
    public function detachMoves(Request $request){
        
        $monsterId = $request->input('monster_id');
        $moves = $request->input('moves');
        
        $monster = Monster::find($monsterId);
        
        $monster->moves()->detach($moves);
        $monster->refresh();
        
        $response = [
            'success' => true,
            'message' => "Monster moves detached successfully",
            'data' => $monster,
        ];
        
        return response()->json($response,200);
        
    }

    public function attachMoves(Request $request){
        
        $monsterId = $request->input('monster_id');
        $moves = $request->input('moves');
        
        $monster = Monster::find($monsterId);
        
        $monster->moves()->attach($moves);
        $monster->refresh();
        
        $response = [
            'success' => true,
            'message' => "Monster moves attached successfully",
            'data' => $monster,
        ];
        
        return response()->json($response,200);
        
    }
    
}
