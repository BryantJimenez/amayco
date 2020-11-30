<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['slug', 'name', 'state', 'language_id'];

	public function language() {
        return $this->belongsTo(Language::class);
    }

	public function galleries() {
        return $this->hasMany(Gallery::class);
    }
}
