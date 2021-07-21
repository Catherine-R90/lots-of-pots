<?php
use Cartalyst\Sentinel\Native\Facades\Sentinel;
?>

<div>
    <nav>

        <div class="mob_nav">
            @if(count($cartItems) != 0)
                <a href="/cart">
                    <div id="mobile_cart" class="mobile_icon-text">
                        <img class="mobile_icon" src="/images/icons/basket.png" alt="Cart">
                        Cart:
                        {{count($cartItems)}}
                    </div>
                </a>
            @else
                <a href="/cart">
                    <div id="mobile_cart" class="mobile-icon-text">
                        <img src="/images/icons/basket.png" alt="Cart">
                        Cart
                    </div>
                </a>            
            @endif

            <div id="mobile_logo">
                <a href="/">
                    <img  src="/images/lots_of_pots_master.png" alt="Home">
                </a>
            </div>
        
            <div>
                <ul class="mobile_menu">

                    @if($user = Sentinel::check())
                        <li class="mobile_item mobile_has-submenu">

                            <a tabindex="0"> Hello {{ $user->first_name }}</a>

                            <ul class="mobile_submenu">

                                <li class="mobile_subitem">
                                    <a href="/users/details/{{ $user->id }}">Account Details</a>
                                </li>

                                <li class="mobile_subitem">
                                    <form method="POST" class="mobile-form" action="/logout">
                                        @csrf
                                            <input type="submit" value="Logout">
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
            
                    <li class="mobile_item mobile_has-submenu">
                        <a tabindex="0">Products</a>
                            <ul class="mobile_submenu">
                                @foreach($categories as $category)
                                    <li class="mobile_subitem">
                                        <a href="/products/category/{{ $category->id }}">
                                        {{ $category->category }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                    </li>
            
                    <li class="mobile_item mobile_has-submenu">
                        <a tabindex="0">Recipes</a>
                            <ul class="mobile_submenu">
                                @foreach($recipeCategories as $recipeCategory)
                                    <li class="mobile_subitem">
                                        <a href="/recipe-category/{{ $recipeCategory->id }}">
                                            {{ $recipeCategory->category }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                    </li>
            
                    <li class="mobile_item">
                        <a href="/faqs">
                            FAQs
                        </a>
                    </li>
            
                    <li class="mobile_item">
                        <a href="/contact">
                            Contact
                        </a>
                    </li>
            
                    <li class="mobile_toggle">
                        <a href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>