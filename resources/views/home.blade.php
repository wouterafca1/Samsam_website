@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="welkom">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('U bent ingelogd!') }}
                </div>
            </div>
        </div>

        <div class="timetable">

        <script>
            var timetable = new Timetable();
            timetable.setScope(10, 22);

            timetable.addLocations(['Bilal', 'Dilek', 'Wouter', 'Bram']);
            timetable.addEvent('Ingepland', 'Wouter', new Date(2021,4,20,17), new Date(2021,4,20,21));


            var renderer = new Timetable.Renderer(timetable);
            renderer.draw('.timetable');
        </script>
        </div>
        @if(Auth::user()->functie == "Werkgever")
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <a href="{{ route('addevent') }}" class="ml-4 text-sm text-gray-700 underline">Rooster werknemer in</a>
            </div>
        @else

        @endif
    </div>
</div>
@endsection
