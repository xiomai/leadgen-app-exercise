<?php

namespace AAG\Models;

class Lead extends AAGBaseModel
{

    public function pageVersion()
    {
        return $this->belongsTo(PageVersion::class);
    }

    public function page()
    {
        return $this->hasOneThrough(Page::class, PageVersion::class);
    }
}
