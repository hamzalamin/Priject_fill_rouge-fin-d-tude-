
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
{{-- <h1 style="display: flex; justify-content: center; margin-bottom: -100px; margin-top: 100px; color: brown; margin-left: 80px;">Update Book</h1> --}}
<section class="form_section">
    <form action="{{ route('copys.update', $copy) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <label for="">Number Of Stock</label>
            <input type="number" name="number" value="{{ old('number', $copy->number) }}" required>
            <label for="">Price</label>
            <input type="float" name="price_of_reserv" value="{{ old('price', $copy->price_of_reserv) }}" required>
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