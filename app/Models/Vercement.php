<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vercement extends Model
{
    use HasFactory;

    protected $table = "versements";

    protected $fillable = [
        'versement',
        'id_commande',
        ];

        public function commande(){
            return $this->belongsTo(Commande::class,'id_commande','id_commande');
        }
}
