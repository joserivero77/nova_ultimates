<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;
    protected $fillable=[
        'visita_date',
        'motivo',
        'client_id',

    ];
    public function client(){
        return $this->belongsTo(Cliente::class);
    }
    protected $guarded=[];
}
