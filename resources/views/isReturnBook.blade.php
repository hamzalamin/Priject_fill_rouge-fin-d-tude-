@include('navbar')
<style>
.container_of_isreturn{
    margin-left: 279px;
  margin-top: 39px;
  border: #f7e352 solid 1px;
  padding: 14px;
  border-radius: 5px;
  width: 66%;
}
.side_bar.hidden {
    display: none;
}
</style>
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>

@if ($checkMail->isEmpty())
    <p  style="margin-left: 38%;
    margin-top: 37%;">You have no one to send email for hem.</p>
@else
    @foreach ($checkMail as $check)
    <div class="container_of_isreturn">
        <p>{{ $check->user->name }}</p>
        <p>{{ $check->book->name }}</p>
       
        @if ($check->isSend == 1)
        <p>You send to hem email at :{{ $check->updated_at }}</p>
        @else
            <p>You haven't sent an email to {{ $check->user->name }} yet.</p>
        @endif
        <form action="{{ route('isReturnUpdate', $check->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- <input type="hidden" name="isReturn" value="1"> --}}
            @if ($check->book->cart->isReturn == 1)
                <p>hes return the book</p>
            @else
            <button type="submit">Mark as Returned</button>
            @endif
        </form>
    </div>
       
    @endforeach
@endif

@include('sideBar')
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>