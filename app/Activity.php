<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	protected $fillable = ['name', 'slug', 'state', 'language_id'];

	public function language() {
        return $this->belongsTo(Language::class);
    }
}
