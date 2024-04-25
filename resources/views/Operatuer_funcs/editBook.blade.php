
@include('navbar')
<style>
    .side_bar.hidden {
    display: none;
}
</style>
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>
{{-- <h1 style="display: flex; justify-content: center; margin-bottom: -100px; margin-top: 100px; color: brown; margin-left: 80px;">Update Book</h1> --}}
<section class="form_section">
    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <label for="">Book Title</label>
            <input type="text" name="name" value="{{ old('name', $book->name) }}" required>
            <label for="">Book description</label>
            <input type="text" name="description" value="{{ old('description', $book->description) }}" required>
            <label for="">Number Of Stock</label>
            <input type="number" name="number" value="{{ old('number', $book->number) }}" required>
            <label for="">Price</label>
            <input type="float" name="price" value="{{ old('price', $book->price) }}" required>
            <label for="">Book language</label>
            <input type="text" name="language" value="{{ old('language', $book->language) }}" required>
            <label for="">Book Writer</label>
            <input type="text" name="writer" value="{{ old('writer', $book->writer) }}" required>
            <label for="">Book Cover</label>
            <input type="file" name="image" required>
            <label for="">Book's Category</label>
            <select type="options" name="categorys_id">
                <option value="">select new category</option>
                @foreach ($categorys as $category)
                    <option value="{{ $category->id }}" {{ $book->categorys_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">Update</button>
        </form>
        
</section>
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>
@include('sideBar')