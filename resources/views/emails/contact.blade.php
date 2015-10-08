<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body style="padding: 20px;">
        <h2 style="font-family: Arial, Helvetica, sans-serif; margin-bottom: 20px;">Request from http://www.swiss-arbitration-academy.ch</h2>
        <div style="font-family: Arial, Helvetica, sans-serif;">

            <h3>Information request</h3>
            <div>
                <strong style="display:block; width:440px;">Title:</strong>{{ $title }}<br/>
                <strong style="display:block; width:240px;">First name and Name:</strong>{{ $first_name }} {{ $last_name }}<br/>
                <strong style="display:block; width:240px;">Street:</strong>{{ $street }} <br/>
                <strong style="display:block; width:240px;">ZIP / Place / State :</strong>{{ $zip or '' }} {{ $place or '' }} {{ $state or '' }} <br/>
                <strong style="display:block; width:240px;">Country :</strong>{{ $country }} <br/>
                <strong style="display:block; width:240px;">Tel. :</strong>{{ $telephone or ''}} <br/>
                <strong style="display:block; width:240px;">Email: </strong>{{ $email }} <br/>
                <strong style="display:block; width:240px;">Remarks: </strong>{{ $remarks or '' }} <br/>
                <strong style="display:block; width:240px;">How did you hear about us: </strong>{{ $about or '' }} <br/>
            </div>

            <p style="font-family: Arial, Helvetica, sans-serif;"><strong>{{ $first_name }} {{ $last_name }}</strong> - <a href="mailto:{{ $email }}">{{ $email }}</a></p>

        </div>
        <p><a style="color: #444; font-size: 13px;" href="http://cas-arbitration.ch">http://cas-arbitration.ch</a></p>
    </body>
</html>