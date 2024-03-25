ayaaw im the client
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
<a href="{{ route('getCart') }}">Cart</a>
<br>
<a href="{{ route('register') }}">regester</a><br>
<a href="{{ route('home') }}">home</a>
