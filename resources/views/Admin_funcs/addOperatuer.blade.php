<form action="{{ route('AddOperatuer') }}" method="POST">
    @csrf
    <input name="name" type="text">
    <input name="email" type="email">
    <input name="password" type="password">
    <input name="roles" type="hidden" value="Operatuer">


    <button type="submit">Submit</button>
</form>