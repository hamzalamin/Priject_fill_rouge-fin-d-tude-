{{-- <form action="{{ route('Regester') }}" method="POST">
    @csrf
    <input name="name" type="text">
    <input name="email" type="text">
    <input name="password" type="password">
    <input name="roles" type="hidden" value="Client">


    <button type="submit">Submit</button>
</form> --}}

@include('navbar')
{{-- <section class="login" style="display: flex;">
    <div>
    <img src="img/loginback1.jpg" alt="">
    </div>
    <form class="regester" action="{{ route('Regester') }}" method="POST">
        @csrf
        <label for="">Name</label>
        <input type="text" name="name">
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="password">Password</label>
        <input type="password" name="password">
        <input name="roles" type="hidden" value="Client">

        <button type="submit">sign in</button>
        <p>if you have already an account <a href="{{ route('login') }}">login now</a></p>
    </form>

</section> --}}


<div class="login-container">
    <h2>Sign in</h2>
    <form action="{{ route('Regester') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">User Name:</label>
            <input  type="text" name="name" required>
        </div>
        <div class="form-group">
            <label for="username">Email:</label>
            <input  type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input name="roles" type="hidden" value="Client">
        <div class="form-group">
            <button type="submit">sign in</button>
        </div>
        <p style="color: #00796B">if you have already an account <a href="{{ route('login') }}">login now</a></p>
    </form>
    <script src="{{ asset('jss/main1.js') }}"></script>