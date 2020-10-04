<div id="contact" class="component rich-text col-xs-12">
	<div class="dashboard-header">
		<h1>Contact Us</h1>
		<div class="dashboard-section">
			<span class="outer-line"></span>
			<span class="fas fa-envelope fa-3x"></span>
			<span class="outer-line"></span>
		</div>
	</div>
</div>
<div class="container dashboard-contact">
	<section>
		<div class="row align-items-center">
			<div class="col-6 text-center">
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#QuoteModal">Request Quote</button>
			</div>
			<div class="col-6 text-center">
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ContactModal">Contact Us</button>
			</div>
		</div>
	</section>
</div>



<div id="QuoteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Request Quote</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['url' => 'quote', 'method' => 'post']) !!}
					<div class="form-group">
						{!! Form::label('name','Name') !!}
						{!! Form::text('name','',['class' =>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('ctype','Contact Type') !!}<br/>
						<span>E-mail</span> {!! Form ::radio('ctype','E-mail') !!}
						<span>Text</span> {!! Form ::radio('ctype','Text') !!}
						<span>Voice</span> {!! Form ::radio('ctype','Phone') !!}
						<span>Facebook</span> {!! Form ::radio('ctype','Facebook') !!}
					</div>
					<div class="form-group">
						{!! Form::label('contact','Contact Info') !!}
						{!! Form::text('contact','', ['class' =>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('ptype','Project Type') !!}
						{!! Form::text('ptype','', ['class' =>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('timeframe','Project Timeframe') !!}<br/>
						<span>Immeditely</span> {!! Form ::radio('timeframe','Immeditely') !!}
						<span>1-4 Weeks</span> {!! Form ::radio('timeframe','1-4 Weeks') !!}
						<span>1-6 Months</span> {!! Form ::radio('timeframe','1-6 Months') !!}
						<span>6+ Months</span> {!! Form ::radio('timeframe','6+ Months') !!}
					</div>
					<div class="form-group">
						{!! Form::label('description','Description') !!}
						{!! Form::textarea('description', null, ['class' =>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::submit('Submit', ['class' =>'btn btn-info']) !!}
						<button type="button" class="btn btn-info float-right" data-dismiss="modal">Close</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>



<div id="ContactModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Contact Checkered Tile</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['url' => 'contact', 'method' => 'post']) !!}
					<div class="form-group">
						{!! Form::label('name','Name') !!}
						{!! Form::text('name','',['class' =>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('ctype','Contact Type') !!}<br/>
						<span>E-mail</span> {!! Form ::radio('ctype','E-Mail') !!}
						<span>Text</span> {!! Form ::radio('ctype','Text') !!}
						<span>Voice</span> {!! Form ::radio('ctype','Phone') !!}
						<span>Facebook</span> {!! Form ::radio('ctype','Facebook') !!}
						<span>None</span> {!! Form ::radio('ctype','None') !!}
					</div>
					<div class="form-group">
						{!! Form::label('contact','Contact Info') !!}
						{!! Form::text('contact','', ['class' =>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('description','Description') !!}
						{!! Form::textarea('description', null, ['class' =>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::submit('Submit', ['class' =>'btn btn-info']) !!}
						<button type="button" class="btn btn-info float-right" data-dismiss="modal">Close</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
