@include('navbar')
<style>
  /* .container_of_isreturn{
      margin-left: 279px;
    margin-top: 39px;
    border: #f7e352 solid 1px;
    padding: 14px;
    border-radius: 5px;
    width: 66%;
  } */
  .side_bar.hidden {
      display: none;
  }
  </style>
  <div class="burger-menu-icon" onclick="toggleSidebar()">
      <span class="bara">Dashboard</span>
  </div>
<section class="statistique">
    <div class="card-container_category"> 
      @if ($booksFinish->isempty())
        Your stock right
      @else
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
      @endif
    </div>
    
</section>

@include('sideBar')
<script>
  function toggleSidebar() {
      var sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
  }
</script>