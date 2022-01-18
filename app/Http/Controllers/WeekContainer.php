<?php

namespace App\Http\Controllers;

use App\Models\Week;
use Illuminate\Http\Request;

class WeekContainer extends Controller
{
    public function index(){
        return Week::all();
    }

    public function store(Request $request){

        $request->validate([
            'monday' => 'required',
            'tuesday' => 'required',
            'wednesday' => 'required',
            'thursday' => 'required',
            'friday' => 'required',
            'saturday' => 'required',
            'sunday' => 'required'
        ]);

        return Week::create([
            'monday' => $request->monday,
            'tuesday' => $request->tuesday,
            'wednesday' => $request->wednesday,
            'thursday' => $request->thursday,
            'friday' => $request->friday,
            'saturday' => $request->saturday,
            'sunday' => $request->sunday
        ]);

    }

    public function show($week_id){
        return Week::find($week_id);
    }

    public function update($week_id, Request $request){
        $request->validate([
            'monday' => 'required',
            'tuesday' => 'required',
            'wednesday' => 'required',
            'thursday' => 'required',
            'friday' => 'required',
            'saturday' => 'required',
            'sunday' => 'required'
        ]);

        Week::find($week_id)->update([
            'monday' => $request->monday,
            'tuesday' => $request->tuesday,
            'wednesday' => $request->wednesday,
            'thursday' => $request->thursday,
            'friday' => $request->friday,
            'saturday' => $request->saturday,
            'sunday' => $request->sunday
        ]);

        return response()->json(['message' => 'Update successfully']);

    }

    public function delete($week_id){
        Week::find($week_id)->delete();
        return response()->json(['message' => 'Delete successfully']);
    }

}
