@if ($checkMail->isEmpty())
    You haven't sent any email to your clients.
@else
    @foreach ($checkMail as $check)
        {{ $check->user->name }}
        <br>
        {{ $check->book->name }}
        <br>
        @if ($check->isSend == 1)
            You already sent an email to {{ $check->user->name }}.
        @else
            You haven't sent an email to {{ $check->user->name }} yet.
        @endif
        <br>
        <form action="{{ route('isReturnUpdate', $check->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- <input type="hidden" name="isReturn" value="1"> --}}
            @if ($check->isReturn == 1)
                hes return the book
            @else
            <button type="submit">Mark as Returned</button>
            @endif
        </form>
    @endforeach
@endif
