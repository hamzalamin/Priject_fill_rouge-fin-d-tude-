<form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $category->name }}">
    <input type="text" name="description" value="{{ $category->description }}">
    <input type="file" name="image">
    <button type="submit">Update Category</button>
</form>