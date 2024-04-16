@include('navbar')
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
                
                <button> <a href="{{ route('books.edit', $book) }}"><img src="../img/editC.png" alt=""></a></button>
                <p>you want to add copies for <a href="{{ route('reservationform', $book) }}">reservation</a> ?</p>
              </div>  
            </div>
        </div>
        @endforeach
    </div>
</section>

@include('sideBar')