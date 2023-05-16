<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rackmodel extends Model
{
    use HasFactory;
    protected $table='racks';
    protected $primaryKey='rack_id';
}