<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customermodel extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $primaryKey='customer_id';
}