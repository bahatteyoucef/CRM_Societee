<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilleComptable extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'famille_comptables';
    protected $primaryKey   =   'id_famille_cmpt';
}
