<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFournisseur extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'contact_fournisseurs';
    protected $primaryKey   =   'id_contact_fournisseur';
}
