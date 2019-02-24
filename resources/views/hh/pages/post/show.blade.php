@extends('hh.layouts.boarder')

@if(!empty($post->meta()->title))
	@section('title','HoxsieHouse - '.$post->meta()->title)
@else
	@section('title','HoxsieHouse - '.$post->title)
@endif

@if(!empty($post->meta()->description))
	@section('description',$post->meta()->description)
@endif

@if(false)
	@section('tags','')
@endif

@if(!empty($post->meta()->lat))
	@section('lat',$post->meta()->lat)
@endif

@if(!empty($post->meta()->long))
	@section('long',$post->meta()->long)
@endif

@if(!empty($post->meta()->street))
	@section('street',$post->meta()->street)
@endif

@if(!empty($post->meta()->city))
	@section('city',$post->meta()->city)
@endif

@if(!empty($post->meta()->zip))
	@section('zip',$post->meta()->zip)
@endif

@if(!empty($post->meta()->country))
	@section('country',$post->meta()->country)
@endif

@if(!empty($post->thumbnailPath()))
	@section('image',$post->thumbnailPath())
@endif

@if(!empty( App\Models\hh\Post::SITE_NAMES[$post->type] ))
	@section('site_name',App\Models\hh\Post::SITE_NAMES[$post->type])
@endif

@if(!empty($post->avialable_at))
	@section('created_at',$post->avialable_at)
@endif

