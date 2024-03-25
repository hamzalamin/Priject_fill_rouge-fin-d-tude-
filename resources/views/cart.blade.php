@foreach ($cart as $cartItem)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $cartItem->book->image) }}" class="img-fluid rounded-start" alt="Book Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $cartItem->book->name }}</h5>
                    <p class="card-text">{{ $cartItem->book->description }}</p>
                    {{-- <p class="card-text"><strong>Price:</strong> ${{ $cartItem->book->price }}</p> --}}
                    <p class="card-text">Total: {{ $cartItem->book->price * $cartItem->qnt }}$</p>

                    <p class="card-text"><strong>Quantity:</strong> {{ $cartItem->qnt }}</p>
                </div>
            </div>
        </div>
    </div>

@endforeach

Total Price: {{ $totalPrice }}$
<form action="{{ route('checkout') }}" method="POST">
    @csrf
    <input type='hidden' name='total' value='{{ $totalPrice }}'>
    <input type='hidden' name='panier' value='{{ $cartItem->panier_id }}'>
    <button type='submit'>checkout</button>
</form> 