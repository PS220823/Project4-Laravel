@extends('layouts.default')
@section('content')
    <a id="backtop" href="#top" onclick="hide()">^</a>

    <header id="top" class="header1">
    <div class="header__bg1"></div>
    <h1 class="header__title1" onclick="location.reload()" onmouseover="this.style.cursor='pointer'">Pizza samenstellen</h1>
    </header>

    @if(Session::has('info'))
    <p id="redtext">{{ Session::get('info') }}</p>
    @endif

    <p style="text-align: center; margin-top: 3vw;">U bewerkt momenteel: <strong>Pizza {{ $pizza->name}}</strong></p>
    <div class="fb3">
        <div style="border-top: none;"><p><strong>Ingredientenlijst</strong></p></div>

    @foreach ($pizza->ingredients as $ingredient)
    
        <div class="fb4">
            <div style="width: 700px;"><p>{{ $ingredient->name }}</p></div>
            <div><p>€ {{ number_format($ingredient->price, 2, ",", ".")}}</p></div>
            <div>
            @if ($ingredient->name != "Bodemdeeg")
                <form action="{{ route('pizzaingredient.destroy', [$pizza->id, $ingredient->id])}}" method="POST" style="height: 100%">
                    @csrf
                    @method('DELETE')
                    <button id="btn5" type="submit">Verwijder</button>
                </form>
                @else 
                <div id="widthdiv"></div>
                @endif
            </div>
        </div>
    @endforeach
        <div class="fb4">
            <div style="width: 700px;"><p>Totaalprijs</p></div>
            <div style="width: 500px;"><p>€ {{number_format($pizza->price(), 2, ",", ".")}}</p></div>
            <div style="width: 200px"></div>
        </div>
        <div class="fb4">
            <div style="width: 700px;"><p>Ingrediënt toevoegen</p></div>
            <form action="{{ route('pizzaingredient.store', $pizza->id) }}" method="POST">
                @csrf
                <select name="ingredientID" style="text-align: center;">
                    @foreach ($ingredienten as $ingredient)
                        <option value="{{$ingredient->id}}">{{ $ingredient->name }}</option>
                    @endforeach
                </select>
                <div><button type="submit" id="btn6">Voeg toe</button></div>
                @error('ingredientID')
                <div class="error">{{ $message }}</div>
                @enderror
            </form>
            <div style="width: 200px"></div>
        </div>
    </div>
@endsection

