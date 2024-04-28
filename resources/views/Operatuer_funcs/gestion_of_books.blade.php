@include('navbar')
<style>
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
    <a href="{{ route('bookForm') }}"><img src="../../img/AddC.png" alt=""></a>
</div>
<section class="statistique">
    <div class="card-container_category">
        @foreach ($books as $book)
        <div class="card">
            <img src="{{ asset('storage/' . $book->image) }}" alt="Atomic Habits">
            <div class="details">
              <h2>{{ $book->name }}</h2>
              <p>{{ $book->description }}</p>
              <p>{{ $book->writer }}</p>
              <p>{{ $book->price }} dh</p>
              <p>{{ $book->number }} qte</p>
              <div class="buttons">
                <button hidden>
                    <form action="{{ route('books.destroy', $book) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')">
                            <img src="../img/deleteC.png" alt="">
                        </button>
                    </form>
                </button>
                
                <button> <a href="{{ route('books.edit', $book  ) }}"><img src="../img/editC.png" alt=""></a></button>
                <p>you want to add copies for <a href="{{ route('reservationform', $book) }}">reservation</a> ?</p>
              </div>  
            </div>
        </div>
        @endforeach
    </div>
    
</section>
<div class="pagination">
    <ul>
        @if ($books->onFirstPage())
            <li class="disabled">&laquo;</li>
        @else
            <li><a href="{{ $books->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
            <li class="{{ $page == $books->currentPage() ? 'active' : '' }}">
                <a href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach

        @if ($books->hasMorePages())
            <li><a href="{{ $books->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled">&raquo;</li>
        @endif
    </ul>
</div>
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>
@include('sideBar')