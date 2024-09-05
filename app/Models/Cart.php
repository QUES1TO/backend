<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'total'
    ];
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'selected_products')->withPivot('amount');
    }
}
