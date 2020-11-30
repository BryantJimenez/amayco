<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['slug', 'about', 'language_id'];

    public function language() {
        return $this->belongsTo(Language::class);
    }
}
