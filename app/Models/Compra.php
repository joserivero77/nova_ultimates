<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    public function productos()
    {
        return $this->hasMany("App\Models\ProductoComprado", "id_compra");
    }

    public function provider()
    {
        return $this->belongsTo("App\Models\Provider", "id_provider");
    }


}
