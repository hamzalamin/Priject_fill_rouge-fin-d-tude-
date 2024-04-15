@include('navbar')
<h1 style="display: flex; justify-content: center; margin-bottom: -100px; margin-top: 100px; color: brown; margin-left: 80px;">Add Category</h1>
<section class="form_section">
    <form action="{{ route('AddCategory') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="">Category name</label>
            <input type="text" name="name">
            <label for="">Category description</label>
            <input type="text" name="description">
            <label for="">Category image</label>
            <input type="file" name="image">
            <button type="submit">ADD</button>
        </form>
        
</section>
@include('sideBar')