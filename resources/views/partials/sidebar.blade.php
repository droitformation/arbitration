<div class="six columns">
    <div class="img-holder">
        @if(isset($testimonial))
            <p class="testimonials-links">&rdquo; {!! $testimonial->phrase !!} &rdquo; <i>{!! $testimonial->name !!}</i></p>
        @endif
        <img src="{{ asset('frontend/images/'.$page->image) }}" alt="" />
    </div>
</div>
