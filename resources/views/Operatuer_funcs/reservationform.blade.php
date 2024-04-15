@include('navbar')

<h1 style="display: flex; justify-content: center; margin-bottom: -200px; margin-top: 100px; color: brown; margin-left: 80px;">Add '<span style="color: rgb(147, 140, 140);">{{ $book->name }}</span>' for reservation</h1>
<section class="form_section">
    <form action="{{ route('addReservBook', $book) }}" method="POST">
        @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <label for="">Price for reservation</label>
            <input type="float" name="price_of_reserv">
            <label for="">Stock of reservation</label>
            <input type="number" name="number">

            <button type="submit">Add Book</button>
        </form>
        
</section>

@include('sideBar')