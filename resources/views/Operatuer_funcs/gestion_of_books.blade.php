@include('navbar')
<div  class="add">
    <a href="{{ route('bookForm') }}"><img src="../img/add.png" alt=""></a>
</div>
<section class="statistique">
    <div class="card-container_category">
        @foreach ($books as $book)
        <div class="card_category">
          <img src="{{ asset('storage/' . $book->image) }}" alt="Image">
            <h4>{{ $book->name }}</h4>
            <p>{{ $book->description }} .</p>
            <p>stock: {{ $book->number }}</p>
            <p>{{ $book->price }} dh</p>
            <p>{{ $book->language }}</p>
            <p>writer: {{ $book->writer }}</p>
            <p>category: {{ $book->categorys->name }}</p>
            <div class="buttons">
                <button hidden>
                <form action="{{ route('books.destroy', $book) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')"><img src="../img/delete.png" alt=""></button>
                </form>
            </button>
                <button> <a href="{{ route('books.edit', $book) }}"><img src="../img/edit.png" alt=""></a></button>
                <p>you want to add copies for <a href="{{ route('reservationform', $book) }}">reservation</a> ?</p>
                {{-- <button><img src="img/delete.png" alt=""></button> --}}
            </div>
        </div>
        @endforeach
    </div>
</section>
@include('sideBar')