@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Общий список</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $user)
                        <tr>
                        <td>{{ $user->name }}</td>

                            @if($user->iFriend->isNotEmpty())

                                @foreach($user->iFriend as $friend)

                                        @if(\Illuminate\Support\Facades\Auth::id() == $friend->user_id )
                                            <td>В избранном</td>
                                            @php continue 2; @endphp
                                        @endif

                                @endforeach

                            @endif

                            <td>
                                <form method="POST" action="{{ url('add/'.$user->id) }}">
                                    @csrf
                                    <button type="submit">Добавить</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Избранное</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($friends as $friend)
                        <tr>
                            <td>{{ $friend->myFriends->name }}</td>
                            <td>
                                <form method="POST" action="{{ url('delete/'.$friend->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Убрать</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
