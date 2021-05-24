
<div id="ingredient" >
    <div class="form-label">
        <label>Ingredient Name</label>
        <input type="text" name="ingredient_name{{$i}}">
    </div>

    <div class="form-label">
        <label>Quantity FOR ONE PORTION</label>
        <input type="number" name="ingredient_quant{{$i}}" step=0.25>
    </div>

    <div class="form-label">
        <label>Quantity type, e.g. tablespoon, gram, jar, or preparation type, e.g. minced, chopped</label>

        <input type="string" name="ingredient_quant_type{{$i}}">
    </div>
</div>

</div>