@include('navbar')
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
<section class="cart">
    @if ($cart->isEmpty())
        <div class="empty-cart-message">
            <p>Your panier is empty.</p>
        </div>
    @else
        @foreach ($cart as $cartItem)
            @if ($cartItem->type == 'buy')
                <div class="cart-item">
                    <img src="{{ asset('storage/' . $cartItem->book->image) }}" alt="Book Image">
                    <div class="cart-item-details">
                        <h4>{{ $cartItem->book->name }}</h4>
                        <p>{{ $cartItem->book->price }} DH</p>
                        <p>Quantity : {{ $cartItem->qnt }} pcs</p>
                        <p>Total: {{ $cartItem->book->price * $cartItem->qnt }} DH</p>
                        <form action="{{ route('cart.destroy', $cartItem) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="cart-item-actions">DELETE</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="cart-item">
                    <img src="{{ asset('storage/' . $cartItem->copy->book->image) }}" alt="Book Image">
                    <div class="cart-item-details">
                        <h4>{{ $cartItem->copy->book->name }}</h4>
                        <p>{{ $cartItem->copy->price_of_reserv }} DH</p>
                        <p>You have to return this book after 3 days</p>
                        <form action="{{ route('cart.destroy' , $cartItem) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="cart-item-actions">DELETE</button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="cart-total">
            <p>TOTAL PRICE : {{ $totalPrice }} DH</p>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <input type='hidden' name='total' value='{{ $totalPrice }}'>
                @foreach ($cart as $cartItem)
                    @if ($cartItem->book_id == null)
                        <input type="hidden" name="cart_name[]" value="{{ $cartItem->copy->book->name }}">
                    @elseif ($cartItem->copy_id == null)
                        <input type="hidden" name="cart_name[]" value="{{ $cartItem->book->name }}">
                    @endif
                    <input type="hidden" name="cart_id[]" value="{{ $cartItem->id }}">
                @endforeach
                <button type='submit'>Checkout</button>
            </form>
        </div>
    @endif
</section>

{{-- @include('footer') --}}
<script src="{{ asset('jss/main1.js') }}"></script>
