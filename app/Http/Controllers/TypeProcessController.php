<?php

namespace App\Http\Controllers;

use App\Models\TypeProcess;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class TypeProcessController extends Controller
{
    public function index()
    {
        $type_process           =   DB::table('type_process')
                                        ->select([
                                            'type_process.id as id', 
                                            'type_process.nom          as nom'
                                        ])

                                ->orderBy('type_process.id','desc')
                                ->get();

        return $type_process; 
    }

    public function combobox()
    {
        return TypeProcess::select([ 
                'type_process.id     as id', 
                'type_process.nom    as nom'])
            ->orderBy('type_process.id','desc')
            ->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               => "required",
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $type_process = new TypeProcess([
            'nom'               => $request->input('nom'),
        ]);

        $type_process->save();

        return response()->json('Plan has been created!');
    }

    public function details($id)
    {
        $type_process           =   DB::table('type_process')
                                        ->where("type_process.id",$id)

                                        ->select([
                                            'type_process.id as id', 
                                            'type_process.nom          as nom'
                                        ])
                                
                                    ->first();

        return $type_process; 
    }

    public function show($id)
    {
        return  TypeProcess::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               => "required",
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $type_process            =   TypeProcess::find($id);

        $type_process->nom       =   $request->input('nom');

        $type_process->save();

        return response()->json('Fournisseur has been created!');
    }

    public function delete($id)
    {
        $type_process    = TypeProcess::find($id);
        $type_process->delete();

        return "Plan has been deleted";
    }
}
