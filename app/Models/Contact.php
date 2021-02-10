<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['receiver', 'email', 'interval', 'user_id', 'isActivate'];

    // A la creation de ce model je veux lui injecter l'id de l'user connecté.
    protected static function booted()
    {
        static::creating(function ($contact) {
            $contact->user_id = auth()->id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
