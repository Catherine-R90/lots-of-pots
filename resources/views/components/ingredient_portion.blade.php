<div class="ingredients">

    <select name="portion">
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
    </select>

    <ul>
        @foreach($ingredients as $ingredient)
            <li>{{ $ingredient->ingredient_quant_one }} {{ $ingredient->ingredient_one }}</li>
            <li>{{ $ingredient->ingredient_quant_two }} {{ $ingredient->ingredient_two }}</li>
            <li>{{ $ingredient->ingredient_quant_three }} {{ $ingredient->ingredient_three }}</li>
            <li>{{ $ingredient->ingredient_quant_four }} {{ $ingredient->ingredient_four }}</li>
            <li>{{ $ingredient->ingredient_quant_five }} {{ $ingredient->ingredient_five }}</li>
            <li>{{ $ingredient->ingredient_quant_six }} {{ $ingredient->ingredient_six }}</li>
            <li>{{ $ingredient->ingredient_quant_seven }} {{ $ingredient->ingredient_seven }}</li>
            <li>{{ $ingredient->ingredient_quant_eight }} {{ $ingredient->ingredient_eight }}</li>
            <li>{{ $ingredient->ingredient_quant_nine }} {{ $ingredient->ingredient_nine }}</li>
            <li>{{ $ingredient->ingredient_quant_ten }} {{ $ingredient->ingredient_ten }}</li>
        @endforeach
    </ul>

    
</div>