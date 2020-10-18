<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table = "offices";

	protected $fillable = [
		'slug',
		'phone',
		'email',
		'address',
		'state'
	];
}