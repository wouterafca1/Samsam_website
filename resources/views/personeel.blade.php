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
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Voeg medewerker toe!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
