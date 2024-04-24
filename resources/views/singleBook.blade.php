@include('navbar')
@if (session('success'))
    <div class="success">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session('error'))
    <div class="error">
        <p>{{ session('error') }}</p>
    </div>
@endif

<div class="product-container">
    <div class="product-image">
        <img src="{{ asset('storage/' . $book->image) }}" alt="IMAGE XXXX">
    </div>
    <div class="product-details">
        <h2>{{ $book->name }}</h2>
        <p class="price">{{ $book->price }} DH <span class="discounted">{{ $book->price }} DH</span></p>
        <p class="description">Aliquam condimentum dictum gravida. Sed eu odio id lorem fermentum faucibus. Cras tempor...</p>
        <p class="stock"><span class="textOngras">Language:</span> {{ $book->language }}</p>
        <p class="stock"><span class="textOngras">Writer:</span> {{ $book->writer }}</p>
        <p class="stock"><span class="textOngras">Stock:</span> {{ $book->number }} pcs</p>
        <div class="quantity">
            @if ($book->number !== 0)
            <form action="{{ route('cart.store') }}" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="hidden" name="book_number" value="{{ $book->number }}">
                <input type="hidden" name="type" value="buy">
                <div class="button_single_page">
                    <input type="number" name="qnt" value="1" min="1">
                    <button type="submit" class="btn-add-to-cart">
                        ADD TO CART
                    </button>
                </div>
            </form>
            @else
            <h2 style="color: rgb(247, 58, 58)">SOLD OUT FOR BUY</h2>
            @endif 
        </div>
        <div class="reserv">
            <form action="{{ route('reservBook') }}" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                @foreach ($copys as $copy)
                @if ($copy->book_id == $book->id && $copy->number !== 0)
                <p class="price"><span class="description"><span class="textOngras">Price for reservation:</span> {{ $copy->price_of_reserv }}Dh</p>
                <p class="description"><span class="textOngras">Stock of reservation:</span> {{ $copy->number }} pcs</p>
                <input type="hidden" readonly name="price" value="{{$copy->price_of_reserv }}">
                <input type="hidden" name="number" value="{{ $copy->number }}">
                <input type="hidden" name="copy_id" value="{{ $copy->id }}">
                @endif
                @endforeach
                <input type="hidden" name="type" value="reserv">
                <div class="button_single_page">
                    <button type="submit" class="btn-reserve">
                        RESERVE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('jss/main1.js') }}"></script>