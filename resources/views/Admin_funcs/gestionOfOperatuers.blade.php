@include('navbar')
<div  class="add">
    <a href="{{ route('OperatuerForm') }}"><img src="../../img/AddC.png" alt=""></a>
    </div>
    <section class="statistique">
        <div class="card-container_category">
            @foreach ($users as $user)

            <div class="card_category">
                <h4>{{ $user->name }}</h4>
                <p>{{ $user->email }} .</p>
                <p>ROLE : {{ $user->roles }}</p>
                <div class="buttons">
                <button hidden>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="../../img/deleteC.png" alt=""></button>
                    </form>
                </button>
                <button>
                    <a href="{{ route('users.edit', $user) }}"><img src="../../img/editC.png" alt=""></a>
                </button>
                </div>
            </div>
            @endforeach

    </section>
@include('sideBar')