<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluationAudit;

use Illuminate\Support\Facades\Validator;

class EvaluationAuditController extends Controller
{
    public function index()
    {
        return EvaluationAudit::select([ 
            'evaluation_audit.id     as id', 
            'evaluation_audit.nom    as nom'])
        ->orderBy('evaluation_audit.id','desc')
        ->get();
    }

    public function combobox()
    {
        return EvaluationAudit::select([ 
            'evaluation_audit.id     as id', 
            'evaluation_audit.nom    as nom'])
        ->orderBy('evaluation_audit.id','desc')
        ->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $evaluation_audit = new EvaluationAudit([
            'nom'               => $request->input('nom'),
        ]);

        $evaluation_audit->save();

        return response()->json('Plan has been created!');
    }

    public function show($id)
    {
        return  EvaluationAudit::find($id);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'               =>  'required'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors'    =>  $validator->errors(),
            ],422);
        }

        $evaluation_audit   =   EvaluationAudit::find($id);

        $evaluation_audit->nom               =   $request->input('nom');

        $evaluation_audit->save();

        return response()->json('Fournisseur has been created!');
    }

    public function delete($id)
    {
        $evaluation_audit = EvaluationAudit::find($id);
        $evaluation_audit->delete();

        return "Plan has been deleted";
    }
}
