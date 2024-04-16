@include('navbar')
<div  class="add">
    <a href="{{ route('CategoryForm') }}"><img src="../img/AddC.png" alt=""></a>
    </div>
    <section class="statistique">
        <div class="card-container_category">
            @foreach ($categorys as $category)

            <div class="card_category">
                <img src="{{ asset('storage/' . $category->image) }}" alt="Image">
                <h4>{{ $category->name }}</h4>
                <p>{{ $category->description }} .</p>
                <div class="buttons">
                <button hidden>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="../img/deleteC.png" alt=""></button>
                    </form>
                </button>
                <button>
                    <a href="{{ route('categories.edit', $category) }}"><img src="../img/editC.png" alt=""></a>
                </button>
                </div>
            </div>
            @endforeach

    </section>


 
@include('sideBar')