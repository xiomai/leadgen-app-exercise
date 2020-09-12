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

    public function scopeEmailOpened($query)
    {
        $query->whereNotNull('email_opened_at');
    }

    public function scopeAttachmentOpened($query)
    {
        $query->whereNotNull('attachment_opened_at');
    }
}
