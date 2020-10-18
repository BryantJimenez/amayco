<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    protected $table = "excursions";

	protected $fillable = [
		'slug',
		'title',
		'description',
		'image',
		'lang',
		'state'
	];
}
