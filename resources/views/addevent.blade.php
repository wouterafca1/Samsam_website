@extends('layouts.app')

@section('content')
    @if(Auth::user()->functie == "Werkgever")
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group row">
                        <form method="post">
                            <table class="Inplannen">
                                <thead class="top-list">
                                <th>Wat?</th>
                                <th>Wie?</th>
                                <th>Start tijd</th>
                                <th>Eind tijd</th>
                                </thead>
                                <td class="list">
                                        <input type="radio" id="ingepland" value="ingepland" >
                                        <label for="Ingepland">Ingepland</label><br>
                                </td>

                                <td class="list">
                                    <input id="Naam" type="text" placeholder="Naam">
                                </td>

                                <td class="list">
                                    <input id="StartTime" type="datetime-local">
                                </td>

                                <td class="list">
                                    <input id="EndTime" type="datetime-local">
                                </td>
                            </table> <br>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Plan in!') }}
                            </button>

                        </form>
                    </div>
                    @else
                        {{ redirect(view('home')) }}
                    @endif
                </div>
            </div>
@endsection
