<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
    protected $table='details';
    protected $fillable=[
        'quantite',
        'commande_id',
        'article_id',
        'prixVente',
    ];
}
