<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Move;
use Validator;

class movesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $moves = Move::paginate(5);

        $response = [
            'success' => true,
            'message' => "Moves list recovered successfully.",
            'data' => $moves,
        ];

        //return $response;
        return response()->json($response,200);
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
        'name'=>'required|min:3|max:10',
        'description'=>'required|min:3|max:500'
        ]);

        if($validator->fails()) {
            $response = [
                'success' => false,
                'message' => "Validation error",
                'data' => $validator->errors()->all(),
            ];
            return response()->json($response,400);
        }

        $move = Move::create($input);

        $response = [
            'success' => true,
            'message' => "Move successfully created.",
            'data' => $move,
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
        $move = Move::find($id);

        if($move == null) {

            $response = [
                'success' => false,
                'message' => "Move not found.",
                'data' => [],
            ];

            return response()->json($response,404);

        }

        $response = [
            'success' => true,
            'message' => "Move recovered.",
            'data' => $type,
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

        $move = Move::find($id);
        if($move==null) {

            $response = [
                'success' => false,
                'message' => "Move not found.",
                'data' => [],
            ];

            return response()->json($response, 404);

        }

        //Per validar camps
        $input = $request->all();
        $validator = Validator::make($input,
        [
        'name'=>'required|min:3|max:10',
        'description'=>'required|min:3|max:500'
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
      $move->update($input);

       
        $response = [
            'success' => true,
            'message' => "Move updated successfully",
            'data' => $move,
        ];

        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $move = Move::find($id);

        if($move == null) {

            $response = [
                'success' => false,
                'message' => "Move not found.",
                'data' => [],
            ];

            return response()->json($response,404);

        }

        try {

            $move -> delete();

            $response = [
                'success' => true,
                'message' => "Move deleted.",
                'data' => $move,
            ];
    
            return response()->json($response,200);

        }
        
        catch(\Exception $e) {

            $response = [
                'success' => false,
                'message' => "Error deleting move.",
            ];

            return response()->json($response,400);

        }

    }
}
