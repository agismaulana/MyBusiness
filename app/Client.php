<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['name', 'company'];

    public function project() {
        return $this->hasMany('App\Client');
    }
}
