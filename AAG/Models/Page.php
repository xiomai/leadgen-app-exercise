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

    public function leadsEmailOpened()
    {
        return $this->leads()->emailOpened();
    }

    public function leadsAttachmentOpened()
    {
        return $this->leads()->attachmentOpened();
    }

    public function getLeadsCountAttribute($value)
    {

        return $value ?? $this->leads_count  = $this->leads()->count();
    }

    public function getLeadsEmailOpenedCountAttribute($value)
    {
        return $value ?? $this->email_opened_count  = $this->leadsEmailOpened()->count();
    }

    public function getLeadsAttachmentOpenedCountAttribute($value)
    {
        return $value ?? $this->atachment_opened_count  = $this->leadsAttachmentOpened()->count();
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

    public function getOpenRateAttribute()
    {
        $page = $this->withCount(['leads', 'leadsEmailOpened'])->first();

        $leadsTotal       = $page->leads_count;
        $leadsEmailOpened = $page->leads_email_opened_count;

        $openRate  = ($leadsEmailOpened / $leadsTotal) * 100;
        $formatted = number_format($openRate, 2) . '%';

        $data = [
            'total'     => $leadsTotal,
            'opened'    => $leadsEmailOpened,
            'value'     => $openRate,
            'formatted' => $formatted
        ];

        return $data;
    }

    public function getClickThroughRateAttribute()
    {
        $page = $this->withCount(['leads', 'leadsAttachmentOpened'])->first();

        $leadsTotal       = $page->leads_count;
        $leadsAttachmentOpened = $page->leads_attachment_opened_count;

        $openRate  = ($leadsAttachmentOpened / $leadsTotal) * 100;
        $formatted = number_format($openRate, 2) . '%';

        $data = [
            'total'     => $leadsTotal,
            'opened'    => $leadsAttachmentOpened,
            'value'     => $openRate,
            'formatted' => $formatted
        ];

        return $data;
    }
}
