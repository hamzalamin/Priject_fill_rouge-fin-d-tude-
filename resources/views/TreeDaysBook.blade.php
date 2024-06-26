@include('navbar')

<style>
    .side_bar.hidden {
    display: none;
}
</style>
<div class="burger-menu-icon" onclick="toggleSidebar()">
    <span class="bara">Dashboard</span>
</div>
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
@if ($threeDaysRecords->isEmpty())
    <p class="no-records">No records found.</p>
@else
    <div class="records-container">
        <form action="{{ route('sendMailToAll') }}" method="POST">
            @csrf
            @foreach ($threeDaysRecords as $ourclient)
            @if ($ourclient->isReturn == 0) {{-- Check if isReturn is equal to 0 --}}
                <div class="record">
                    <div class="record-details">
                        {{ $ourclient->user->name }}<br>
                        {{ $ourclient->user->email }}<br>
                        {{ $ourclient->copy->book->name }}<br>
                    </div>
                    <input type="hidden" name="user_ids[]" value="{{ $ourclient->user_id }}">
                    <input type="hidden" name="book_names[]" value="{{ $ourclient->copy_id }}">
                </div>
            @endif
        @endforeach
        

            <div class="button-container">
                <input type="hidden" name="sendingEmail" value="1">
                <input type="hidden" name="isreturn" value="0">
                <button type="submit">Send email to all</button>            
            </div>
        </form>
    </div>
@endif
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class
    }
</script>

@include('sideBar')
