@extends('dds.layouts.app')

@if(!empty($piece->jpg))
	@section('image',asset('dds/images/pieces/'.$piece->jpg))
@endif

@if(!empty($piece->title))
	@section('title',$piece->title.' by Jeremy Allen')
@endif

@if(!empty($piece->summary))
	@section('description',$piece->summary)
@endif

@if(!empty($piece->jpg))
	@section('created_at',substr($piece->jpg, 4, 2).'-'.substr($piece->jpg, 6, 2).'-'.substr($piece->jpg, 0, 4))
@endif

@section('content')
	<br/>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="row piece_row piece_image">
					<img src="{{ asset('dds/images/pieces/'.$piece->jpg) }}"><br/>
				</div>
				<div class="row piece_row">
					<a target="_blank" href="https://www.facebook.com/sharer.php?u={{ URL::current() }}" class="col btn btn-outline-primary piece_social_icon">
						<span class="fa fa-facebook"></span>Share it
					</a>
					<a target="_blank" href="https://www.twitter.com/share?text={{ $piece->title }} by Jeremy Allen&amp;url={{ URL::current() }}" class="col btn btn-outline-primary piece_social_icon">
						<span class="fa fa-twitter"></span>Tweet it
					</a>
					<a target="_blank" href="https://www.pinterest.com/pin/create/button/?url={{ URL::current() }}&amp;media={{ asset('dds/images/pieces/'.$piece->jpg) }}&amp;description={{ $piece->title }} by Jeremy Allen" class="col btn btn-outline-primary piece_social_icon">
						<span class="fa fa-pinterest"></span>Pin it
					</a>
				</div>
			</div>
			<div class="col">
				<div class="row piece_row"><h1>{{ $piece->title }} by Jeremy Allen</h1></div>
				<div class="row piece_row"><h5>{{ $piece->summary }}</h5></div>
				<div class="row piece_row"><div class="col text-center">{{ $piece->value == NULL ? 'Sold' : 'Cost: $'.$piece->value }}</div></div>
				<div class="row piece_row">
					<div class="col text-center"><a href="{{ $piece->ebay }}" class="btn btn-primary {{ $piece->ebay == '#' ? 'disabled': '' }}" role="button" target="_blank">eBay</a></div>
					<div class="col text-center"><a href="{{ $piece->amazon }}" class="btn btn-primary {{ $piece->amazon == '#' ? 'disabled': '' }}" role="button" target="_blank">Amazon</a></div>
					<div class="col text-center">
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="business" value="2T8WUKEW7XTMY">
							<input type="hidden" name="lc" value="US">
							<input type="hidden" name="item_name" value="{{ $piece->title }}">
							<input type="hidden" name="item_number" value="{{ substr($piece->jpg,0,-4) }}">
							<input type="hidden" name="amount" value="{{ $piece->value }}.00">
							<input type="hidden" name="currency_code" value="USD">
							<input type="hidden" name="button_subtype" value="services">
							<input type="hidden" name="no_note" value="0">
							<input type="hidden" name="cn" value="Add special instructions to the seller:">
							<input type="hidden" name="no_shipping" value="2">
							<input type="hidden" name="rm" value="1">
							<input type="hidden" name="return" value="{{ secure_url('/drawings/purchased/'.substr($piece->jpg,0,-4)) }}">
							<input type="hidden" name="cancel_return" value="{{ URL::current() }}">
							<input type="hidden" name="tax_rate" value="0.000">
							<input type="hidden" name="shipping" value="0.00">
							<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
							<input type="submit" value="PayPal" class="btn btn-primary {{ $piece->paypal == '0' ? 'disabled': '' }}">
						</form>
					</div>
				</div>
				<div class="row piece_row piece_description">
					<p><h6>{!! $piece->description !!}</h6></p>
					<p><h6>This is an original drawing by Jeremy Allen. All pieces are done on acid free, medium-weight (70 lb.) drawing paper and finished with Sanford Prismacolor fixative spray to protect against UV light and smudging.</h6></p>
					<ul>
						<li><h6>Drawing is {{ $piece->width }} inches wide by {{ $piece->height }} inches height and have a 1 inch hand drawn boarder.</h6></li>
						<li><h6>Artwork ships directly from the Delightful Drawings Studio in a rigid tube mailer for protection.</h6></li>
					</ul>
				</div>
				{{--
				<div class="row piece_row">
					@foreach($piece->getPieceCategories() as $category)
						<div class="col">
							<a href="/drawings/pencil/{{ $category }}/" class="btn btn-outline-primary btn-sm">{{ $category }}</a>
						</div>
					@endforeach
				</div>
				--}}
			</div>
		</div>
		<div class="row piece_row">
			<div class="col d-flex justify-content-center">
				<a href="/drawings/pencil/{{ $category }}" class="btn btn-outline-primary btn-lg">
					<svg aria-hidden="true" focusable="false" role="presentation" class="piece_icon" viewBox="0 0 20 8"><path d="M4.814 7.555C3.95 6.61 3.2 5.893 2.568 5.4 1.937 4.91 1.341 4.544.781 4.303v-.44a9.933 9.933 0 0 0 1.875-1.196c.606-.485 1.328-1.196 2.168-2.134h.752c-.612 1.309-1.253 2.315-1.924 3.018H19.23v.986H3.652c.495.632.84 1.1 1.036 1.406.195.306.485.843.869 1.612h-.743z" fill="#000" fill-rule="evenodd"></path></svg>
					Back to {{ $category }}
				</a>
			</div>
		</div>

	</div>
@endsection

@section('scripts')
	@parent
@stop
