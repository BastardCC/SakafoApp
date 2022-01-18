<?php

namespace App\Http\Controllers;

use App\Models\Contain;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContainController extends Controller
{
    public function index(){
        return Contain::all();
    }

    public function store(Request $request){
        $request->validate([
            'ingredient_id' => 'required',
            'plate_id' => 'required',
            'quantity' => 'required'
        ]);

        return Contain::create([
            'ingredient_id' => $request->ingredient_id,
            'plate_id' => $request->plate_id,
            'quantity' => $request->quantity
        ]);
    }

    public function show($plate_id, $ingredient_id){
        $contain = DB::select('select contains.* FROM contains WHERE contains.plate_id=? AND contains.ingredient_id=?',[$plate_id,$ingredient_id]);
        return $contain;  
    }

    public function update($plate_id, $ingredient_id,Request $request){
        $request->validate([
            'ingredient_id' => 'required',
            'plate_id' => 'required',
            'quantity' => 'required'
        ]);
        
        Contain::where(['plate_id' => $plate_id, 'ingredient_id' => $ingredient_id])->update([
            'ingredient_id' => $request->ingredient_id,
            'plate_id' => $request->plate_id,
            'quantity' => $request->quantity
        ]);
        
        return response()->json(['message' => 'Update successfully']);
    }

    public function delete($plate_id, $ingredient_id){
        Contain::where(['plate_id' => $plate_id, 'ingredient_id' => $ingredient_id])->delete();
        return response()->json(['message' => 'Delete successfully']);
    }
}
