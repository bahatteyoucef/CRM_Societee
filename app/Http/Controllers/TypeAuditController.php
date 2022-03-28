<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeAudit;

use Illuminate\Support\Facades\Validator;

class TypeAuditController extends Controller
{
    public function index()
    {
        return TypeAudit::select([ 
            'type_audit.id     as id', 
            'type_audit.nom    as nom'])
        ->orderBy('type_audit.id','desc')
        ->get();
    }

    public function combobox()
    {
        return TypeAudit::select([ 
            'type_audit.id     as id', 
            'type_audit.nom    as nom'])
        ->orderBy('type_audit.id','desc')
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

        $type_audit = new TypeAudit([
            'nom'               => $request->input('nom'),
        ]);

        $type_audit->save();

        return response()->json('Plan has been created!');
    }

    public function show($id)
    {
        return  TypeAudit::find($id);
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

        $type_audit   =   TypeAudit::find($id);

        $type_audit->nom               =   $request->input('nom');

        $type_audit->save();

        return response()->json('Fournisseur has been created!');
    }

    public function delete($id)
    {
        $type_audit = TypeAudit::find($id);
        $type_audit->delete();

        return "Plan has been deleted";
    }
}
