@include('navbar')

{{-- <section class="content_of_books">
    <div class="search_back">
      <div class="search-container">
        <div class="search-container">
          <form id="searchForm" action="{{ route('search') }}" method="GET">
            <input type="text" id="searchInput" name="name" placeholder="Search by name...">
            <div class="category-buttons">
              @foreach ($categorys as $category)
              <input class="category-button" hidden type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
              <label class="category-button" for="category_{{ $category->id }}">{{ $category->name }}</label><br>
              @endforeach
          </div>
            <button type="submit">Search</button>
        </form>
      </div>
      </div>
      
    </div>
  </section> --}}

  <section class="content_of_books">
    <div class="search_back">
      <div class="search-container">
        <form id="searchForm" action="{{ route('search') }}" method="GET">
          <input type="text" id="searchInput" placeholder="Search books...">
          <div class="category-buttons">
            @foreach ($categorys as $category)
            <input class="category-button" hidden type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
            <label class="category-button" for="category_{{ $category->id }}">{{ $category->name }}</label><br>
            @endforeach
            {{-- <button class="category-button">Category 1</button> --}}
        </div>
          <button type="submit">Search</button>
        </form> 
      </div>
    </div>
</section> 


  <section class="All_books">

      <h2>All Books</h2>

    <div class="book_container">
      @foreach ($books as $book)
      <div class="card">
        <img src="{{ asset('storage/' . $book->image) }}"  alt="image here XXX">
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
          <button><a href="{{ route('singlePage', $book) }}" style="text-decoration: none; color:white;">Buy Now</a></button>
        </div>
      </div>    
      @endforeach
  </section> 
  <div style="margin-top: 10px;"></div>

@include('footer')
