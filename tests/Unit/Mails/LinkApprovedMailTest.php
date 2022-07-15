<?php

use App\Mail\LinkApprovedMail;
use App\Models\Link;

test('the link approved mail can be rendered', function () {
    $link = Link::factory()->create();

    expect((new LinkApprovedMail($link))->render())->toBeString();
});
