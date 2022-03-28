<?php

namespace App\Http\Controllers;

use App\Models\EtatAudit;
use Illuminate\Http\Request;

class EtatAuditController extends Controller
{
    public function index()
    {
        return EtatAudit::select([ 
                'etat_audit.id     as id', 
                'etat_audit.nom    as nom'])
            ->orderBy('etat_audit.id','desc')
            ->get();
    }

    public function combobox()
    {
        return EtatAudit::select([ 
                'etat_audit.id     as id', 
                'etat_audit.nom    as nom'])
            ->orderBy('etat_audit.id','desc')
            ->get();
    }
}
