


<section class="side_bar" id="sidebar">
    <div class="sidebar-content">
        <h3 style="color: white">Dashboard</h3>
        <div class="gestion">
            @if (auth()->check() && auth()->user()->hasRole('Admin'))
                <a href="{{ route('gestionofcategories') }}">Gestion of categories</a>
                <a href="{{ route('gestionofOperatuers') }}">Gestion of users</a>

            @endif
        </div>
        <div class="gestion">           
            @if (auth()->check() && auth()->user()->hasRole('Operatuer'))
                <a href="{{ route('gestion_of_books') }}">Gestion of books</a>
                <a href="{{ route('gettreedays') }}">Send Mails</a>
                <a href="{{ route('getisReturn') }}">They have Return Books</a>
                <a href="{{ route('getStockFinish') }}">Stock</a>
            @endif
        </div>
    </div>
</section>

<script src="{{ asset('jss/main1.js') }}"></script>
