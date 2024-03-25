<form action="{{ route('Regester') }}" method="POST">
    @csrf
    <input name="name" type="text">
    <input name="email" type="text">
    <input name="password" type="password">
    <input name="roles" type="hidden" value="Client">


    <button type="submit">Submit</button>
</form>