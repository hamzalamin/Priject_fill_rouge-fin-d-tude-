{{ $book->name }}
{{ $book->description }}
{{ $book->price }}
{{ $book->language }}
{{ $book->writer }}
<img src="{{ asset('storage/' . $book->image) }}" alt="Image">
{{ $book->categorys->name }}

<div class="buttons">
    @if ($book->number !== 0)
    <form action="{{ route('cart.store') }}" method="post">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="hidden" name="book_number" value="{{ $book->number }}">
        <input type="hidden" name="type" value="buy">
        <div><input type="number" class="book-quantity" name="qnt" value="1" min="1">
            
            <button type="submit">                    
                <img src="img/panie.png" alt=""><span style="margin: 5px">BUY</span>
            </button>  
            @endif
           
        </div>
    </form>    

    <form action="{{ route('reservBook') }}" method="post">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        @foreach ($copys as $copy)
        @if ($copy->book_id == $book->id && $copy->number !== 0)
        <p>price for reserv :{{ $copy->price_of_reserv }}dh</p>
        <input type="hidden" readonly name="price" value="{{$copy->price_of_reserv }}">
        <input type="hidden" name="number" value="{{ $copy->number }}">
        <input type="hidden" name="copy_id" value="{{ $copy->id }}">

        @endif
         @endforeach
         <input type="hidden" name="type" value="reserv">
        <button type="submit"><img src="img/reservee.png" alt=""><span style="margin: 5px">RESERVE</span></button>
    </form> 
 




