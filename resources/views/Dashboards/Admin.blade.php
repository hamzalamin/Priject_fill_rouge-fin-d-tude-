Ayaaw am the admin
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
<a href="{{ route('CategoryForm') }}">add category</a>
<br>
<a href="{{ route('OperatuerForm') }}">add operatuers</a>
<br>
<a href="{{ route('getCart') }}">Cart</a>
<br>
<a href="{{ route('register') }}">regester</a>


