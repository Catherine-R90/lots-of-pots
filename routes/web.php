<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// GET
// USER VIEWS
// HOMEPAGE VIEW
Route::get('/', [App\Http\Controllers\PageController::Class, 'HomepageView']);

// FAQ VIEW
Route::get('/faqs', [App\Http\Controllers\PageController::Class, 'FaqView']);

// CONTACT VIEW
Route::get('/contact', [App\Http\Controllers\ContactController::Class, 'ContactView']);

// RETURNS AND REFUNDS VIEW
Route::get('/returns-and-refunds', [App\Http\Controllers\PageController::Class, 'ReturnsAndRefundsView']);

// PRIVACY POLICY VIEW
Route::get('/privacy-policy', [App\Http\Controllers\PageController::Class, 'PrivacyPolicyView']);

// TERMS AND CONDITIONS VIEW
Route::get('/terms-and-conditions', [App\Http\Controllers\PageController::Class, 'TermsAndConditionsView']);


// PRODUCTS
// PRODUCT CATEGORY VIEW
Route::get('/products/category/{id}', [App\Http\Controllers\ProductCategoryController::Class, 'ProductCategoryView']);

// PRODUCT VIEW
Route::get('/products/{id}', [App\Http\Controllers\ProductController::Class, 'ProductView']);


// RECIPES
// RECIPE VIEW
Route::get('/recipes/{id}/{portion?}', [App\Http\Controllers\RecipeController::Class, 'RecipeView']);

// RECIPE CATEGORY VIEW
Route::get('/recipe-category/{id}', [App\Http\Controllers\RecipeCategoryController::Class, 'RecipeCategoryView']);

// LOGIN VIEW
Route::get('/login', [App\Http\Controllers\UserController::Class, 'LoginView']);


// CUSTOMER ACCOUNT
// CUSTOMER ACCOUNT OVERVIEW VIEW
Route::get('/account/{id}', [App\Http\Controllers\UserController::Class, 'CustomerAccountOverviewView']);

// CUSTOMER ACCOUNT DETAILS VIEW
Route::get('/account/{id}/details', [App\Http\Controllers\UserController::Class, 'CustomerAccountDetailsView']);

// CUSTOMER ORDER VIEW
Route::get('/orders/{customer_id}/{order_id}', [App\Http\Controllers\OrderController::Class, 'CustomerOrderView']);


// CART VIEW
Route::get('/cart', [App\Http\Controllers\CartController::Class, 'CartView']);

// CHECKOUT VIEW
Route::get('/address/add', [App\Http\Controllers\CheckoutController::Class, 'AddAddressView']);

// PAYMENTS
Route::get('/handle-payment/{id}', [App\Http\Controllers\PayPalPaymentController::class, 'HandlePayment']);

Route::get('/cancel-payment', [App\Http\Controllers\PayPalPaymentController::class, 'CancelPaymentView']);

// CHECKOUT CONFIRMATION VIEW
Route::get('/checkout/confirmation/{id}', [App\Http\Controllers\CheckoutController::Class, 'CheckoutConfirmationView']);

// SEARCH RESULTS VIEW
Route::get('/search/{search}', [App\Http\Controllers\SearchController::Class, 'SearchResultView']);


// ADMIN VIEWS
// ADMIN ACCOUNT OVERVIEW VIEW
Route::get('/admin/overview', [App\Http\Controllers\UserController::Class, 'AdminAccountOverviewView']);

// ADMIN ACCOUNT DETAILS VIEW
Route::get('/account/admin/{id}/details', [App\Http\Controllers\UserController::Class, 'AdminAccountDetailsView']);

// PRODUCTS
// ADMIN ACCOUNT PRODUCTS OVERVIEW
Route::get('/admin/products/overview', [App\Http\Controllers\ProductController::Class, 'AdminProductsOverviewView']);

// ADMIN ADD PRODUCT VIEW
Route::get('/admin/products/add', [App\Http\Controllers\ProductController::Class, 'AdminAddProductView']);

// ADMIN EDIT PRODUCT OVERVIEW VIEW
Route::get('/admin/products/edit/overview', [App\Http\Controllers\ProductController::Class, 'AdminEditProductOverviewView']);

// ADMIN EDIT PRODUCT VIEW
Route::get('/admin/products/edit/{id}', [App\Http\Controllers\ProductController::Class, 'AdminEditProductView']);

