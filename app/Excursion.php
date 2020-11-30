<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
	protected $fillable = ['slug', 'title', 'description', 'image', 'language_id', 'state'];

	public function language() {
        return $this->belongsTo(Language::class);
    }
}
