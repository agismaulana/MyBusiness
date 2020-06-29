<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = ['name', 'time_start', 'time_end', 'group_id', 'client_id', 'pay', 'status'];

    public function client() {
        return $this->belongsTo('App\Client');
    }

    public function group() {
        return $this->belongsTo('App\Group');
    }
}
