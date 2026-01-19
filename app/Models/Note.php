<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
  protected  $fillable=['name','detail','image','client_id'];

  public function client(){
    return $this->belongsTo(Client::class, 'client_id');
  }
}

