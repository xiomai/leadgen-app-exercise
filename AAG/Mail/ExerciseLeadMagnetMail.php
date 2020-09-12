<?php

namespace AAG\Mail;

use AAG\Models\Lead;
use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExerciseLeadMagnetMail extends Mailable
{
    use Queueable, SerializesModels;

    private $lead;

    public $appLogoUrl;

    public $fileAttachmentUrl;

    public $ts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lead $lead = null)
    {
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->appLogoUrl = route('aag.lp.image.attachment.appEmailLogo', [
            'lead' => $this->lead
        ]);

        $this->fileAttachmentUrl = route('aag.lp.file.attachment.leadMagnetExerciseAttachmentFile', [
            'lead' => $this->lead
        ]);

        $this->ts = now()->timestamp;

        return $this->view('AAG::mails.leadmagnet.exercise');
    }
}
