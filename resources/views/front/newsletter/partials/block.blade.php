<div class="-mx-4 sm:mx-0 p-4 sm:p-6 md:p-8 bg-yellow-50 border-b-5 border-yellow-200 text-sm text-gray-700 {{ $class ?? '' }} markup">
    <p class="font-extrabold text-2xl leading-tight mb-4 text-black">
        Stay up to date with all things Laravel, PHP, and JavaScript.
    </p>
    <p class="mb-2">
        <a href="https://twitter.com/freekmurze">Follow me on Twitter</a>. I regularly tweet out programming tips, and what I myself have learned in ongoing projects.
    </p>
    <p class="mb-2">
        Every month I send out a newsletter containing lots of interesting stuff for the modern PHP developer.
    </p>
    <p class="mb-3">
        Expect quick tips & tricks, interesting tutorials, opinions and packages. Because I work with Laravel every day there is an emphasis on that framework.
    </p>
    @include('front.newsletter.partials.form', ['class' => 'mb-3'])
    <p>
        Rest assured that I will only use your email address to send you the newsletter and will not use it for any other purposes.
    </p>

</div>
