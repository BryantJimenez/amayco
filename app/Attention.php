<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
	protected $fillable = ['slug', 'attention', 'schedule', 'language_id'];

	public function language() {
        return $this->belongsTo(Language::class);
    }
}
