<?php
use App\Models\ProductCategory;
use App\Models\RecipeCategory;
?>

<hmtl>

<head>

    <title>Lots of Pots</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    
</head>

<body>

<nav>

    <div class="dropdown">

        <div class="drop-button">

            <button>Products</button>

        </div>

        <div class="dropdown-content">

            <?php $categories = ProductCategory::all();

            foreach($categories as $category) { ?>

            <div class="dropdown-link">
                <a href="/products/category/<?php echo $category->id; ?>">
                    <?php echo $category->category; ?>
                </a>
            </div>

            <?php } ?>

        </div>

    </div>

        <div class="dropdown">

            <div class="drop-button">

                <button>Recipes</button>

            </div>

            <div class="dropdown-content">

                <div class="dropdown-link">
                    <?php $recipeCategories = RecipeCategory::all();

                    foreach($recipeCategories as $recipeCategory) { ?>

                    <div class="dropdown-link">
                        <a href="/recipes/category/<?php echo $recipeCategory->id; ?>">
                            <?php echo $recipeCategory->category; ?>
                        </a>
                    </div>

                    <?php } ?>
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

        <a href="/cart/{id}">
            <div class="icon-text">
                <img class="icon" src="/images/icons/basket.png" alt="Cart">
                Cart
            </div>
        </a>

        <!-- SEARCH RECIPES -->

</nav>

    <hr>

@yield('page_type')

</body>

<!-- FOOTER -->
<footer>

    <hr>

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

</html>