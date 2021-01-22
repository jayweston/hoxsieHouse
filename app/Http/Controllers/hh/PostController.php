<?php

namespace App\Http\Controllers\hh;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\hh\Post;
use App\Models\hh\User;
use App\Models\hh\Tag;
use App\Models\hh\PostTag;
use App\Models\hh\PostImage;
use App\Models\hh\UserPost;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
	/*
	 * Send a paginated array of given posts.
	*/
	public function index()
	{
/*		//URL param of wanted post type.
		$type = strtolower( \Request::input('type') );
		// Non logged in users and viewers do not see deaft and unpublished posts
		if (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER)
			// If the URL param is a valid post type (foodie, review, travel...) add it to sql query.
			if (Post::isValidPostType($type)){
				$posts = Post::where('type', $type)->where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->paginate(12);
			}
			// if not valif post type then send all posts.
			else{
				$type="all";
				$posts = Post::where('avialable_at','<' ,\Carbon\Carbon::now())->where('draft', false)->paginate(12);
			}
		else{
			// Same logic from above but with admins/writers.  Also they can see draft and future posts.
			if (Post::isValidPostType($type)){
				$posts = Post::where('type', $type)->paginate(12);
			}
			else{
				$type="all";
				$posts = Post::paginate(12);
			}
		}
		$view_data['posts'] = $posts;
		$view_data['post_type'] = $type;
		return view('hh.pages.post.index', $view_data);*/
		//URL param of wanted post type.
		$type = strtolower( \Request::input('type') );
		// Non logged in users and viewers do not see deaft and unpublished posts
		if (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER)
			// If the URL param is a valid post type (foodie, review, travel...) add it to sql query.
			if (Post::isValidPostType($type)){
				$posts = Post::where('type', $type)->where('draft', false)->where('avialable_at','<' ,\Carbon\Carbon::now())->paginate(12);
			}
			// if not valif post type then send all posts.
			else{
				$type="all";
				$posts = Post::where('avialable_at','<' ,\Carbon\Carbon::now())->where('draft', false)->paginate(12);
			}
		else{
			// Same logic from above but with admins/writers.  Also they can see draft and future posts.
			if (Post::isValidPostType($type)){
				$posts = Post::where('type', $type)->orderBy('avialable_at', 'desc')->paginate(12);
			}
			else{
				$type="all";
				$posts = Post::where('id', '>', 0)->orderBy('avialable_at', 'desc')->paginate(12);
			}
		}
		$view_data['posts'] = $posts;
		$view_data['post_type'] = $type;
		return view('hh.pages.single.dashboard', $view_data);
	}
	/*
	 * Allow admins and writers to view create post page.
	*/
	public function create()
	{
		$post = new Post();
		$this->authorize('create', $post);
		return view('hh.pages.post.create');
	}
	/*
	 * Allow admins and writers to create post.
	*/
	public function store(Request $request)
	{
		$post = new Post();
		$this->authorize('store', $post);
		$this->validate($request, [
			'title' => 'required|string|min:4|max:255|unique:posts,title',
			'summary' => 'required|string|min:4|max:255',
			'type' => 'required|in:foodie,review,travel',
			'content' => 'required|string',
			'avialable_at' => 'required|date',
			'draft' => 'required|boolean',
		]);

		$request->request->add(['user_id' => \Auth::user()->id]);
		$post = Post::create($request->all());
		return redirect($post->url);
	}
	/*
	 * Allow admins and writers to copy a post from bloggspot.
	*/
	public function copy(Request $request)
	{
		$post = new Post();
		$this->authorize('store', $post);

		$this->validate($request, [
			'website' => 'required|string',
		]);

		$website = $request->website;
		$website_content = file_get_contents($website);
	 
		preg_match("/date-header'><span>(.*?)<\\/span>/si", $website_content, $match);
		$post_date = $match[1];
		$post_datetime = \DateTime::createFromFormat('M d, Y', $post_date);

		preg_match('!post-labels["\']>(.*)</span>!is', $website_content, $match);
		$post_labels = strstr($match[1], '</span>', true);
		$post_labels = preg_match_all('!<a.+>(.+)</a>!',$post_labels,$labels);

		preg_match("/post-title entry-title' itemprop='name'>(.*?)<\\/h3>/si", $website_content, $match);
		$post_title = str_replace("\n","",$match[1]);

		preg_match("/post-body entry-content(.*?)<div class='post-footer'>/si", $website_content, $match);
		$post_content = strstr($match[1], '<');
		$post_content = str_replace("\n",'',$post_content);
		$post_content = preg_replace('/ (alt|id|onblur|class|style|imageanchor|border|data-original-width|data-original-width|data-original-height|height|width)="[^"]+"/', '', $post_content);
		$post_content = preg_replace("/ (alt|id|onblur|class|style|imageanchor|border|data-original-width|data-original-width|data-original-height|height|width)='[^']+'/", "", $post_content);
		$post_content = preg_replace("!</div></div>$!", "</div>", $post_content);
		$post_content = str_replace(' alt=""',"",$post_content);
		$post_content = str_replace("<a name='more'></a>","",$post_content);
		$post_content = str_replace("<div><span><br /></span></div>","",$post_content);
		$post_content = str_replace("<span><br /></span>","",$post_content);
		$post_content = str_replace("<br />","",$post_content);
		$post_content = str_replace("<div></div>","",$post_content);
		$post_content = str_replace('  />'," />",$post_content);
		$post_content = str_replace('  >',">",$post_content);
		$post_content = str_replace(' >',">",$post_content);
		$post_content = str_replace('<span>', '', $post_content);
		$post_content = str_replace('</span>', '', $post_content);
		$post_content = str_replace('>&nbsp;<', '><', $post_content);
		$post_content = str_replace('</a></div><div><a', '</a><a', $post_content);
		$post_content = str_replace('<div><a', '<div class="post-content-pictures"><a', $post_content);
		$post_content = str_replace('<div>', '<div class="post-content-paragraph">', $post_content);

		$post_summary = html_entity_decode(strip_tags($post_content));
		$post_summary = substr($post_summary, 0, 100);
		$post_summary = $post_summary."...";

		while (preg_match('!<a href="([^"]+)"><img src="([^"]+)" /></a>!', $post_content, $image)) { 
	   		preg_match('!<a href="([^"]+)"><img src="([^"]+)" /></a>!', $post_content, $image);
			$search_string='!<a href="'.$image[1].'"><img src="([^"]+)" /></a>!';
			$post_content = preg_replace($search_string,'<img src="'.$image[2].'" />',$post_content);
		}

		$post = ['title' => $post_title,
			'summary' => $post_summary,
			'type' => 'travel',
			'content' => $post_content,
			'avialable_at' => $post_datetime,
			'draft' => FALSE,
			'user_id' => \Auth::user()->id];

		$post_validation = new Request($post);

		$this->validate($post_validation, [
			'title' => 'required|string|min:4|max:255|unique:posts,title',
			'summary' => 'required|string|min:4|max:255',
			'type' => 'required|in:foodie,review,travel',
			'content' => 'required|string',
			'avialable_at' => 'required|date',
			'draft' => 'required|boolean',
		]);
		$new_post = Post::create($post);
		$new_post->downloadImages();

		foreach($labels[1] as $key=>$label){
			$tag = Tag::where('name',$label)->first();
			$id = 0;
			if (!empty($tag->id)){
				$id = $tag->id;
			}else{
				$tag = new Tag();
				$tag->name = $label;
				$tag->save();	
			}
			$postTag = new PostTag();
			$postTag->post_id = $new_post->id;
			$postTag->tag_id = $tag->id;
			$postTag->order = $key+1;
			$postTag->save();
		}

		return redirect($new_post->url);
	}
	/*
	 * Allow anyone to view posts that are not in draft mode or not published yet.
	*/
	public function show($type, $id, $slug)
	{
		$post = Post::findOrFail($id);

		if ($slug !== $post->slug) {
			return redirect()->to($post->url);
		}

		if ($type !== $post->type) {
			return redirect()->to($post->url);
		}

		//Only allow admins and writers to see posts that are scheduled for future dates.
		if( ($post->avialable_at > \Carbon\Carbon::now()) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}
		//Only allow admins and writers to see posts that are in draft mode.
		if( ($post->draft == true) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}

		//Save that user has visited the website
		if( !(\Auth::guest()) ){
			$userpost = new UserPost();
			$userpost->user_id = \Auth::user()->id;
			$userpost->post_id = $post->id;
			$userpost->created_at = \Carbon\Carbon::now();
			try {
				$userpost->save();
			} catch(\Illuminate\Database\QueryException $e){

			}
		}
		// get previous post id
		$view_data['previous_post'] = Post::where('draft', '=', FALSE)->where('type', '=', $post->type)->where('avialable_at', '<', $post->avialable_at)->where('avialable_at', '<', \Carbon\Carbon::now())->orderBy('avialable_at', 'desc')->first();
		// get next post id
		$view_data['next_post'] = Post::where('draft', '=', FALSE)->where('type', '=', $post->type)->where('avialable_at', '>', $post->avialable_at)->where('avialable_at', '<', \Carbon\Carbon::now())->orderBy('avialable_at', 'asc')->first();

		$view_data['post'] = $post;
		return view('hh.pages.post.show', $view_data);
	}
	/*
	 * Allow admins and writers to see edit post page.
	*/
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		$this->authorize('edit', $post);
		$view_data['post'] = $post;
		return view('hh.pages.post.edit', $view_data);
	}
	/*
	 * Allow admins and writers to edit post.
	*/
	public function update(Request $request, $id)
	{
		$post = Post::findOrFail($id);
		$this->authorize('update', $post);
		$this->validate($request, [
			'title' => 'required|string|min:4|max:255',
			'summary' => 'required|string|min:4|max:255',
			'type' => 'required|in:foodie,review,travel',
			'content' => 'required|string',
			'avialable_at' => 'required|date',
			'draft' => 'required|boolean',
		]);
		if ($request->title != $post->title){
			$this->validate($request, [
				'title' => 'unique:posts,title',
			]);
		}
		$post->update($request->all());
		return redirect($post->url);
	}
	/*
	 * Allow admins and writers to dete post.
	*/
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$this->authorize('destroy', $post);
		$post->delete();
		return redirect('/');
	}
	/*
	 * Display a print friendly version of a post
	*/
	public function printfriendly($id)
	{
		$post = Post::findOrFail($id);
		//Only allow admins and writers to see posts that are scheduled for future dates.
		if( ($post->avialable_at > \Carbon\Carbon::now()) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}
		//Only allow admins and writers to see posts that are in draft mode.
		if( ($post->draft == true) && (\Auth::guest() || \Auth::user()->type == User::TYPE_VIEWER) ){
			abort("404");
		}

		$view_data['post'] = $post;
		return view('hh.pages.post.printfriendly', $view_data);
	}
}
