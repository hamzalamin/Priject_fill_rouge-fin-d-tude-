@include('navbar')
<style>
    .side_bar.hidden {
    display: none;
}
</style>
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>
<h1 class="EditCategoryTitle">Edit Category</h1>
<section class="form_section">
    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <label for="">Category name</label>
            <input type="text" name="name" value="{{ $category->name }}">
            <label for="">Category description</label>
            <input type="text" name="description" value="{{ $category->description }}">
            <label for="">Category image</label>
            <input type="file" name="image" value="{{ $category->image }}">
            <button type="submit">EDIT</button>
        </form>
        
</section>
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>
@include('sideBar')
