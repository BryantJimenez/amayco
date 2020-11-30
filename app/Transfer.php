<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
	protected $fillable = ['slug', 'title', 'description', 'language_id', 'state'];

	public function language() {
        return $this->belongsTo(Language::class);
    }
}
