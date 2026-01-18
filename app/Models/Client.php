<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    // use HasFactory;
    use HasFactory, Notifiable;

    protected $fillable = ['name','password','email'];
    protected $hidden = ['password','remember_token'];
}
