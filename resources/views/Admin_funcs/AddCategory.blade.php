<form action="{{ route('AddCategory') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name">
    <input type="text" name="description">
    <input type="file" name="image">
    <button type="submit">submit</button>
</form>
<br>
<hr>
<br>
@foreach ($categorys as $category)
    {{ $category->name }}
    <br>
    {{ $category->description }}    
    <br>
    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image">
    <hr>  
    <form action="{{ route('categories.destroy', $category) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Category</button>
    </form>
    <a href="{{ route('categories.edit', $category) }}">update</a>
@endforeach