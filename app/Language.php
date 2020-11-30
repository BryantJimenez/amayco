<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name', 'slug', 'code'];

    public function banners() {
        return $this->hasMany(Banner::class);
    }

    public function about() {
        return $this->hasOne(About::class);
    }

    public function excursions() {
        return $this->hasMany(Excursion::class);
    }

    public function categories() {
        return $this->hasMany(Category::class);
    }

    public function galleries() {
        return $this->hasMany(Gallery::class);
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function transfers() {
        return $this->hasMany(Transfer::class);
    }

    public function attention() {
        return $this->hasOne(Attention::class);
    }

    public function politic() {
        return $this->hasOne(Politic::class);
    }
}