<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;

use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(){
        return Ingredient::all();
    }

    public function store(Request $request){

        $request->validate([
            'ingredient_name' => 'required',
            'ingredient_unit' => 'required'
        ]);

        $ingredient = Ingredient::create([
            'ingredient_name' => $request->ingredient_name,
            'ingredient_unit' => $request->ingredient_unit
        ]);

        return $ingredient;
    }

    public function show($ingredient_id){
        return Ingredient::find($ingredient_id);
    }

    public function update($ingredient_id, Request $request){

        $request->validate([
            'ingredient_name' => 'required',
            'ingredient_unit' => 'required'
        ]);

        Ingredient::find($ingredient_id)->update([
            'ingredient_name' => $request->ingredient_name,
            'ingredient_unit' => $request->ingredient_unit
        ]);
        
        return response()->json(['message' => 'Update successfully']);
    }

    public function delete($ingredient_id){
        Ingredient::find($ingredient_id)->delete();

        return response()->json(['message' => 'Delete successfully']);
    }
}
