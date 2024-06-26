@include('navbar')
<style>
    .side_bar.hidden {
    display: none;
}
</style>
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
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>
{{-- <h1 style="display: flex; justify-content: center; margin-bottom: -100px; margin-top: 100px; color: brown; margin-left: 80px;">Add Book</h1> --}}
<section class="form_section_">
    <form action="{{ route('addBook') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="">Book Title</label>
            <input type="text" name="name">
            <label for="">Book description</label>
            <input type="text" name="description">
            <label for="">Number Of Stock</label>
            <input type="number" name="number">
            <label for="">Price</label>
            <input type="float" name="price">
            <label for="">Book language</label>
            <input type="text" name="language">
            <label for="">Book Writer</label>
            <input type="text" name="writer">
            <label for="">Book Cover</label>
            <input type="file" name="image">
            <label for="image">Book's Category</label>
            <select name="categorys_id" type="options" id="">
                <option value="">Get category for your book</option>
                @foreach ($categorys as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">submit</button>
        </form>
        
</section>
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>
@include('sideBar')
