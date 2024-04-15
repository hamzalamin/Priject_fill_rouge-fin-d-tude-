<?php

namespace App\Models;

use App\Models\cart;
use App\Models\User;
use App\Models\category;
use App\Models\sendMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class book extends Model
{
    use HasFactory;
    public function categorys()
    {
        return $this->belongsTo(category::class);
    }
    public function cart()
    {
        return $this->hasOne(cart::class, 'copy_id');
    }
    public function cart_buy()
    {
        return $this->hasMany(cart::class, 'book_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mails()
    {
        return $this->belongsTo(sendMail::class);
    }
    public function copies()
    {
        return $this->hasMany(copy::class);
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
        'categorys_id',
        'user_id',

    ];
}
