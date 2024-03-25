<?php

namespace App\Models;

use App\Models\panier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cart extends Model
{
    use HasFactory;
    public function book()
    {
        return $this->belongsTo(book::class);
    }
    public function panier()
{
    return $this->belongsTo(panier::class);
}
    protected $table = 'carts'; 
    protected $fillable = [
        'user_id',
        'book_id',
        'qnt',
        'panier_id',

    ];
}
