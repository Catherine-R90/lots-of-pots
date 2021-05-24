<?php
use App\Models\ProductCategory;
use App\Models\RecipeCategory;
use App\Models\Cart;
use Jenssegers\Agent\Agent;
$agent = new Agent();
?>

<html>

<head>

    <title>Lots of Pots</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/b6954c4ea5.js" crossorigin="anonymous"></script>
    
</head>

<body>

<?php $cartItems = Cart::where('session_id', session()->getId())->get(); ?>
<?php $categories = ProductCategory::all(); ?>
<?php $recipeCategories = RecipeCategory::all(); ?>

@if($agent->isDesktop() == true)

<nav>

    <div class="dropdown">

        <div class="drop-button">

            <button>Products</button>

        </div>

        <div class="dropdown-content">

            <?php $categories = ProductCategory::all(); ?>

            @foreach($categories as $category)

            <div class="dropdown-link">
                <a href="/products/category/{{ $category->id }}">
                    {{ $category->category }}
                </a>
            </div>

            @endforeach

        </div>

    </div>

        <div class="dropdown">

            <div class="drop-button">

                <button>Recipes</button>

            </div>

            <div class="dropdown-content">

                <div class="dropdown-link">
                    <?php $recipeCategories = RecipeCategory::all(); ?>

                    @foreach($recipeCategories as $recipeCategory)

                    <div class="dropdown-link">
                        <a href="/recipe-category/{{ $recipeCategory->id }}">
                            {{ $recipeCategory->category }}
                        </a>
                    </div>

                    @endforeach
                </div>

            </div>

        </div>

        <a href="/">
            <img id="logo" src="/images/lots_of_pots_master.png" alt="Home">
        </a>

        <a href="/faqs">
            <div class="icon-text">
                <img class="icon" src="/images/icons/question.png" alt="FAQs">
                    FAQs
            </div>
        </a>

        <a href="/contact">
            <div class="icon-text">
                <img class="icon" src="/images/icons/phone.png" alt="Contact">
                    Contact
            </div>
        </a>

        <?php $cartItems = Cart::where('session_id', session()->getId())->get(); ?>
        @if(count($cartItems) != 0)
        <a href="/cart">
            <div class="icon-text">
                <img class="icon" src="/images/icons/basket.png" alt="Cart">
                Cart:
                {{count($cartItems)}}
            </div>
        </a>
        @else
        <a href="/cart">
            <div class="icon-text">
                <img class="icon" src="/images/icons/basket.png" alt="Cart">
                Cart
            </div>
        </a>
        @endif
</nav>

    <hr>

@else

<x-mobile_nav :cartItems="$cartItems" :categories="$categories" :recipeCategories="$recipeCategories"/>

@endif
    
@yield('page_type')

<script src="{{ asset('js/app.js') }}"></script>


</body>

<hr>

<!-- FOOTER -->
@if($agent->isDesktop())
<footer>

    

    <!-- SOCIAL MEDIA LINKS -->
    <div class="footer-icon-group">

        <a href="/https://www.facebook.com/">
            <img class="footer-icon" src="/images/icons/facebook-black.png">
        </a>

        <a href="twitter.com">
            <img class="footer-icon" src="/images/icons/twitter-black.png">
        </a>

    </div>

    <!-- FOOTER LINKS -->
    <div class="footer-links">

        <a href="/contact">Contact Us</a>

        <a href="/faqs">FAQs</a>

        <a href="/privacy-policy">Privacy Policy</a>

        <a href="/returns-and-refunds">Returns and Refunds Policy</a>

        <a href="/terms-and-conditions">Terms and Conditions</a>        

    </div>

    <div class="address">
        <p>Lots of Pots, Your Address, Leeds, L01 123</p>
    </div>

</footer>
@elseif($agent->isMobile())

<x-mobile_footer />

@endif

</html>