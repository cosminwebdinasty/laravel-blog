<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Models\User;
use App\Models\Post;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;

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

Route::get('/', function () {
    return view('welcome');
});




Route::get('test',[TestController::class,'create']);

Route::get('post/{id}/{name}/{pass}', [TestController::class,'show_post']);

Route::get('contact', [TestController::class,'contact']);




//Application Routes

use Illuminate\Support\Facades\DB;

Route::get('/insert', function(){
	
	DB::insert('insert into posts(title, content) value(?, ?)', ['PHP Stuff', 'Laravel Stuff Content']);
	
}); 


Route::get('/read', function(){
	
	$results = DB::select('select * from posts where id=?', [1]);
	
	  return  var_dump ($results);
	  
	foreach($results as $post){
	
		return $post->title;
	
	}
});


Route::get('/update', function(){
	
	$updated = DB::update('update posts set title = "Updated title" where id= ? ' ,[2]);
	
});




Route::get('/delete',function(){
	
	$deleted =DB::delete('delete from posts where id = ?' , [1]);
	return  $deleted;
});



Route::get('/', function () {
    return view('welcome');
}); 




Route::get('read',[TestController::class,'readm']);



Route::get('find',[TestController::class,'findm']);



Route::get('findmore',[TestController::class,'findd']);



Route::get('/basicinsert', [TestController::class, 'insertm']);



Route::get('/basic', [TestController::class, 'insertx']);



Route::get('/create', [TestController::class, 'create']);



Route::get('/update', [TestController::class, 'updatem']);



Route::get('/delete', [TestController::class, 'deletem']);



Route::get('/delete2', [TestController::class, 'delete2']);



Route::get('/softdelete', [TestController::class, 'softdel']);



Route::get('/readsoftdelete', [TestController::class, 'readsoft']);



Route::get('/restore', [TestController::class, 'restoration']);



Route::get('/forcedelete', [TestController::class, 'forcedel']);





//Relationships

//One to one relationship

Route::get('/user/{id}/post', function($id){
	
	return User::find($id)->post;

});



Route::get('post/{id}/user', function($id){
	
	return Post::find($id)->user->name;
	
});


//One to many relationship

Route::get('/posts', function(){
	
	$user = User::find(1);
	
		foreach($user->posts as $post){
			
			echo $post->title . "<br>";
		}
	
});


//Many to many relationship

Route::get('/user/{id}/role', function($id){
	
	$user = User::find($id)->roles()->orderBy('id', 'desc')->get();
	return $user;
	
	// $user = User::find($id);
	
	// foreach($user->roles as $role){
		
		// return $role->name;
		
	});

//Accessing the intermediate table / pivot

Route::get('user/pivot', function(){
	
	$user = User::find(1);
	
	foreach($user->roles as $role){
		
		return $role->pivot->created_at;
		
	}
	
});



Route::get('/user/country', function(){
	
	$country = Country::find(4);
	
	foreach($country->posts as $post){
		
		return $post->title;
		
	}
	
});


// Polymorphic Relations


Route::get('user/photos' , function(){
	
	$user = User::find(1);
	
	foreach($user->photos as $photo){
		
		return $photo->path;
	}
	
});
	


Route::get('post/{id}/photos' , function($id){
	
	$post = Post::find($id);
	
	foreach($post->photos as $photo){
		
		echo $photo->path . "<br>";
	}
	
});


Route::get('photo/{id}/post', function($id){
	
	$photo = Photo::findOrFail($id);
	
	return $photo->imageable;
	
	
});



Route::get('/post/tag', function(){
	
	
		$post = Post::find(1);
		
		foreach($post->tags as $tag){
			
			echo $tag->name;
		}
	
});



Route::get('/tag/post', function(){
	
	$tag = Tag::find(2);
	
	
	foreach($tag->posts as $post){
		
		return $post->title;
		
	}
	
});