// ADMIN DELETE PRODUCT
Route::get('/admin/products/delete', [App\Http\Controllers\ProductController::Class, 'AdminDeleteProductView']);

// PRODUCT CATEGORIES
// ADMIN EDIT PRODUCT CATEGORIES VIEW
Route::get('/admin/products/categories/edit', [App\Http\Controllers\ProductCategoryController::Class, 'AdminEditProductCategoriesView']);

// RECIPES
// ADMIN ACCOUNT RECIPES OVERVIEW
Route::get('/admin/recipes/overview', [App\Http\Controllers\RecipeController::Class, 'AdminRecipeOverviewView']);

// ADMIN ADD RECIPES VIEW
Route::get('/admin/recipes/add', [App\Http\Controllers\RecipeController::Class, 'AdminAddRecipeView']);

// ADMIN ADD RECIPE PRODUCTS VIEW
Route::get('/admin/recipes/product/add/{id}', [App\Http\Controllers\RecipeController::Class, 'AdminAddRecipeProductView']);

// ADMIN ADD RECIPE INGREDIENTS VIEW
Route::get('/admin/recipes/ingredients/add/{id}', [App\Http\Controllers\IngredientsController::Class, 'AdminAddIngredientsView']);

// ADMIN DELETE RECIPE VIEW
Route::get('/admin/recipes/delete', [App\Http\Controllers\RecipeController::Class, 'AdminDeleteRecipeView']);

// ADMIN SELECT RECIPE TO EDIT VIEW
Route::get('/admin/recipes/edit', [App\Http\Controllers\RecipeController::Class, 'AdminSelectRecipeEditView']);

// EDIT RECIPE VIEW
Route::get('/admin/recipes/edit/{id}', [App\Http\Controllers\RecipeController::Class, 'AdminEditRecipeView']);

// EDIT RECIPE PRODUCTS VIEW
Route::get('/admin/recipes/ingredients/edit/{id}', [App\Http\Controllers\IngredientsController::Class, 'AdminEditIngredientsView']);

// EDIT INGREDIENTS VIEW
Route::get('/admin/recipes/product/edit/{id}', [App\Http\Controllers\RecipeController::Class, 'AdminEditRecipeProductView']);

// RECIPE CATEGORIES
// ADMIN ACCOUNT PRODUCT CATEGORIES OVERVIEW
Route::get('/admin/recipes/categories/edit', [App\Http\Controllers\RecipeCategoryController::Class, 'AdminEditRecipeCategoryView']);

// ORDERS
// ORDERS OVERVIEW
Route::get('/admin/orders/overview', [App\Http\Controllers\OrderController::Class, 'AdminOrderOverviewView']);
<<<<<<< HEAD

// INCOMPLETE ORDERS VIEW
Route::get('/admin/orders/incomplete', [App\Http\Controllers\OrderController::Class, 'AdminIncompleteOrdersView']);

// ORDER BEING PICKED VIEW
Route::get('/admin/orders/picked', [App\Http\Controllers\OrderController::Class, 'AdminPickedOrdersView']);

// SENT ORDERS VIEW
Route::get('/admin/orders/sent', [App\Http\Controllers\OrderController::Class, 'AdminSentOrdersView']);

// COMPLETED ORDERS VIEW
Route::get('/admin/orders/complete', [App\Http\Controllers\OrderController::Class, 'AdminCompleteOrdersView']);
=======
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9

// ORDER VIEW
Route::get('/admin/orders/{id}', [App\Http\Controllers\OrderController::Class, 'AdminOrderView']);


// POST
// USERS
Route::post('/login/{id}', [App\Http\Controllers\UserController::Class, 'Login']);

Route::post('/logout/{id}', [App\Http\Controllers\UserController::Class, 'Logout']);

Route::post('/account/{id}/edit-details', [App\Http\Controllers\UserController::Class, 'EditPersonalDetails']);

Route::post('/account/{id}/edit-address', [App\Http\Controllers\UserController::Class, 'EditDeliveryAddress']);


// CUSTOMER
// CART
Route::post('/cart/product/add/{id}', [App\Http\Controllers\CartController::class, 'AddToCart']);

Route::post('/cart/product/adjust', [App\Http\Controllers\CartController::Class, 'AdjustCartQuantity']);

Route::post('/cart/product/remove', [App\Http\Controllers\CartController::class, 'RemoveItemCart']);

Route::post('/cart/clear', [App\Http\Controllers\CartController::Class, 'ClearCart']);

