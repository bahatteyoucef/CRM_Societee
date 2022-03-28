<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Societee;

use Illuminate\Support\Facades\Validator;

class SocieteeController extends Controller
{
    public function index()
    {
        return Societee::select([ 
            'societees.id     as id', 
            'societees.nom    as nom'])
        ->orderBy('societees.id','desc')
        ->get();
    }

    public function combobox()
    {
        return Societee::select([ 
            'societees.id     as id', 
            'societees.nom    as nom'])
        ->orderBy('societees.id','desc')
        ->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $societee = new Societee([
            'nom'               => $request->input('nom'),
        ]);

        $societee->save();

        return response()->json('Societee has been created!');
    }

    public function show($id)
    {
        return  Societee::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $societee   =   Societee::find($id);

        $societee->nom               =   $request->input('nom');

        $societee->save();

        return response()->json('Societee has been created!');
    }

    public function delete($id)
    {
        $societee = Societee::find($id);
        $societee->delete();

        return "Societee has been deleted";
    }

}
