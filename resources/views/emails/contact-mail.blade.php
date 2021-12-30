<h4>Hello {{ $contact->name }}
</h4>
<p>We have received your message. This is what you sent
</p>

<p>
    Name: {{ $contact->name }} <br>
    Email: {{ $contact->email }}<br>
    Phone: {{ $contact->phone }}<br>
    Message: {{ $contact->message }}
</p>

<p>We will reply you soon</p>