Route::post('/cart/delivery', [App\Http\Controllers\CartController::class, 'AddDelivery']);

// CHECKOUT
Route::post('/add-address', [App\Http\Controllers\CheckoutController::class, 'AddDeliveryAddress']);

// PORTION CALCULATOR FOR RECIPE
Route::post('/portion-calculator', [App\Http\Controllers\RecipeController::Class, 'PortionCalculator']);

// CONTACT
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'MailContactForm']);


// COMMENTS
// POST COMMENT
Route::post('/comment/add', [App\Http\Controllers\CommentsController::class, 'PostComment']);

// EDIT COMMENT
Route::post('/comment/edit/{id}', [App\Http\Controllers\CommentsController::class, 'EditComment']);

// DELETE COMMENT
Route::post('/comment/delete/{id}', [App\Http\Controllers\CommentsController::class, 'DeleteComment']);

// ADMIN
// PRODUCTS
// ADD PRODUCT
Route::post('/products/add', [App\Http\Controllers\ProductController::class, 'AdminAddProduct']);

// EDIT PRODUCT
Route::post('/products/edit', [App\Http\Controllers\ProductController::class, 'AdminEditProduct']);

// DELETE PROUCT
Route::post('/products/delete', [App\Http\Controllers\ProductController::class, 'AdminDeleteProduct']);

// DELETE PROUCT IMAGE
Route::post('/products/images/delete', [App\Http\Controllers\ProductController::class, 'AdminDeleteImage']);

// PRODUCT CATEGORIES
// ADD PRODUCT CATEGORY
Route::post('/products/category/add', [App\Http\Controllers\ProductCategoryController::Class, 'AdminAddProductCategory']);

// EDIT PRODUCT CATEGORY
Route::post('/products/category/edit', [App\Http\Controllers\ProductCategoryController::Class, 'AdminEditProductCategory']);

// DELETE PROUCT CATEGORY
Route::post('/products/category/delete', [App\Http\Controllers\ProductCategoryController::class, 'AdminDeleteProductCategory']);


// RECIPES
// ADD RECIPE
Route::post('/recipes/add', [App\Http\Controllers\RecipeController::Class, 'AdminAddRecipe']);

// ADD RECIPE PRODUCTS
Route::post('/recipes/products/add', [App\Http\Controllers\RecipeController::Class, 'AdminAddRecipeProduct']);

// ADD INGREDIENTS
Route::post('/recipes/ingredients/add', [App\Http\Controllers\IngredientsController::Class, 'AdminAddIngredients']);

// EDIT RECIPE
Route::post('/recipes/edit', [App\Http\Controllers\RecipeController::Class, 'AdminEditRecipe']);

// EDIT RECIPE PRODUCTS
Route::post('/recipes/products/edit', [App\Http\Controllers\RecipeController::Class, 'AdminEditRecipeProduct']);

// EDIT INGREDIENTS
Route::post('/recipes/ingredients/edit', [App\Http\Controllers\IngredientsController::Class, 'AdminEditIngredients']);

// DELETE RECIPE
Route::post('/recipes/delete', [App\Http\Controllers\RecipeController::Class, 'AdminDeleteRecipe']);


// RECIPE CATEGORIES
// ADD PRODUCT CATEGORY
Route::post('/recipe/category/add', [App\Http\Controllers\RecipeCategoryController::Class, 'AdminAddRecipeCategory']);

// EDIT RECIPE CATEGORY
Route::post('/recipes/category/edit', [App\Http\Controllers\RecipeCategoryController::Class, 'AdminEditRecipeCategory']);

// DELETE RECIPE CATEGORY
Route::post('/recipes/category/delete', [App\Http\Controllers\RecipeCategoryController::Class, 'AdminDeleteRecipeCategory']);


// ORDERS
// CHANGE ORDER STATUS
<<<<<<< HEAD
Route::post('/orders/flag/{id}', [App\Http\Controllers\OrderController::class, 'FlagOrderStatus']);

// DELETE ORDER
Route::post('/admin/delete-order/{id}', [App\Http\Controllers\OrderController::class, 'DeleteOrder']);
=======
Route::post('/orders/flag', [App\Http\Controllers\OrderController::class, 'FlagOrderStatus']);

// DELETE ORDER
Route::post('/admin/delete-order', [App\Http\Controllers\OrderController::class, 'DeleteOrder']);
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
