<form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name', $book->name) }}">
    
    <label for="description">Description</label>
    <input type="text" name="description" value="{{ old('description', $book->description) }}">
    
    <label for="number">Number</label>
    <input type="number" name="number" value="{{ old('number', $book->number) }}">
    
    <label for="price">Price</label>
    <input type="float" name="price" value="{{ old('price', $book->price) }}">
    
    <label for="language">Language</label>
    <input type="text" name="language" value="{{ old('language', $book->language) }}">
    
    <label for="writer">Writer</label>
    <input type="text" name="writer" value="{{ old('writer', $book->writer) }}">
    
    <label for="image">Image</label>
    <input type="file" name="image">
    
    <label for="type">Type</label>
    <select name="type">
        <option value="reservation" {{ $book->type == 'reservation' ? 'selected' : '' }}>Reservation</option>
        <option value="buy" {{ $book->type == 'buy' ? 'selected' : '' }}>Buy</option>
    </select>
    
    <label for="categorys_id">Category</label>
    <select name="categorys_id">
        @foreach ($categorys as $category)
            <option value="{{ $category->id }}" {{ $book->categorys_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    
    <button type="submit">Update</button>
</form>
