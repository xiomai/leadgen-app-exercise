<?php

namespace AAG\Models;

class PageVersion extends AAGBaseModel
{

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
