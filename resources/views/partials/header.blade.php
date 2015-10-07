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

                <li><a href="{{ url('/') }}" class="<?php echo (Request::is('/') || Request::is('home') ? 'active' : '') ?>">Home</a></li>
                <li><a href="{{ url('site/vision') }}" class="<?php echo (Request::is('vision') ? 'active' : '') ?>">Vision</a></li>
                <li><a href="{{ url('site/about') }}" class="<?php echo (Request::is('about') ? 'active' : '') ?>">About</a></li>
                <li><a href="{{ url('site/endorse') }}" class="<?php echo (Request::is('endorse') ? 'active' : '') ?>">Endorsement</a></li>

                <li><a href="{{ url('courses') }}" class="<?php echo (Request::is('courses') ? 'active' : '') ?>">Courses</a>
                    <ul class="sub_menu">
                        <?php if(!empty($menu_courses)){ ?>
                        <li><a href="{{ url('course') }}/<?php echo $menu_courses['cas']; ?>">CAS in Arbitration</a></li>
                        <li class="lastitem"><a href="{{ url('course') }}<?php echo $menu_courses['arbp']; ?>">SAA Practitioner's Course</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="{{ url('site/tuition') }}" class="<?php echo (Request::is('tuition') ? 'active' : '') ?>">Tuition</a></li>
                <li><a href="{{ url('site/team') }}" class="<?php echo (Request::is('team') ? 'active' : '') ?>">Team</a>
                    <ul class="sub_menu">
                        <li><a href="{{ url('team/council') }}">The SAA Academic Council</a></li>
                        <li><a href="{{ url('team/guest') }}">The SAA guest lecturers</a></li>
                        <li class="lastitem"><a href="{{ url('team/committee') }}">The SAA Advisory Committee</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('alumni') }}" class="<?php echo (Request::is('alumni') ? 'active' : '') ?>">Alumni</a></li>
                <li><a href="#" class="<?php echo (Request::is('site/contact') ? 'active' : '') ?>">Contact</a>
                    <ul class="sub_menu">
                        <li><a href="{{ url('site/contact') }}">Address</a></li>
                        <li class="lastitem"><a href="{{ url('form') }}">Contact Form</a></li>
                    </ul>
                </li>
                <li class="grant"><a href="{{ url('site/grant') }}">SAA Grant</a></li>
                <li class="grant"><a href="{{ url('site/hill') }}">Hill Grant</a></li>
                <li class="right"><a href="{{ url('auth/login') }}">User Login</a></li>

            </ul>
        </nav>
    </div>
</header>