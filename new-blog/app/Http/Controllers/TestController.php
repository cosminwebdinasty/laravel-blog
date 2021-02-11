<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\User;



class TestController extends Controller
{
    //
	  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
		Post::create(['user_id' => '1235', 'title'=>'Post 1', 'content'=>'Description']);
		
	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
		
		return "show method ";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function show_post($id, $name, $pass){
		
		//return view('post')->with('id',$id);
		
		return view('post', compact('id','name','pass'));
		
	}
	
	public function contact_view(){
		
		return view('contact');
	}
	
	
	public function contact(){
		
		$people =['Name1', 'Name2', 'Name3' ,'Name4', 'Name5'];
		return view('contact', compact('people'));
		
	}
	
	public function readm(){
		
		$posts = Post::all();
		
		foreach($posts as $post){
			
			return $post->title;
		}
		
	}
	
	
		public function findm(){
		
		$post = Post::find(4);
	
			return $post->title;
		}
		
		
		public function findwhere(){
			
			$post = Post::where('id',4)->orderBy('id','desc')->take(1)->get();
			
			return $post;
			
		}
		
		
		public function findd(){
			
			$posts = Post::findOrFail(4);
			return $posts;
		}
	
	
		public function finddd(){
			
			$posts = Post::where('users_count', '<', 50)->firstOrFail();
			
		}
	
	
	
		public function insertm(){
	
		$post = new Post;
		
		$post->user_id= '1234';
		$post->title = 'New Title insert';
		$post->content= 'ASGDSADGSADGsdag agag sgaasdg sdgdsag sdg';
		
		$post->save();
		
		}
	
		
		public function insertx(){
	
		$post = Post::find(2);
		
		$post->title = 'Modified Title ';
		$post->content= '435235325 ASGDSAD';
		
		$post->save();
		
		}
	
	
		public function updatem(){
		
		Post::where('id',4)->where('is_admin',0)->update(['is_admin'=>'1', 'content'=>'newewer php wertwert']);
	
		}
	
	
		public function deletem(){
			
			$post = Post::find(3);
			
			$post->delete();
		}
	
		
		public function delete2(){
			
			Post::destroy([7,8]);
			
		}
		
		
		public function softdel(){
			
			Post::find(4)->delete();
		
		}
		
		public function readsoft(){
			
			//$post = Post::find(18);
		//	return $post;
		
		$post=Post::onlyTrashed()->where('is_admin',0)->get();
		return $post;
			
		}
		
		
		public function restoration(){
			
			Post::withTrashed()->where('is_admin',0)->restore();
			
		}
		
		public function forcedel(){
		
		Post::onlyTrashed()->where('is_admin',0)->forceDelete();
	
		}
protected $fillable = [
	
	'title',
	'content'
	
	];
	
		
	
}
