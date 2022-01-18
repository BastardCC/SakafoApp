<?php

namespace App\Http\Controllers;

use App\Models\Plate;

use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function index(){
        return Plate::all();
    }

    public function store(Request $request){
        $request->validate([
            'plate_name' => 'required',
            'recipe' => 'required',
        ]);

        if ($request->hasFile('plate_image'))
        {
              $file      = $request->file('plate_image');
              $filename  = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $picture   = date('His').'-'.$filename;
              //move image to public/img folder
              $file->move(public_path('Image/Plate'), $picture);
        } else{
            $picture = null;
            // $picture = file(public_path('imgGAV/santatra.jpg'));
        }

        $plate = Plate::create([
            'plate_name' => $request->plate_name,
            'recipe' => $request->recipe,
            'plate_image' =>$picture
        ]);

        return $plate;
    }

    public function show($plate_id){
        $plate = Plate::find($plate_id);
        return $plate;
    }

    public function update($plate_id, Request $request){
        if ($request->hasFile('plate_image'))
        {
              $file      = $request->file('plate_image');
              $filename  = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $picture   = date('His').'-'.$filename;
              //move image to public/img folder
              $file->move(public_path('Image/Plate'), $picture);
        } else{
            $picture = null;
            // $picture = file(public_path('imgGAV/santatra.jpg'));
        }

        $request->validate([
            'plate_name' => 'required',
            'recipe' => 'required',
        ]);

        $plate = Plate::find($plate_id)->update([
            'plate_name' => $request->plate_name,
            'recipe' => $request->recipe,
            'plate_image' =>$picture
        ]);

        return response()->json(['message'=>'Update successfully']);
    }

    public function delete($plate_id){
        Plate::find($plate_id)->delete();

        return response()->json(['message'=>'Delete successfully']);
    }
}
