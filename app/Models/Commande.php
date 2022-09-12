<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $table = "commandes";
    protected $primaryKey = "id_commande";
    protected $keyType = 'string';
    public $increment = false;

    protected $fillable = [
        'id_commande',
        'start',
        'end',
        'reste',
        'cout',
        'status',
        'type_comd',
        'username',
        'id_service',
        'id_client'
        ];

        public function service(){
            return $this->belongsTo(Service::class,'id_service','id_service');
        }

        public function client(){
            return $this->belongsTo(Client::class,'id_client','id_client');
        }

        public function user (){
            return $this->belongsTo(User::class,'username','username');
        }
}
