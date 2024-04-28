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
<h1 class="EditCategoryTitle">Edit User</h1>
<section class="form_section">
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
            <label for="">User name</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
            <label for="">User email</label>
            <input type="text" name="email" value="{{ $user->email }}" required>
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
