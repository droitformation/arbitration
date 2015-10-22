<header>
    <div class="row">
        <div id="head" class="twelve columns">
            <div class="logo">
                <div class="logos saa">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('frontend/images/logos/saa.png') }}" alt="SAA logo" />
                    </a>
                </div>
                <div class="logos unine">
                    <a href="http://www.unine.ch" target="_blank">
                        <img src="{{ asset('frontend/images/logos/unine.png') }}" alt="unine logo" />
                    </a>
                </div>
                <div class="logos unilu last">
                    <a href="http://www.unilu.ch/eng/start.html" target="_blank">
                        <img src="{{ asset('frontend/images/logos/unilu.png') }}" alt="unilu logo" />
                    </a>
                </div>
                <hr/>
            </div>
        </div>
    </div>
    <div class="row">
        <nav class="twelve columns">
            <ul class="dropdown">

                @inject('worker', 'App\Saa\Page\Worker\PageWorkerInterface')

                @foreach($hierarchy as $page)
                    {!! $worker->renderMenu($page) !!}
                @endforeach

            </ul>
        </nav>
    </div>
</header>