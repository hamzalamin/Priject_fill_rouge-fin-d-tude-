ayaaw im the operatuer
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
<a href="{{ route('bookForm') }}">Add book</a><br>
<a href="{{ route('getCart') }}">Cart</a>
<br>
<a href="{{ route('register') }}">regester</a>
