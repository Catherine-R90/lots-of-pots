
<div id="product-carousel" class="carousel" data-ride="carousel">

    <!-- INDICATORS -->
    <ol class="carousel-indicators">
        <li data-target="#product-carousel" data-slide-to="0" class="active"></li>

        <li data-target="#product-carousel" data-slide-to="1"></li>

        @if($imageThree != null)
        <li data-target="#product-carousel" data-slide-to="2"></li>
        @endif

        @if($imageFour != null)
        <li data-target="#product-carousel" data-slide-to="3"></li>
        @endif
    </ol>

    <!-- WRAPPER FOR SLIDES -->
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('storage/app/'.$imageOne) }}" alt="{{ $imageOne }}">
        </div>

        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('storage/app/'.$imageTwo) }}" alt="{{ $imageTwo }}">
        </div>

        @if($imageThree != null)
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('storage/app/'.$imageThree) }}" alt="{{ $imageThree }}">
        </div>
        @endif

        @if($imageFour != null)
        <div class="carousel-item">
            <img class="d-block w-100"   src="{{ asset('storage/app/'.$imageFour) }}" alt="{{ $imageFour }}">
        </div>
        @endif

    </div>

    <!-- SLIDER CONTROLS -->
    <a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    
    <a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>
