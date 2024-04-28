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
<style>
    .side_bar.hidden {
    display: none;
}
</style>
@include('navbar')
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>
<section class="statistiques-cont">
    <div class="statistic-item">
        <h3>Total Operatuers</h3>
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
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>



