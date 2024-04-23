
@include('navbar')
<style>
    .side_bar.hidden {
    display: none;
}
</style>
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>
<section class="statistiques-cont">
    <div class="statistic-item">
        <h3>Total of all Books</h3>
        <p>{{ $books }}</p>
    </div>
    <div class="statistic-item">
        <h3>Total of Books you creat</h3>
        <p>{{ $yourBooks }}</p>
    </div>
    <div class="statistic-item">
        <h3>Total Categories</h3>
        <p>{{ $categorys }}</p>
    </div>
</section>
@include('sideBar')
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>