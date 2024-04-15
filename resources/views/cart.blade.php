

@include('navbar')

<section class="cart">
    @foreach ($cart as $cartItem)
    @if ($cartItem->type == 'buy')
    <div class="cart-item">
      <img src="{{ asset('storage/' . $cartItem->book->image) }}" alt="Book Image">
      <div class="cart-item-details">
        <h4>{{ $cartItem->book->name }}</h4>
        <p>{{ $cartItem->book->price }} DH</p>
        <p>Quntity : {{ $cartItem->qnt }} pcs</p>
        <p>Total: {{ $cartItem->book->price * $cartItem->qnt }} DH</p>
        <!-- <div > -->
            <form action="{{ route('cart.destroy', $cartItem) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="cart-item-actions"><img src="../../img/delete.png" alt=""></button>
            </form>          <!-- </div> -->
      </div>
    </div>
    @else
    <div class="cart-item">
        <img src="{{ asset('storage/' . $cartItem->copy->book->image) }}" alt="Book Image">
        <div class="cart-item-details">
          <h4>{{ $cartItem->copy->book->name }}</h4>
          <p>{{ $cartItem->copy->price_of_reserv }} DH</p>
          <p>you have to return this book after 3 days</p>
          <!-- <div > -->
            <form action="{{ route('cart.destroy' , $cartItem) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="cart-item-actions"><img src="../../img/delete.png" alt=""></button>
            </form>
              
            <!-- </div> -->
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
        {{-- <input type="hidden" name="created_at" value="{{ $cartItem->updated_at }}"> --}}
        {{-- <input type="" name="updated_at" value="{{ $cartItem->updated_at }}"> --}}
   
        <input type="hidden" name="cart_id[]" value="{{ $cartItem->id }}">

        @endforeach
        <button type='submit'>checkout</button>
    </form>  
    </div>
    
  </section>

{{-- @include('footer') --}}