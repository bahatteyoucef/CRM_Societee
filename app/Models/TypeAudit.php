<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAudit extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table        =   'type_audit';
    protected $primaryKey   =   'id';
}
