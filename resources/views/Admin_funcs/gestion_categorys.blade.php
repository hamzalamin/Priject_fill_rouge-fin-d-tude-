@include('navbar')
<style>

</style>
@if (session('success'))
    <div class="alert success">
        <p>{{ session('success') }}</p>
    </div>
@endif
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
            <div class="pagination">
                <ul>
                    @if ($categorys->onFirstPage())
                        <li class="disabled">&laquo;</li>
                    @else
                        <li><a href="{{ $categorys->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif
            
                    @foreach ($categorys->getUrlRange(1, $categorys->lastPage()) as $page => $url)
                        <li class="{{ $page == $categorys->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
            
                    @if ($categorys->hasMorePages())
                        <li><a href="{{ $categorys->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                        <li class="disabled">&raquo;</li>
                    @endif
                </ul>
            </div>
    </section>


 
@include('sideBar')
