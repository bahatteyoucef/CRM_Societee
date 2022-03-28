<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'auditees';
    protected $primaryKey   =   'id';
}
