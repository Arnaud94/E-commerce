@extends("layout-test")
@section("content")

    {{ dump($bladeTeam) }}

    @foreach ($bladeTeam as $team)
        <ul>
            <li>firstname : {{ $team['firstname'] }}</li>
            <li>lastname : {{ $team['lastname'] }}</li>
            <li>chef : {{ $team['chef'] }}</li>
            <li>description :  {{ $team['description'] }}</li>
            <li>statut :  {{ $team['statut'] }}</li>
        </ul>

        @if($team['chef'] == true)

            <p>{{ $team['firstname'] ." ". $team['lastname'] }} est le chef</p>

        @endif

    @endforeach

    le nombre de personne est : {{ count($bladeTeam)  }}



@endsection
