<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Move;

class MoveController extends Controller
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
        return view('moves.index', compact('moves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('moves.new');
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
        $request->validate(
            ['name' => 'required | min:3'],
            ['description' => 'required | min:3']
        );

        $move = new Move;
        $move->name = $request->name;
        $move->description = $request->description;
        $move->save();

        return redirect('/moves');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Move $move)
    {
        //
        $move->load("monsters");
        return view('moves.show',compact('move'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Move $move)
    {
        //
        return view('moves.update',['move'=>$move]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Move $move)
    {
        //
        $request->validate(
            ['name' => 'required | min:3'],
            ['description' => 'required | min:3']
        );
        
        $move->name = $request->name;
        $move->description = $request->description;
        $move->save();

        return redirect('/moves');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Move $move)
    {
        //
        $move->delete();

        return redirect('/moves');
    }
}
