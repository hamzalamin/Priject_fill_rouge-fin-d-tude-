@include('navbar')
    
  
  <section class="content">
    <div class="firstdiv">
      <h1>Your Library in One</h1>
      <h1 class="secondH">CLICK</h1>
      @if (Route::has('login'))
      @auth
        <p class="secondH_" style="color: #f4e591">OUR MEDIA</p>
      @else
      <button class="btn"><a href="{{ route('login') }}">Log In</a></button>
      <button class="btn"><a href="{{ route('register') }}">Sign Up</a></button>
      @endauth
      @endif
      <img class="imagback" src="img/BooksbackC.png" alt="">
    </div>
    <div class="icons">
      <img src="img/FB.png" alt="">
      <img src="img/instagram.png" alt="">
      <img src="img/linkedin.png" alt="">
    </div>
  </section>

  <section class="about_">
    <h2 id="title">Popular categorys</h2>
    @foreach ($categorys as $category)
    <div class="category">
      <img src="{{ asset('storage/' . $category->image) }}" alt="#">
      {{ $category->name }}
    </div>
    @endforeach
  </section>


  <section class="about">
    <h1>Popular Books</h1>
    <div class="card-container">
      @foreach ($books as $book)
      <div class="card">
        <img src="{{ asset('storage/' . $book->image) }}" alt="Atomic Habits">
        <div class="details">
          <h2>{{ $book->name }}</h2>
          <p>{{ $book->writer }}</p>
          <div class="ratings">
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9734;</span>
          </div>
          <button><a style="text-decoration: none ; color:aliceblue" href="{{ route('singlePage', $book) }}">Show this</a></button>
        </div>
      </div>
      @endforeach
    </div>
    <a href="{{ route('Books') }}" style="text-decoration: none;"><button class="see-all-books-btn">
      See All Books 
      <img src="img/seemore.png" alt="">
  </button></a>
  
  
</section>

<div style="margin: 90px;"></div>
<section class="books">
  <div>
      <h2 class="title">ABOUT US</h2>
      <div class="stats">
        <div class="user-stats">
          <h2 class="booksCount">+ <span id="bookCount" style="color: rgb(0, 89, 255);">45</span> books</h2>
          <div class="user-images"><img src="img/BookCC.png" alt="Book Image"></div>
      </div>
      <div class="book-stats">
          <h2 class="peopleCount">+ <span id="peopleCountValue" style="color: rgb(0, 89, 255);">24</span> users</h2>
          <div class="book-images"><img src="img/users.jpg" alt="People Image"></div>

      </div>
    </div>
  </div>
  <div class="partner-section">
    <h3>Partner</h3>
    <div class="partner-logos">
      <img src="img/partner1.png" alt="">
      <img src="img/trello.png" alt="">
      <img src="img/jira.png" alt="">
      <img src="img/partner2.png" alt="">
      <img src="img/partner3.png" alt="">
    </div>
  </div>
</section>
{{-- <script src="{{ asset('jss/main1.js') }}"></script> --}}
@include('footer')