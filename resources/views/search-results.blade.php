@include('navbar')

<section class="content_of_books">
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
  </section>

  <section class="All_books">

        <h2>All Books</h2>

    <div class="book_container">
    @foreach ($books as $book)
    <a href="{{ route('singlePage', $book) }}" style="text-decoration: none;"><div class="book_card">
      <img src="{{ asset('storage/' . $book->image) }}" alt="Image">
      <div class="book_info">
        <h4>{{ $book->name }}</h4>
        <p>{{ $book->description }}</p>
        <p>{{ $book->price }}</p>
        <p>{{ $book->writer }}</p>
      </div>
      
      <div class="buttons">
                  <button type="">               
                      <span style="margin: 5px">SHOW THIS </span>
                  </button>
              {{-- </div>             --}}
      </div></a>
    </div>
      @endforeach

  </section> 
  <div style="margin-top: 10px;"></div>

@include('footer')
