<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = "homes";

	protected $fillable = [
		'slug',
		'title_one',
		'title_two',
		'title_three',
		'image',
		'lang',
		'state'
	];
}
