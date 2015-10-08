
@extends('layouts.master')
@section('content')

    <div class="bloc bloc-smaller six columns">

            @if(Session::has('message'))
                <div class="ok"><p> {!! Session::get('message') !!}</p></div>
            @endif

            @if( isset($errors) && $errors->has() || Session::has('status'))
                <div class="errors">
                    @foreach($errors->all() as $message)
                        <p>{!! $message !!}</p>
                    @endforeach
                </div>
            @endif

            <h1>Contact form</h1>

            <form action="{{ url('sendMessage') }}" method="POST" id="form">
                {!! csrf_field() !!}

                <fieldset id="user-details">

                    <p>
                        <label for="nom">Title</label>
                        <input type="checkbox" name="title" value="Mr."> Mr.
                        <input type="checkbox" name="title" value="Mrs.">Mrs.
                    </p>

                    <p><label for="first_name">First name *</label>
                        <input type="text" class=":required" name="first_name" value="<?php echo old('first_name'); ?>"  />
                    </p>

                    <p><label for="last_name">Name *</label>
                        <input type="text" class=":required" name="last_name" value="<?php echo old('last_name'); ?>"  />
                    </p>

                    <p><label for="street">Street *</label>
                        <input type="text" class=":required" name="street" value="<?php echo old('street'); ?>"  />
                    </p>

                    <p><label for="zip">Zip *</label>
                        <input type="text" class=":required" name="zip" value="<?php echo old('zip'); ?>"  />
                    </p>

                    <p><label for="place">Place *</label>
                        <input type="text" class=":required" name="place" value="<?php echo old('place'); ?>"  />
                    </p>

                    <p><label for="state">State</label>
                        <input type="text" class=":required" name="state" value="<?php echo old('state'); ?>"  />
                    </p>

                    <p><label for="country">Country *</label>
                        <input type="text" class=":required" name="country" value="<?php echo old('country'); ?>"  />
                    </p>

                    <p><label for="email">Email *</label>
                        <input type="text" class=":email :required" name="email" value="<?php echo old('email'); ?>"  />
                    </p>

                    <p><label for="telephone">Telephone</label>
                        <input type="text" class=":required" name="telephone" value="<?php echo old('telephone'); ?>"  />
                    </p>

                    <p><label for="remarks">Remarks</label>
                        <textarea rows="17" class=":required" cols="30" style="height:70px;" name="remarks"><?php echo old('remarks'); ?></textarea>
                    </p>

                    <p><label for="about">How did you hear about us? </label>
                        <textarea rows="17" class=":required" cols="30" name="about"><?php echo old('about'); ?></textarea>
                    </p>
                    <input type="submit" value="Send" name="submit" class="submit" />
                </fieldset><!--end user-details-->

                <div style="display: none;"><input name="hello" type="text" /></div><!--honeypot-->
            </form>
    </div>

    <div class="six columns">
        <div class="img-holder">
            <img src="{{ asset('frontend/images/img2.jpg') }}" alt="" />
        </div>
    </div>

@stop