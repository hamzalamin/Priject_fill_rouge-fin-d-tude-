@include('navbar')
<h1 style="display: flex; justify-content: center; margin-bottom: -100px; margin-top: 100px; color: brown; margin-left: 80px;">Edit User</h1>
<section class="form_section">
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
            <label for="">User name</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
            <label for="">Category description</label>
            <input type="text" name="description" value="{{ $user->email }}" required>
            <button type="submit">EDIT</button>
        </form>
        
</section>
@include('sideBar')
