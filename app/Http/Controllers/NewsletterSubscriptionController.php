<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeToNewsletterRequest;
use Spatie\Mailcoach\Models\Subscriber;

class NewsletterSubscriptionController
{
    public function subscribe(SubscribeToNewsletterRequest $request)
    {
        $emailList = $request->emailList();

        Subscriber::createWithEmail($request->email)->subscribeTo($emailList);

        return redirect()->action([static::class, 'confirm']);
    }

    public function confirm()
    {
        return view('front.newsletter.confirm');
    }

    public function confirmed()
    {
        return view('front.newsletter.confirmed');
    }
}
