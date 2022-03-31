<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\UrlModel;

class ExpireNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $url;
    public $user;
    public function __construct($user, $url)
    {
        //
        $this->user = $user;
        $this->url= $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mailView')
                    ->subject('Short URL Expired!')
                    ->with([
                        'user' => $this->user,
                        'url' => $this->url,
                    ]);
    }
}
