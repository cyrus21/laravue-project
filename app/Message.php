<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function template() {
        return $this->belongsTo(Template::class);
    }
}
