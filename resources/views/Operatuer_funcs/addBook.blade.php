<form action="{{ route('addBook') }}" method="POST" enctype="multipart/form-data">
@csrf
    <label for="name">name</label>
    <input type="text" name="name">
    <label for="description">description</label>
    <input type="text" name="description">
    <label for="number">number</label>
    <input type="number" name="number">
    <label for="price">price</label>
    <input type="float" name="price">
    <label for="language">language</label>
    <input type="text" name="language">
    <label for="writer">writer</label>
    <input type="text" name="writer">
    <label for="image">image</label>
    <input type="file" name="image">
    <select name="type" id="type">
        <option value="">chose</option>
        <option value="reservation">Reservation</option>
        <option value="buy">Buy</option>
    </select>
    <label for="date" id="date-label" style="display: none;">Dead Line</label>
    <input type="date" name="date" id="date-input" style="display: none;">
    <select name="categorys_id" id="">
        @foreach ($categorys as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">submit</button>
</form>
<br>
<hr>
<br>
@foreach ($books as $book)
{{ $book->name }}
{{ $book->description }}
{{ $book->number }}
{{ $book->price }}
{{ $book->language }}
{{ $book->writer }}
{{ $book->date }}

<img src="{{ asset('storage/' . $book->image) }}" alt="book Image">

{{ $book->type }}
Category: {{ $book->categorys->name }}
User: {{ $book->user->name }}
<form action="{{ route('books.destroy', $book) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
</form>
<a href="{{ route('books.edit', $book) }}">update</a>
@endforeach
<script>
    // Get references to the select and input elements
    var typeSelect = document.getElementById('type');
    var dateLabel = document.getElementById('date-label');
    var dateInput = document.getElementById('date-input');

    // Add event listener to the select element
    typeSelect.addEventListener('change', function() {
        // Check the selected value
        if (typeSelect.value === 'reservation') {
            // Show the label and input for reservation
            dateLabel.style.display = 'block';
            dateInput.style.display = 'block';
        } else {
            // Hide the label and input for buy
            dateLabel.style.display = 'none';
            dateInput.style.display = 'none';
        }
    });
</script>