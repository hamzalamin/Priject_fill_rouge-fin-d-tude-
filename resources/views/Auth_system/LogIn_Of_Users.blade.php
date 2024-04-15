{{-- <form method="POST" action="{{ route('loginOfUser') }}">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </div>
        @if(session('error'))
        <div class="alert alert-success" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <button type="submit">login</button>
</form> --}}

@include('navbar')
<section class="login" style="display: flex;">
    <div>
    <img src="../img/loginback1.jpg" alt="">
    </div>
    <form method="POST" action="{{ route('loginOfUser') }}">
        @csrf
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="password">Password</label>
        <input type="password" name="password">
        @if(session('error'))
        <div class="alert alert-success" role="alert">
        {{ session('error') }}
         @endif
        <button type="submit" name="button">Log in</button>
        <p>if you dont have an account <a href="{{ route('register') }}">Regester now</a></p>
    </form>
</section>