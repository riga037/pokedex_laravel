<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Type;
use Validator;

class typesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = type::paginate(5);

        $response = [
            'success' => true,
            'message' => "Types list recovered successfully.",
            'data' => $types,
        ];

        //return $response;
        return response()->json($response,200);
    }

    public function index2()
    {
        //
        $types = type::with('monsters')->get();

        $response = [
            'success' => true,
            'message' => "Types list recovered successfully.",
            'data' => $types,
        ];

        //return $response;
        return response()->json($types);
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

        $type = Type::create($input);

        $response = [
            'success' => true,
            'message' => "Type successfully created.",
            'data' => $type,
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
        $type = Type::find($id);

        if($type == null) {

            $response = [
                'success' => false,
                'message' => "Type not found.",
                'data' => [],
            ];

            return response()->json($response,404);

        }

        $response = [
            'success' => true,
            'message' => "Type recovered.",
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

        $type = Type::find($id);
        if($type==null) {

            $response = [
                'success' => false,
                'message' => "Type not found.",
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
      $type->update($input);

       
        $response = [
            'success' => true,
            'message' => "Type updated successfully",
            'data' => $type,
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
        $type = Type::find($id);

        if($type == null) {

            $response = [
                'success' => false,
                'message' => "Type not found.",
                'data' => [],
            ];

            return response()->json($response,404);

        }

        try {

            $type -> delete();

            $response = [
                'success' => true,
                'message' => "Type deleted.",
                'data' => $type,
            ];
    
            return response()->json($response,200);

        }
        
        catch(\Exception $e) {

            $response = [
                'success' => false,
                'message' => "Error deleting type.",
            ];

            return response()->json($response,400);

        }

    }
}
