<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['about_banner', 'gallery_banner', 'activity_banner', 'contact_banner', 'phone', 'email', 'address', 'map'];
}
