<form method="POST" action="{{ route('loginOfUser') }}">
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
</form>

{{-- @foreach ($allUsers as $user)
   name:{{ $user->name }}<br>
   roles{{ $user->roles }}<br> 
@endforeach --}}