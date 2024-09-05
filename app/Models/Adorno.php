<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adorno extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'stock',
        'precio',
        'categoria_id'
    ];
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
