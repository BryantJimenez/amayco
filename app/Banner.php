<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $fillable = ['slug', 'title', 'archive', 'type', 'language_id', 'state'];

	public function language() {
        return $this->belongsTo(Language::class);
    }
}
