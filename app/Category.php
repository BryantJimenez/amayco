<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

	protected $fillable = [
		'slug',
		'name',
		'state',
		'lang'
	];

	public function galeries() {
        return $this->hasMany(Galery::class);
    }
}
