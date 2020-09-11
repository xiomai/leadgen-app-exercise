<?php

namespace AAG\Models;

class Page extends AAGBaseModel
{

    protected $appends = ['shortened_title'];

    public function version()
    {
        return $this->hasOne(PageVersion::class);
    }

    public function versions()
    {
        return $this->hasMany(PageVersion::class);
    }

    public function leads()
    {
        return $this->hasManyThrough(Lead::class, PageVersion::class);
    }

    public function getShortenedTitleAttribute()
    {
        $shortenedTitle = strlen($this->title) > 30 ? substr($this->title, 0, 30) . "..." : $this->title;

        return $shortenedTitle;
    }

    public function getRandomVersionAttribute()
    {
        if ($this->versions()->count() == 1) return $this->version;

        return $this->hasMany(PageVersion::class)->inRandomOrder()->first();
    }
}
