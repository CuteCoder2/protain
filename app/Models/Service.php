<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_service',
        'type_service',
        'description',
    ];

    protected $primaryKey = 'id_service';
    protected $table = 'services';
    public $incrementing = false;
    protected $KeyType = 'string';


    public function commande(){
        return $this->hasMany(Commande::class,'id_commande','id_commande');
    }

}
