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
        <form id="myForm">
        <input type="text" name="name" id="searchInput" placeholder="Search books...">
          <div class="category-buttons">
            @foreach ($categorys as $category)
            <input class="category-label" hidden type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
            <label class="category-button" for="category_{{ $category->id }}">{{ $category->name }}</label><br>
            @endforeach
            {{-- <button class="category-button">Category 1</button> --}}
          </div>
          <button type="submit">Search</button>
        </form> 
      </div>
    </div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.category-checkbox');
    
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            const label = this.nextElementSibling;
            if (this.checked) {
                label.classList.add('selected');
            } else {
                label.classList.remove('selected');
            }
        });
    });
});

</script>
</section> 


  <section class="All_books">

      <h2>All Books</h2>

    <div class="book_container" id="data">
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
    </div>

    <div class="pagination">
      <ul>
          @if ($books->onFirstPage())
              <li class="disabled">&laquo;</li>
          @else
              <li><a href="{{ $books->previousPageUrl() }}" rel="prev">&laquo;</a></li>
          @endif
  
          @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
              <li class="{{ $page == $books->currentPage() ? 'active' : '' }}">
                  <a href="{{ $url }}">{{ $page }}</a>
              </li>
          @endforeach
  
          @if ($books->hasMorePages())
              <li><a href="{{ $books->nextPageUrl() }}" rel="next">&raquo;</a></li>
          @else
              <li class="disabled">&raquo;</li>
          @endif
      </ul>
  </div>
  </section> 

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<section class="books" style="margin-top: -16px;">
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
<script src="{{ asset('jss/ajax.js') }}"></script>
{{-- <script src="{{ asset('js') }}"></script> --}}

@include('footer')
