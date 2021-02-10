<div class="ingredients">

    <div class="form">
        <form method="POST" action="/portion-calculator">
        @csrf
            <input type="hidden" value="{{ $id }}" name="id">

            <div class="form-label">
                <label>Number of portions </label>

                <select name="portion">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                </select>
            </div>

            <div class="grey-link">
                <input type="submit" value="Update Recipe">
            </div>
        </form>
    </div>

    @if($portion == 1)
    <p>Ingredients for <b>{{ $portion }}</b> portion:</p>
    @else
    <p>Ingredients for <b>{{ $portion }}</b> portions:</p>
    @endif
    <ul>
        <div class="ingredient-col">
            @foreach($ingredients as $ingredient)
                @if($ingredient != null && $ingredient != " " && $ingredient != "  " && $ingredient != " 0 ")
                    <li>{{ $ingredient }}</li>
                @endif
            @endforeach
        </div>
    </ul>

</div>