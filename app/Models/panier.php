<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panier extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class);
}

public function carts()
{
    return $this->hasMany(Cart::class);
}
protected $table = 'paniers';
protected $fillable = [
    'user_id',
];
}
