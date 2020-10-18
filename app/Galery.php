<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table = "galeries";

	protected $fillable = [
		'slug',
		'category_id',
		'title',
		'description',
		'image',
		'lang',
		'state'
	];

	public function category() {
		return $this->belongsTo(Category::class);
	}
}
