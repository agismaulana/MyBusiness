<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'meetings';

    protected $fillable = ['project_id', 'theme', 'place', 'time'];

    public function project() {
        return $this->belongsTo('App\Project');
    }
}
