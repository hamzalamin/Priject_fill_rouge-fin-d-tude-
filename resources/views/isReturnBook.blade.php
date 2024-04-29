@include('navbar')
@if (session('success'))
    <div class="success">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session('error'))
    <div class="error">
        <p>{{ session('error') }}</p>
    </div>
@endif
<style>
/* .container_of_isreturn{
    margin-left: 279px;
  margin-top: 39px;
  border: #f7e352 solid 1px;
  padding: 14px;
  border-radius: 5px;
  width: 66%;
} */
.side_bar.hidden {
    display: none;
}
</style>
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>
{{-- {{ dd($checkMail) }} --}}
@if ($checkMail->isEmpty())
    <p  style="margin-left: 38%;
    margin-top: 37%;">You have no one to send email for hem.</p>
@else
    <div class="container_of_isreturn">
        Historique
<hr>
@foreach ($checkMail as $check)
    <p>User: {{ $check->user->name }}</p>
    <p>Book: {{ $check->copy->book->name }}</p>
    {{-- <p>isReturn: {{ $check->copy->cart->isReturn }}</p>  --}}

@if ($check->isReturn == 1)
    <p style="color: red;">{{ $check->user->name }} returned the book at: {{ $check->copy->cart->updated_at }}</p>
@else
    <form action="{{ route('isReturnUpdate', $check->copy->id) }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $check->user_id }}">
        <button type="submit">Mark as Returned</button>
    </form>
@endif
<hr>
@endforeach

    </div>
    {{-- @endforeach --}}
       
   
@endif

@include('sideBar')
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>