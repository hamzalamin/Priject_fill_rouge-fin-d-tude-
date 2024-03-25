<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    public function categorys()
    {
        return $this->belongsTo(category::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function user() {
    //     return $this->hasMany(User::class, 'user_id');
    // }
    protected $table = 'books'; 
    protected $fillable = [
        'name',
        'description',
        'number',
        'price',
        'language',
        'writer',
        'image',
        'type',
        'date',
        'categorys_id',
        'user_id',

    ];
}
