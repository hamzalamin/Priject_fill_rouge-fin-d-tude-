@include('navbar')
    
<section class="content">
    <h2>Welcome to Our Website</h2>
    <p>This is the content area. You can put your content here.</p>
    @if (Route::has('login'))
    @auth
        <p>we get new books</p>
    @else
        <!-- User is not logged in -->
        <button><a href="{{ route('login') }}" style="text-decoration: none; color: white;">Log in</a></button>
        <button style="background-color: #b7450a;"><a href="{{ route('register') }}" style="text-decoration: none; color: white;">Sign up</a></button>
    @endauth
@endif
  </section>
  
  <section class="about">
      <h2>About us</h2>
      <div class="card-container">
        <div class="card">
          <img src="img/bookReserv.jpg" alt="Image">
            <h4>you can reserv books</h4>
            <p>we offre alote of books with defrent languages, you can reserv it now .</p>
        </div>
        <div class="card">
          <img src="img/buy.jpg" alt="Image">
          <h4>you can reserv books</h4>
          <p>we offre alote of books with defrent languages, you can reserv it now .</p>
        </div>
        <div class="card">
          <img src="img/best.jpg" alt="Image">
          <h4>you can reserv books</h4>
          <p>we offre alote of books with defrent languages, you can reserv it now .</p>
        </div>
        <div class="card">
          <img src="img/way.jpg" alt="Image">
          <h4>you can reserv books</h4>
          <p>we offre alote of books with defrent languages, you can reserv it now .</p>
        </div>
        <div class="card">
          <img src="img/laivreur.jpg" alt="Image">
          <h4>you can reserv books</h4>
          <p>we offre alote of books with defrent languages, you can reserv it now .</p>
        </div>
      </div>
  </section>
  
  <div style="margin: 90px;"></div>

  <section class="about_">
    <h2>Last 3 categorys</h2>
    <div class="card-container">
        @foreach ($categorys as $category)
        <div class="card">
        <img src="{{ $category->image }}" alt="Image">
          <h4>{{ $category->name }}</h4>
          <p>{{ $category->description }} .</p>
        </div>
        @endforeach
</section>

<section class="books">
    <div class="video-container">
        <video autoplay loop muted>
          <source src="img/Book Promotional Video Template.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <h2>last 3 books</h2>

    <div class="book_container">
        @foreach ($books as $book)
      <div class="book_card">
        <img src="{{ asset('storage/' . $book->image) }}" alt="Image">
        <div class="book_info">
          <h4>{{ $book->name }}</h4>
           <p>{{ $book->description }}</p>
           <p>{{ $book->price }}</p>
          <p>{{ $book->writer }}</p>
        </div>
        <div class="buttons">
            <form action="{{ route('cart.store') }}" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="hidden" name="book_number" value="{{ $book->number }}">
                <input type="hidden" name="type" value="buy">
                <div><input style="width: 50px" type="number" class="book-quantity" name="qnt" value="1" min="1">
                <button type="submit">                
                    
                    <img src="img/panie.png" alt=""><span style="margin: 5px">`` BUY</span>
                </button>
            </div>
            </form>    
            <form action="{{ route('reservBook') }}" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                @foreach ($copys as $copy)
                @if ($copy->book_id == $book->id)
                <p>price for reserv :{{ $copy->price_of_reserv }}dh</p>
                <input type="hidden" readonly name="price" value="{{$copy->price_of_reserv }}">
                <input type="hidden" name="number" value="{{ $copy->number }}">
                <input type="hidden" name="copy_id" value="{{ $copy->id }}">

                @endif
                 @endforeach
                 <button type="submit"><img src="img/reservee.png" alt=""><span style="margin: 5px">RESERVE</span></button>

            </form> 
        </div>
      </div>
      @endforeach

    </div>
  </section>


  <section class="pub" id="pub">
    <h2>Our partners</h2>
    <div class="pub_pic">
        <img src="img/partner1.png" alt="">
        <img src="img/trello.png" alt="">
        <img src="img/jira.png" alt="">
        <img src="img/partner2.png" alt="">
        <img src="img/partner3.png" alt="">
    </div>
    <div class="container">
        <div class="box">
            <h2 id="booksCount">+ <span id="bookCount" style="color: rgb(0, 89, 255);">45</span> books</h2>
            <img src="img/diffrentBook.jpg" alt="Book Image">
        </div>
        <div class="box">
            <h2 id="peopleCount">+ <span id="peopleCountValue" style="color: rgb(0, 89, 255);">24</span> users</h2>
            <img src="img/users.jpg" alt="People Image">
        </div>
    </div>
    <div style="margin-bottom: 100px;"></div>
</section>

@include('footer')