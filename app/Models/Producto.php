<?php
/*

  ____          _____               _ _           _
 |  _ \        |  __ \             (_) |         | |
 | |_) |_   _  | |__) |_ _ _ __ _____| |__  _   _| |_ ___
 |  _ <| | | | |  ___/ _` | '__|_  / | '_ \| | | | __/ _ \
 | |_) | |_| | | |  | (_| | |   / /| | |_) | |_| | ||  __/
 |____/ \__, | |_|   \__,_|_|  /___|_|_.__/ \__, |\__\___|
         __/ |                               __/ |
        |___/                               |___/

    Blog:       https://parzibyte.me/blog
    Ayuda:      https://parzibyte.me/blog/contrataciones-ayuda/
    Contacto:   https://parzibyte.me/blog/contacto/

    Copyright (c) 2020 Luis Cabrera Benito
    Licenciado bajo la licencia MIT

    El texto de arriba debe ser incluido en cualquier redistribucion
*/ ?>
<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'stock',
        'image',
        'precio_compra',
        'precio_venta',
        'unit',
        'status',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function calculateStock()
    {
        $this->stock = $this->purchases()->sum('quantity') - $this->sales()->sum('quantity');//dd($this->stock);
        $this->save();
    }

    public function status(){
        switch ($this->status) {
            case 'ACTIVE':
                return 'Activo';
                break;
            case 'DESACTIVED':
                return 'Desactivado';
                break;

            default:
                # code...
                break;
        }
    }

    public function get_active_products(){
        return Self::where('status','ACTIVE');
    }




}
