
@include('navbar')

<section class="statistique">
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