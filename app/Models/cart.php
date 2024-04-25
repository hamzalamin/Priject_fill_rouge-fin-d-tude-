<?php

namespace App\Models;

use App\Models\copy;
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
    // public function copy()
    // {
    //     return $this->belongsTo(copy::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function copy()
    {
        return $this->belongsTo(Copy::class);
    }

    protected $table = 'carts'; 
    protected $fillable = [
        'user_id',
        'book_id',
        'qnt',
        'price_of_book',
        'type',
        'copy_id',
        'check',
        'isReturn',
    ];
}
