<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sendMail extends Model
{
    use HasFactory;
    protected $table = 'sendemail';
    protected $fillable = [
        'user_id',
        'book_id',
        'isSend',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(book::class);
    }
}
