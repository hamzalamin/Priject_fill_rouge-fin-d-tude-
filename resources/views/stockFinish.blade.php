@include('navbar')

<section class="statistique">
    <div class="card-container_category"> 
       @foreach ($booksFinish as $book)
       <div class="card">
        <img src="{{ asset('storage/' . $book->image) }}" alt="Atomic Habits">
        <div class="details">
          <h2>{{ $book->name }}</h2>
          <p>Writer: {{ $book->writer }}</p>
          <p style="color: rgb(222, 46, 46);">Rest Of Stock: {{ $book->number }}</p>

          </div>
        </div>
        @endforeach
    </div>
    
</section>

@include('sideBar')