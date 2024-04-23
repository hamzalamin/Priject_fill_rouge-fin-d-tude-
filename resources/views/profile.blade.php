 @include('navbar')

 <div class="profile-card">
    @foreach ($user_info as $info)
    @if ($info->image_de_profile != null)
    <img src="{{ asset('storage/' . $info->image_de_profile) }}" alt="Profile Picture">
    @else
    <img src="{{ asset('img/ProfilImg.png') }}" alt="John Doe">
    @endif
    <div class="profile-info">
      <h2>{{ $info->name }}</h2>
      <p>Bio: <span style="font-style: italic;">empty</span></p>
      <p>Libe-Up User, YOUCODE, SIMPLON.co, UM6P, OCP</p>
      <div class="social-links">
        <a class="" href=""><img src="{{ asset('img/github.png') }}" alt=""></a>
        <a class="" href=""><img src="{{ asset('img/linkedin.png') }}" alt=""></a>
        <a class="" href=""><img src="{{ asset('img/instagram.png') }}" alt=""></a>
        <a class="" href=""><img src="{{ asset('img/FB.png') }}" alt=""></a>

      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
      <button class="follow-btn">Logout</button>
      </form>
      <button class="message-btn">Message</button>
    </div>
  </div>
  <div class="profile-details">
    <h2>Full Name :</h2>
    <p>{{ $info->name }}</p>
    <h2>Email :</h2>
    <p>{{ $info->email }}</p>
    <h2>Phone</h2>
    <p>(+212) 61439-6214</p>
    <h2>Mobile</h2>
    <p>(14) 9-621439</p>
    <h2>Address</h2>
    <p>AGADIR, TARRAST 'sidi-fdol' Rue:1025</p>
    <a href="{{ route('update_form_info', $info->id) }}"><button class="button-edit-profile">Edit Profile</button></a>
        {{-- <form action="{{ route('update_info', $info->id) }}" method="POST">
            @csrf
            <input name="name" value="{{ $info->name }}" type="hidden">
            <input name="email" value="{{ $info->email }}" type="hidden">
            <input name="password" value="{{ $info->password }}" type="hidden">
            <button type="submit" class="button-edit-profile">Edit</button>
        </form> --}}
    @endforeach
  </div>

