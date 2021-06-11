@if($agent->isDesktop())
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
                    <option value=5>5</option>
                    <option value=6>6</option>
                </select>
            </div>

            <div class="grey-link">
                <input type="submit" value="Update Recipe">
            </div>
        </form>
    </div>

    <div class="ingredient-col">
        @if($portion == 1)
        <p>Ingredients for <b>{{ $portion }}</b> portion:</p>
        @else
        <p>Ingredients for <b>{{ $portion }}</b> portions:</p>
        @endif
        <ul>
            @foreach($ingredients as $ingredient)
                @if($ingredient->ingredient_quant == 0)
                    <li>{{ $ingredient->ingredient_name }}, {{$ingredient->ingredient_quant_type }}</li>
                @else
                    <li>{{ $ingredient->ingredient_name }}, {{ $ingredient->ingredient_quant * $portion }} {{$ingredient->ingredient_quant_type }}</li>
                @endif
            @endforeach
        </ul>
    </div>

</div>
@endif

@if($agent->isMobile())
<div class="mobile-ingredients">

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
                    <option value=5>5</option>
                    <option value=6>6</option>
                </select>
            </div>

            <input type="submit" value="Update Recipe">
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
                @if($ingredient->ingredient_quant == 0)
                    <li>{{ $ingredient->ingredient_name }}, <b>{{$ingredient->ingredient_quant_type }}</b></li>
                @else
                    <li>{{ $ingredient->ingredient_name }}, <b>{{ $ingredient->ingredient_quant * $portion }} {{$ingredient->ingredient_quant_type }}</b></li>
                @endif
            @endforeach
        </div>
    </ul>

</div>
@endif