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
@foreach ($ticket as $tic)
<section class="ticket">
    <h2>TICKET </h2>
    <p>Thank you for using our service!</p>

    <hr style="color: white; margin-bottom:30px">
    <p>total price : {{ $tic->total_price }} DH</p>
    <p>Date: {{ $tic->updated_at }}</p>
    @foreach ($bookReserved as $bookReserve)
    {{-- @foreach ($cartIds as $cart) --}}
    {{-- @if ($bookReserve->book_id === null)
    <p>THE BOOK '{{ $bookReserve->copy->book->name }}' YOU HAVE TO RETURN IT AFTER 3 DAYS </p>
    @endif --}}
    {{-- @endforeach   --}}
    @endforeach
    <div class="info-row">
        <form action="{{ route('RateHere', $tic->id) }}" method="post">
            <input hidden type="text" name="user_id" value="{{ $tic->user_id }}">
            <input hidden type="text" name="ticket_id" value="{{ $tic->id }}">
            <input hidden type="text" name="price" value="{{ $tic->total_price }}">
            @csrf
                <button type="submit" class="botonaRatin">Rate Here</button>
        </form>
    </div>
    <hr style="color: white; margin-bottom:30px">
    <p>Please keep this ticket safe.</p>
</section>
@endforeach

<script src="{{ asset('jss/main1.js') }}"></script>
















