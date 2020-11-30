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
Route::get('/recipes/{id}', [App\Http\Controllers\RecipeController::Class, 'RecipeView']);

// RECIPE CATEGORY VIEW
Route::get('/recipes/category/{id}', [App\Http\Controllers\RecipeCategoryController::Class, 'RecipeCategoryView']);

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
Route::get('/cart/{id}', [App\Http\Controllers\CartController::Class, 'CartView']);

// CHECKOUT VIEW
Route::get('/checkout/{id}', [App\Http\Controllers\CheckoutController::Class, 'CheckoutView']);

// CHECKOUT CONFIRMATION VIEW
Route::get('/checkout/{id}/confirmation', [App\Http\Controllers\CheckoutController::Class, 'CheckoutConfirmationView']);

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

// ADMIN EDIT PRODUCT VIEW
Route::get('/admin/products/edit', [App\Http\Controllers\ProductController::Class, 'AdminEditProductView']);

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

// ADMIN ADD RECIPE INGREDIENTS VIEW
Route::get('/admin/recipes/ingredients/add/$id', [App\Http\Controllers\RecipeController::Class, 'AdminAddIngredientsView'])->name('add-ingredients');

// ADMIN DELETE RECIPE VIEW
Route::get('/admin/recipes/delete', [App\Http\Controllers\RecipeController::Class, 'AdminDeleteRecipeView']);

// ADMIN EDIT RECIPES VIEW
Route::get('/admin/recipes/edit', [App\Http\Controllers\RecipeController::Class, 'AdminEditRecipeView']);


// RECIPE CATEGORIES
// ADMIN ACCOUNT PRODUCT CATEGORIES OVERVIEW
Route::get('/admin/recipes/categories/edit', [App\Http\Controllers\RecipeCategoryController::Class, 'AdminEditRecipeCategoryView']);

// ORDERS
// ORDERS OVERVIEW
Route::get('/account/admin/orders/overview', [App\Http\Controllers\OrderController::Class, 'AdminOrderOverviewView']);

// ORDER VIEW
Route::get('/account/admin/orders/{id}', [App\Http\Controllers\OrderController::Class, 'AdminOrderView']);




// POST
// USERS
Route::post('/login/{id}', [App\Http\Controllers\UserController::Class, 'Login']);

Route::post('/logout/{id}', [App\Http\Controllers\UserController::Class, 'Logout']);

Route::post('/account/{id}/edit-details', [App\Http\Controllers\UserController::Class, 'EditPersonalDetails']);

Route::post('/account/{id}/edit-address', [App\Http\Controllers\UserController::Class, 'EditDeliveryAddress']);


// CUSTOMER
// PRODUCTS
Route::post('/product/add/', [App\Http\Controllers\ProductController::class, 'addToCart']);

Route::post('/product/{id}/delete', [App\Http\Controllers\ProductController::class, 'CustomerDeleteProduct']);

// CONTACT
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'MailContactForm']);


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

// EDIT RECIPE
Route::post('/recipes/edit', [App\Http\Controllers\RecipeController::Class, 'AdminEditRecipe']);

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
Route::post('/orders/flag', [App\Http\Controllers\OrderController::class], 'FlagOrderStatus');