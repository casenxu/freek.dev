<?php

namespace App\Mail;

use Spatie\Mailcoach\Domain\Campaign\Mails\WelcomeMail as MailcoachWelcomeMail;
use Spatie\Mailcoach\Domain\TransactionalMail\Mails\Concerns\StoresMail;
use Spatie\Mailcoach\Domain\TransactionalMail\Mails\Concerns\UsesMailcoachTemplate;

class WelcomeMail extends MailcoachWelcomeMail
{
    use StoresMail;
    use UsesMailcoachTemplate;

    public function build()
    {
        return $this->template('welcome');
    }
}
