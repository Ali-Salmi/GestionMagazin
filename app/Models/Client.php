<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $table='clients';
    protected $fillable=[
        'nom',
        'tel',
        'statusClient',
        'email',
        'adresse'
    ];
}
