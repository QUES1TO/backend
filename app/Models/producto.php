<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'calidad',
        'modelo',
        'lado',
        'url_imagen',
        'stock',
        'descripcion',
        'precio',
        'categoria_id'
    ];
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class,'selected_productos')->withPivot('amount');
    }
}
