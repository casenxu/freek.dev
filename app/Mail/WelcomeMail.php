<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Support\Collection;
use Spatie\Mailcoach\Mails\WelcomeMail as MailcoachWelcomeMail;
use Spatie\Mailcoach\Models\Subscriber;

class WelcomeMail extends MailcoachWelcomeMail
{
    public Collection $posts;

    public function __construct(Subscriber $subscriber)
    {
        parent::__construct($subscriber);

        $this->posts = Post::published()
            ->originalContent()
            ->latests('publish_date')
            ->limit(10)
            ->get();
    }

    public function build()
    {
        return
            $this
                ->markdown('mail.welcome')
                ->subject('Welcome to the freek.dev newsletter');
    }
}
