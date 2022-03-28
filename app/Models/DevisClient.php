<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevisClient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'devis_clients';
    protected $primaryKey   =   'id_devis_client';
}