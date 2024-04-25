@include('navbar')
    
  
  <section class="content">
    <div class="firstdiv">
      <h1>Your Library in One</h1>
      <h1 class="secondH">CLICK</h1>
      @if (Route::has('login'))
      @auth
        {{-- <p class="secondH_" style="color: #000000">OUR MEDIA</p> --}}
      @else
      <div class="forphone">
      <button class="btn"><a href="{{ route('login') }}">Log In</a></button>
      <button class="btn"><a href="{{ route('register') }}">Sign Up</a></button>
      </div>
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
  <header class="section-title">
    <h2 class="hs">Our Services</h2>
</header>
  <section class="services">
    <div class="service-card">
        <img src="{{ asset('img/checkhands.png') }}" alt="">
        <h3>Trustworthy Solutions</h3>
        <p>Our commitment to quality and reliability ensures that you can trust us to deliver exceptional web development solutions tailored to your needs.</p>
    </div>
    <div class="service-card">
        <img src="{{ asset('img/livraisondegh.png') }}" alt="">
        <h3>On-Time Delivery</h3>
        <p>We understand the importance of timely delivery. With our mobile app development services, expect prompt and efficient delivery across iOS and Android platforms.</p>
    </div>
    <div class="service-card">
        <img src="{{ asset('img/gift.png') }}" alt="">
        <h3>Special Offers & Gifts</h3>
        <p>Unlock exciting opportunities with our digital marketing services. Benefit from special offers and gifts as we help you grow your online presence and reach your target audience.</p>
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

<div style="margin: 10px;"></div>
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
  <div class="testimonials">
    <h2 class="hs">Testimonial</h2>
    <div class="testimonial-slider">
        <div class="testimonial">
            <p>"I've been consistently impressed by the vast collection and excellent resources available at this library. The staff is incredibly helpful and knowledgeable, making every visit a pleasure."</p>
            <p class="author">- Emily Brown</p>
        </div>
        <div class="testimonial">
            <p>"The library's commitment to providing access to diverse literature and educational materials is truly commendable. It has become my go-to place for research and learning."</p>
            <p class="author">- Michael Johnson</p>
        </div>
        <div class="testimonial">
            <p>"I can't thank the library enough for its fantastic services. From well-organized events to comprehensive online resources, it's clear that they prioritize the needs of their patrons."</p>
            <p class="author">- Samantha Miller</p>
        </div>
        <div class="testimonial">
            <p>"The library has exceeded my expectations in every way. Its welcoming atmosphere and top-notch amenities make it a hub for intellectual exploration and community engagement."</p>
            <p class="author">- Christopher Lee</p>
        </div>
      </div>
    <button class="prev-btn">&#10094;</button>
    <button class="next-btn">&#10095;</button>
  </div>
  <div class="partner-section">
    <h3>Partners</h3>
    <div class="partner-logos">
      <img src="img/partner1.png" alt="">
      <img src="img/trello.png" alt="">
      <img src="img/jira.png" alt="">
      <img src="img/partner2.png" alt="">
      <img src="img/partner3.png" alt="">
    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function() {
  const testimonialsContainer = document.querySelector('.testimonial-slider');
  const prevButton = document.querySelector('.prev-btn');
  const nextButton = document.querySelector('.next-btn');

  let testimonialIndex = 0;

  function showTestimonial(index) {
      const testimonials = document.querySelectorAll('.testimonial');
      testimonials.forEach(testimonial => testimonial.style.display = 'none');
      testimonials[index].style.display = 'block';
  }

  function nextTestimonial() {
      testimonialIndex++;
      if (testimonialIndex >= testimonialsContainer.children.length) {
          testimonialIndex = 0;
      }
      showTestimonial(testimonialIndex);
  }

  function prevTestimonial() {
      testimonialIndex--;
      if (testimonialIndex < 0) {
          testimonialIndex = testimonialsContainer.children.length - 1;
      }
      showTestimonial(testimonialIndex);
  }

  nextButton.addEventListener('click', nextTestimonial);
  prevButton.addEventListener('click', prevTestimonial);

  showTestimonial(testimonialIndex);
});
</script>
@include('footer')