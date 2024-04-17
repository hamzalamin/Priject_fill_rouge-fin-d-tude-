@include('navbar')

<h1 class="EditCategoryTitle">Add Operatuer</h1>
<section class="form_section">
        <form action="{{ route('AddOperatuer') }}" method="POST">
            @csrf
            <label for="">User name</label>
            <input type="text" name="name">
            <label for="">User Email</label>
            <input type="email" name="email">
            <label for="">User password</label>
            <input type="password" name="password">
            <input name="roles" type="hidden" value="Operatuer">
            <button type="submit">ADD</button>
        </form>
        
</section>
@include('sideBar')
