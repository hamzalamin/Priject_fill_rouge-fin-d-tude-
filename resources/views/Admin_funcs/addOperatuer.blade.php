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
<h1 class="EditCategoryTitle">Add Operatuer</h1>
<section class="form_section">
        <form action="{{ route('AddOperatuer') }}" method="POST">
            @csrf
            <label for="">User name</label>
            <input type="text" name="name">
            <label for="">User Email</label>
            <input type="email" name="email">
            <label for="">User password</label>
            <input type="password" name="password">
            <input name="roles" type="hidden" value="Operatuer">
            <button type="submit">ADD</button>
        </form>
        
</section>
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>
@include('sideBar')
