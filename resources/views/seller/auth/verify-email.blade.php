{{ view('seller.layout.alerts') }}

<h1>email varification link is sent to email.</h1>
<form action="{{ route('verification.send') }}" method="post">
    @csrf
    <button type="submit">Resend</button>
</form>
