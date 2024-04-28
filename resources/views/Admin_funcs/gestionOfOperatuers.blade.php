@include('navbar')
<style>
    .pagination {
    margin-top: 20px;
}

.pagination ul {
    list-style: none;
  padding: 0;
  text-align: center;
  margin-top: 0px;
  margin-left: 606px;
}

.pagination li {
    display: inline-block;
    margin-right: 5px;
}

.pagination li a,
.pagination li.disabled {
    display: inline-block;
    padding: 6px 12px;
    text-decoration: none;
    color: #333;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.pagination li.active a {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}
.side_bar.hidden {
    display: none;
}
</style>
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>
@if (session('success'))
    <div class="alert success">
        <p>{{ session('success') }}</p>
    </div>
@endif
@if (session('error'))
    <div class="alert error">
        <p>{{ session('error') }}</p>
    </div>
@endif
<div  class="add">
    <a href="{{ route('OperatuerForm') }}"><img src="../../img/AddC.png" alt=""></a>
    </div>
    <section class="statistique">
        <div class="card-container_category">
            @foreach ($users as $user)

            <div class="card_category">
                <h4>{{ $user->name }}</h4>
                <p>{{ $user->email }} .</p>
                <p>ROLE : {{ $user->roles }}</p>
                <div class="buttons">
                <button hidden>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="../../img/deleteC.png" alt=""></button>
                    </form>
                </button>
                <button>
                    <a href="{{ route('users.edit', $user) }}"><img src="../../img/editC.png" alt=""></a>
                </button>
                </div>
            </div>
            @endforeach
            <div class="pagination">
                <ul>
                    @if ($users->onFirstPage())
                        <li class="disabled">&laquo;</li>
                    @else
                        <li><a href="{{ $users->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif
            
                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        <li class="{{ $page == $users->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
            
                    @if ($users->hasMorePages())
                        <li><a href="{{ $users->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                        <li class="disabled">&raquo;</li>
                    @endif
                </ul>
            </div>
            
    </section>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
        }
    </script>
@include('sideBar')