@section('content')
	{{-- {{ $post->downloadImages() }} --}}
	{{-- Admin controls --}}
	@if(!Auth::guest()) @if( (Auth::user()->type == App\Models\hh\User::TYPE_ADMIN) || (App\Models\hh\User::isPostMine($post->id)) )
		<div class="form-group">
			<a href="/post/{{ $post->id }}/edit" class="btn btn-primary pull-left">Edit</a>
			{!! Form::open(['url' => 'post/'.$post->id, 'method' => 'delete']) !!}	{!! Form::submit('Delete', ['class' =>'btn btn-primary pull-right confirm', 'data-confirm' => 'Are you sure you want to delete this post?']) !!}	{!! Form::close() !!}<br/>
		</div>
		<hr/>
	@endif @endif

	{{-- Post Banner --}}
	@include('hh.includes.banner')

	{{-- Post Title --}}
	<div class="post-title">{{ $post->title }}</div>

	{{-- Publish Date --}}
	<div class="post-date">Posted {{ date('F d, Y', strtotime($post->avialable_at)) }}</div>

	{{-- Post content --}}
	<div class="post-content">{!! $post->content !!}</div>

	{{-- Next/last Post --}}
	<div class="post-pagination">
		@if ($previous_post != NULL)<a href="/{{ $previous_post->url }}" class="previous_post"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i> Previous Post</a>@endif
		@if ($next_post != NULL)<a href="/{{ $next_post->url }}" class="next_post">Next Post <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>@endif
	</div>

	{{-- Post Tags --}}
	@if (count($post->tags()) > 0)
		<div class="post-box"><h4 class="post-box-title"><span>Tags</span></h4></div>
		<div class="post-tags">
			@foreach ($post->tags() as $tag)
				<li><a href="/tag/{{ $tag->name }}"><span class="post-tag">{{ $tag->name }}</span></li></a>
			@endforeach
		</div>
	@endif

	{{-- Post Meta --}}
	@if(!empty($post->meta()->id))
		<div class="post-box"><h4 class="post-box-title"><span>Location</span></h4></div>
		<div class="post-meta">
		@if(!empty($post->meta()->city))
			<li><a href="/location/{{ $post->meta()->city }}"><span class="post-tag">{{ $post->meta()->city }}</span></li></a>
		@endif
		@if(!empty($post->meta()->state))
			<li><a href="/location/{{ $post->meta()->state }}"><span class="post-tag">{{ $post->meta()->state }}</span></li></a>
		@endif
		@if(!empty($post->meta()->zip))
			<li><a href="/location/{{ $post->meta()->zip }}"><span class="post-tag">{{ $post->meta()->zip }}</span></li></a>
		@endif
		@if(!empty($post->meta()->country))
			<li><a href="/location/{{ $post->meta()->country }}"><span class="post-tag">{{ $post->meta()->country }}</span></li></a>
		@endif
		</div>
	@endif

	{{-- Share Post --}}
	<div class="post-box"><h4 class="post-box-title"><span>Share Post</span></h4></div>
	<div class="post-shares">
		<li  ><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/').'/'.$post->url }}" title="Share on Facebook" ><i class="fab fa-facebook fa-2x post-share"></i></a></li>
		<li  ><a target="_blank" href="https://twitter.com/home?status={{ url('/').'/'.$post->url }}" target="_blank" title="Share on Twitter" ><i class="fab fa-twitter fa-2x post-share"></i></a></li>
		<li  ><a target="_blank" href="https://pinterest.com/pin/create/button/?url={{ url('/').'/'.$post->url }}&media={{ $post->thumbnailPath() }}&description=" target="_blank" title="Share on Pinterest" ><i class="fab fa-pinterest fa-2x post-share"></i></a></li>
		<li class="dropdown">
			<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Share via Email" ><i class="fas fa-envelope fa-2x post-share"></i></a>
			<div class="dropdown-menu post-show-dropdown" aria-labelledby="dropdownMenuLink">
				<a target="_blank" class="post-show-emailshare" href="https://mail.google.com/mail/?view=cm&fs=1&su=Check out this blogpost!&body=I thought you would like to read this post: {{ url('/').'/'.$post->url }}"   title="Share via Gmail"><img src="/hh/images/icon/mail/gmail.png" /> Gmail</a>
				<a target="_blank" class="post-show-emailshare" href="https://outlook.live.com/default.aspx?rru=compose&subject=Check out this blogpost!&body=I thought you would like to read this post: {{ url('/').'/'.$post->url }}"   title="Share via Hotmail"><img src="/hh/images/icon/mail/hotmail.png" /> Hotmail</a>
				<a target="_blank" class="post-show-emailshare" href="http://compose.mail.yahoo.com/?subj=Check out this blogpost!&body=I thought you would like to read this post: {{ url('/').'/'.$post->url }}"   title="Share via Yahoo"><img src="/hh/images/icon/mail/yahoo.png" /> Yahoo</a>
				<a target="_blank" class="post-show-emailshare" href="http://mail.aol.com/mail/compose-message.aspx?subject=Check out this blogpost!&body=I thought you would like to read this post: {{ url('/').'/'.$post->url }}"   title="Share via AOL"><img src="/hh/images/icon/mail/aol.png" /> AOL</a>
				<a target="_blank" class="post-show-emailshare" href="mailto:?subject=Check out this blogpost!&body=I thought you would like to read this post: {{ url('/').'/'.$post->url }}"  title="Share via mail"><img src="/hh/images/icon/mail/general.png" /> Other</a>
			</div>
		</li>
	</div>

	{{-- Show post comment --}}
	<div class="post-box"><h4 class="post-box-title"><span>Comments</span></h4></div>
	@if ( empty(App\Models\hh\Comment::comments($post->id)[0]) )
		<div class="post_comment">
			There are no comments to display.
		</div>
	@else
		@foreach( App\Models\hh\Comment::comments($post->id) as $comment)
			<div class="comment level_{{ $comment->level }}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="list-inline">
							<li>{{ $comment->user()->name }}</li>
							<li class="pull-right">{{ $comment->timeElapsed() }}</li>
						</ul>
					</div>
					<div class="panel-body">
						{{ $comment->comment }}
					</div>
					<div class="panel-footer">
						<ul class="list-inline">
							<li>
								@if( App\Models\hh\Comment::canComment($comment->level) )
									<a href="javascript:void(0)" class="ajax-show-reply btn btn-primary">reply</a>
								@endif
							</li>
							<li>
								@if ( !Auth::guest() ) @if ( Auth::user()->type == App\Models\hh\User::TYPE_ADMIN )
									{{ Form::open(['url' => 'comment/'.$comment->id, 'method' => 'delete']) }}
									{!! Form::button('delete', ['type'=>'submit', 'class' => 'btn btn-primary confirm', 'data-confirm' => 'Are you sure you want to delete this comment?']) !!}</span>
									{{ Form::close() }}
								@endif @endif
							</li>
						</ul>
					</div>
				</div>
			</div>
			@if( App\Models\hh\Comment::canComment($comment->level) )
				<div class="comment comment_reply hidden level_{{ $comment->level+1 }}">
					<div class="panel panel-default">
						<div class="panel-heading">Reply to {{ $comment->user()->name }}'s comment</div>
						<div class="panel-body">
							{!! Form::open(['url' => 'comment/', 'method' => 'post']) !!}
								{!! Form::hidden('post_id',$post->id) !!}
								{!! Form::hidden('parent_id',$comment->id) !!}
								{!! Form::textarea('comment', null, ['class'=>'comment_textbox']) !!}<br/>
								{!! Form::submit('111', ['type'=>'submit', 'class' =>'comment-submit-action hidden']) !!}
							{!! Form::close() !!}
						</div>
						<div class="panel-footer"><a href="javascript:void(0)" class="comment-submit-link btn btn-primary">save</a></div>
					</div>
				</div>
			@endif
		@endforeach
	@endif
	@if ( !Auth::guest() )
	{{-- Show post comment --}}
	<div class="post-box"><h4 class="post-box-title"><span>New Comment</span></h4></div>
		<div class="comment comment_reply level_1">
			<div class="panel panel-default">
				<div class="panel-heading">Make a comment on the post</div>
				<div class="panel-body">
					{!! Form::open(['url' => 'comment/', 'method' => 'post']) !!}
						{!! Form::hidden('post_id',$post->id) !!}
						{!! Form::textarea('comment', null, ['class'=>'comment_textbox']) !!}<br/>
						{!! Form::submit('111', ['type'=>'submit', 'class' =>'comment-submit-action hidden']) !!}
					{!! Form::close() !!}
				</div>
				<div class="panel-footer"><a href="javascript:void(0)" class="comment-submit-link btn btn-primary">save</a></div>
			</div>
		</div>
	@endif
@endsection

@section('scripts')
	@parent
	{{-- set the active navbar --}}
	<script>
		$(function () {
			$('.ajax-show-reply').on('click', function () {
				$(this).parent().parent().parent().parent().parent().next('.comment_reply').toggleClass('hidden');
			});
			$('.comment-submit-link').on('click', function () {
				$(this).parent().parent().find('.comment-submit-action').click();
			});
		});
	</script>
	<script type="text/javascript">
		$('.confirm').on('click', function (e) {
			return !!confirm($(this).data('confirm'));
		});
	</script>
	<style type="text/css">.atm-f{display: none;}</style>
@stop

