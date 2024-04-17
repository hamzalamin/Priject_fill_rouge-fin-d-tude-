@include('navbar')

    <div class="login-container">
        <h2>Login</h2>
        <form action="{{ route('loginOfUser') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Email:</label>
                <input  type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            @if(session('error'))
            <div class="alert alert-success" role="alert">
            {{ session('error') }}
             @endif
            <p style="color: #00796B">if you dont have an account <a href="{{ route('register') }}">Regester now</a></p>
        </form>
    </div>
    <script src="{{ asset('js/main1.js') }}"></script>


{{-- </section> --}}