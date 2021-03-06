<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['name'];

    public function user() {
        return $this->hasMany('App\Group');
    }

    public function project() {
        return $this->hasMany('App\Group');
    }
}
