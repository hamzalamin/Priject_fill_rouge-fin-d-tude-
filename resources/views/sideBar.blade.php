<section class="side_bar">
    <div class="sidebar-content">
        <h3 style="color: white">Dashboard</h3>
        <div class="gestion">
        @if (auth()->check() && auth()->user()->hasRole('Admin'))
            <a href="{{ route('gestionofcategories') }}">Gestion of categories</a>
        </div>
        <div class="gestion">           
            <a href="{{ route('gestionofOperatuers') }}">Gestion of users</a>
            @endif
        </div>
        <div class="gestion">
            @if (auth()->check() && auth()->user()->hasRole('Operatuer'))
            <a href="{{ route('gestion_of_books') }}">Gestion of books</a>
            @endif
        
        </div>
    </div>
</section>