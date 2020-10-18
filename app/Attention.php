<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    protected $table = "attentions";

	protected $fillable = [
		'slug',
		'attention',
		'state',
		'lang'
	];
}
