<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class copy extends Model
{
    use HasFactory;
    protected $table = 'copies';
    protected $fillable = [
        'book_id',
        'price_of_reserv',
        'number',
        'user_id',
    ];


    public function book()
    {
        return $this->belongsTo(book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
