@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="Users">
                    <tbody>
                    <thead class="top-list">
                    <th>Naam</th>
                    <th>Functie</th>
                    <th>E-mailadres</th>
                    </thead>
                    @foreach($users as $user)
                        <tr class="list">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->functie }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
