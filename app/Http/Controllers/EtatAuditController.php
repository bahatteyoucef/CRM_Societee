<?php

namespace App\Http\Controllers;

use App\Models\EtatAudit;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EtatAuditController extends Controller
{
    public function index()
    {
        $etat_audit     =       DB::table('etat_audit')
        
                                ->select([ 
                                    'etat_audit.id     as id', 
                                    'etat_audit.nom    as nom']
                                )

                                ->join('process'    ,'element_process.id_process'       ,'process.id')
                                ->join('etat_audit' ,'element_process.id_etat_audit'    ,'etat_audit.id')
                                ->orderBy('etat_audit.id','desc')
                                ->get();

        return $etat_audit;
    }

    public function combobox()
    {
        return EtatAudit::select([ 
                'etat_audit.id     as id', 
                'etat_audit.nom    as nom'])
            ->orderBy('etat_audit.id','desc')
            ->get();
    }

    public function details($id)
    {
        $etat_audit     =       DB::table('etat_audit')
                                ->where("etat_audit",$id)

                                ->select([ 
                                    'etat_audit.id     as id', 
                                    'etat_audit.nom    as nom']
                                )

                                ->join('process'    ,'element_process.id_process'       ,'process.id')
                                ->join('etat_audit' ,'element_process.id_etat_audit'    ,'etat_audit.id')

                                ->first();

        return $etat_audit;
    }
}
