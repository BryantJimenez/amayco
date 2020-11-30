<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $fillable = ['slug', 'category_id', 'title', 'description', 'image', 'language_id', 'state'];

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function language() {
        return $this->belongsTo(Language::class);
    }
}
