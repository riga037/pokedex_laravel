<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monster;
use App\Models\Type;
use App\Models\Move;

class MonsterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Carreguem llista monsteris i cada
        // monsteri amb l'objecte typea associat
        // per evitar problema N+1 
        $monsters = Monster::with('type')->paginate(3);
    
        return view('monsters.index',compact('monsters'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Recuperem la col·lecció de typees
        $types = Type::all();

        return view('monsters.new',compact('types'));
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
        $request->validate([
            'monstername' => 'required | max:25 |unique:monsters',
            'category' => 'required | max:75', 
            'description' => 'required | max:500',
            'type_id' => 'required|exists:types,id'           
        ]);
    
        Monster::create($request->all());
     
        return redirect()->route('monsters.index')
                        ->with('success','Monster added successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Monster $monster)
    {
            // Tenim un monsteri, carreguem els superpoders associats!     
            $monster->load("moves");
            // dd($monster);
            
            return view('monsters.show',compact('monster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Monster $monster)
    {
        //
        $types = Type::all();
        return view('monsters.update',['monster'=>$monster],compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monster $monster)
    {
        //
        $request->validate([
            'monstername' => 'required | max:25',
            'category' => 'required | max:75', 
            'description' => 'required | max:500',
            'type_id' => 'required|exists:types,id'           
        ]);

        $monster->monstername = $request->monstername;
        $monster->category = $request->category;
        $monster->description = $request->description;
        $monster->type_id = $request->type_id;
        $monster->save();

        return redirect('/monsters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monster $monster)
    {
        //
        $monster->delete();

        return redirect('/monsters');
    }

    public function editMoves(Monster $monster) 
    {
        
        // Transformem la col·lecció de superpoders en un array amb els id's
        
        $arrayId = $monster->moves->pluck('id'); // exemple: [1,3,5]
        
        $moves = Move::whereNotIn('id',$arrayId)->get();
       
        
        return view('monsters.showMoves',compact('monster','moves'));
    }

    public function attachMoves(Request $request, Monster $monster) 
    {
        
        $request->validate([
            'powers' => 'exists:moves,id',                       
        ]);

       $monster->moves()->attach($request->powers);
        
        return redirect()->route('monsters.editmoves',$monster->id)
                        ->with('success','Moves assigned successfuly.');

    }


    public function detachMoves(Request $request, Monster $monster) 
    {
        
        $request->validate([
            'moves' => 'exists:moves,id',                       
        ]);

        // Una llista buida dins detach 
        // elimina tots els superpoders!
        if ($request->has('moves'))
            $monster->moves()->detach($request->moves);
        
        return redirect()->route('monsters.editmoves',$monster->id)
                        ->with('success','Moves extracted successfuly.');

    }
}
