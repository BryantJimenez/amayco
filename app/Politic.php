<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Politic extends Model
{
	protected $fillable = ['slug', 'booking', 'cancellations', 'language_id'];

    public function language() {
        return $this->belongsTo(Language::class);
    }
}
