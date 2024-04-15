{{-- Ayaaw am the admin
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
<a href="{{ route('register') }}">regester</a> --}}

@include('navbar')

<section class="statistique">
    <div class="statistic-item">
        <h3>Total Users</h3>
        <p>{{ $users }}</p>
    </div>
    <div class="statistic-item">
        <h3>Total Books</h3>
        <p>{{ $books }}</p>
    </div>
    <div class="statistic-item">
        <h3>Total Categories</h3>
        <p>{{ $categorys }}</p>
    </div>
</section>
@include('sideBar')


