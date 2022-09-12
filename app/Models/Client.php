<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory,Notifiable;

    protected $table = "clients";
    protected $primaryKey = "id_client";
    protected $keyType = 'string';
    public $increment = false;

    protected $fillable = [
        'id_client',
        'nom',
        'prenom',
        'tel',
        'email',
        'nom_entre',
        'localisation'
        ];

        public function commande(){
            return $this->hasMany(Commande::class,'id_client','id_client');
        }
}
