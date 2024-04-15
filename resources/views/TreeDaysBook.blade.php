{{-- @if ($threeDaysRecords->isEmpty())
    No records found.
@else
    @foreach ($threeDaysRecords as $ourclient)
        {{ $ourclient->user->name }}<br>
        {{ $ourclient->user->email }}<br>
        {{ $ourclient->copy->book->name }}<br>
        

            <form action="{{ route('sendMail') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $ourclient->user_id }}">
                <input type="hidden" name="book_name" value="{{ $ourclient->copy_id }}">
                <input type="hidden" name="sendingEmail" value="1">
                <input type="hidden" name="isreturn" value="0">
                <button type="submit">Send email</button>
            </form>
    @endforeach
   
@endif --}}
@if ($threeDaysRecords->isEmpty())
    No records found.
@else

    <form action="{{ route('sendMailToAll') }}" method="POST">
        @csrf
       
        @foreach ($threeDaysRecords as $ourclient)
            @if ($ourclient->user->mails == null)
                {{ $ourclient->user->name }}<br>
                {{ $ourclient->user->email }}<br>
                {{ $ourclient->copy->book->name }}<br>
                <input type="hidden" name="user_ids[]" value="{{ $ourclient->user_id }}">
                <input type="hidden" name="book_names[]" value="{{ $ourclient->copy_id }}">
            @endif

      
        @endforeach
            <input type="hidden" name="sendingEmail" value="1">
            <input type="hidden" name="isreturn" value="0">
            <button type="submit">Send email to all</button>            
    </form>
@endif
