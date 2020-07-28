<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $guarded = [];

    public function message() {
        return $this->hasMany(Message::class);
    }
}
