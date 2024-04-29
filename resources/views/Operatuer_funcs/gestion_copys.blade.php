@include('navbar')
<style>
    .side_bar.hidden {
    display: none;
}
</style>
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>
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
{{-- <section class="statistique">
<div class="card-container_category">
    <div>
        @foreach ($copysBooks as $copy)
        <div class="card_">
            <img src="{{ asset('storage/' . $copy->book->image) }}" alt="Atomic Habits">
            <div class="details">
              <h2>{{ $copy->book->name }}</h2>
              {{-- <p>{{ $copy->book->description }}</p>
              <p>{{ $copy->book->writer }}</p>
              <p>{{ $copy->price_of_reserv }} dh</p>
              <p>{{ $copy->number }} qte</p>
              <div class="buttons">
                <button hidden>
                    <form action="{{ route('deleteCopy', $copy) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this copy?')">
                            <img src="../img/deleteC.png" alt="">
                        </button>
                    </form>
                </button>
                
                <button> <a href="{{ route('UpdateCopy', $copy  ) }}"><img src="../img/editC.png" alt=""></a></button>
                
              </div>  
            </div>
        </div>
        @endforeach
    </div>
</div> --}}

<section class="statistique">
    <div class="card-container_category"> 
      @if ($copysBooks->isempty())
        no copys!
      @else
      @foreach ($copysBooks as $copy)
      <div class="card">
        <img src="{{ asset('storage/' . $copy->book->image) }}" alt="Atomic Habits">
        <div class="details">
            <h2>{{ $copy->book->name }}</h2>
            <p>{{ $copy->book->writer }}</p>
            <p>{{ $copy->price_of_reserv }} dh</p>
            <p>{{ $copy->number }} qte</p>

            <div class="buttons">
                <button hidden>
                    <form action="{{ route('deleteCopy', $copy) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this copy?')">
                            <img src="../img/deleteC.png" alt="">
                        </button>
                    </form>
                </button>
                
                <button> <a href="{{ route('UpdateCopy', $copy  ) }}"><img src="../img/editC.png" alt=""></a></button>
                
              </div>  
         </div>
       </div>
       @endforeach
      @endif
    </div>
    
</section>


</section>
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>
@include('sideBar')