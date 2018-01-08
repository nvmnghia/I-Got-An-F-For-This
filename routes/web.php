
<?php

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
Route::get('/', 'PagesController@test');

Route::get('/json/tickets.php', 'PagesController@json_tickets');
// Get list ticket

Route::get('/json/comments-{ticket_id}.php', 'PagesController@json_comments');
// Get list comment

Route::get('/json/user-{user_id}.php', 'PagesController@json_user');