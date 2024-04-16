@include('navbar')
<h1 class="EditCategoryTitle">Edit User</h1>
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
