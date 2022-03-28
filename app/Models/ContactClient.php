<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactClient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'contact_clients';
    protected $primaryKey   =   'id_contact_client';
}
