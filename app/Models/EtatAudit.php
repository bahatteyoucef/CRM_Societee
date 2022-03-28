<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatAudit extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'etat_audit';
    protected $primaryKey   =   'id';
}
