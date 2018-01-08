@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="box box-primary" style="padding: 5px">
    <div class="box-header">
        <h2>{{ trans('adminlte_lang::message.new-request') }}</h2>
    </div>

    <div class="box-body">
    	<form>
    		<div class="row">
	    		<div id="input-name" class="form-group col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2">
	    			<label><strong>{{ trans('adminlte_lang::message.request-name') }} *</strong><span></span></label>
	    			<input type="text" class="form-control" id="name" placeholder="Enter request name">
	    		</div>
	    	</div>

	        <div class="row">
	            <div class="col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2 col-sm-12 col-xs-12">
	                <div id="input-priority" class="form-group">
	                    <label><strong>{{ trans('adminlte_lang::message.priority') }}</strong></label>
		                <select id="priority" class="form-control">
		                	<option>{{ trans('adminlte_lang::message.low-priority') }}</option>
					        <option selected="selected">{{ trans('adminlte_lang::message.normal-priority') }}</option>
					        <option>{{ trans('adminlte_lang::message.high-priority') }}</option>
					        <option>{{ trans('adminlte_lang::message.critical-priority') }}</option>
		                </select>
	                </div>

	                <div id="input-division" class="form-group">
						<label><strong>{{ trans('adminlte_lang::message.division') }} *</strong></label>
		                <select id="division" class="form-control">
		                	<option id="division-placeholder" style="display: none;"
		                		selected="selected" value="0">{{ trans('adminlte_lang::message.division-placeholder') }}</option>
		                	<option value="1">Hà Nội</option>
		                	<option value="2">Đà Nẵng</option>
		                </select>
	                </div>
	            </div>

	            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
	                <div id="input-expiration-date" class="form-group">
	                    <label>
	                    	<strong>{{ trans('adminlte_lang::message.expiration-date') }} *</strong>
	                    </label>

	                   	{{-- wrong-date needs its own label cuz the whole warning will be moved to a new line if the screen is too small --}}
	                    <label><strong id="wrong-date" style="font-size: 12px; display: none;">{{ trans('adminlte_lang::message.wrong-date') }} </strong></label>

		            	<div class="input-group date">
						    <div class="input-group-addon">
						    	<i class="fa fa-calendar"></i>
						    </div>
							<input type="text" class="form-control pull-right" id="expiration-date" 
								readonly="readonly" style="background:white;" placeholder="dd/mm/yyyy">
						</div>
	                </div>

	                <div id="input-involved-employees" class="form-group">
	                    <label><strong>{{ trans('adminlte_lang::message.involved') }}</strong></label>
		            	<div>
		            		<select id="involved-employees" class="form-control" name="involved-employees" multiple="multiple">
							    <option value="P1">personel 1</option>
							    <option value="P2">personel 2</option>
							    <option value="P3">personel 3</option>
							    <option value="P4">personel 4</option>
							    <option value="P5">personel 5</option>
							    <option value="P6">personel 6</option>
							    <option value="P7">personel 7</option>
							    <option value="P8">personel 8</option>
							    <option value="P9">personel 9</option>
							    <option value="P10">personel 10</option>
							</select>
		            	</div>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	        	<div id="input-content" class="form-group col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-12 col-xs-12">
	                <label><strong>{{ trans('adminlte_lang::message.content') }} *</strong></label>
	                <textarea id="content" placeholder="{{ trans('adminlte_lang::message.write-something') }}" rows="9" style="width: 100%;"></textarea>
	            </div>
	        </div>

	        <div class="row">
	        	<div id="input-attached-file" class="form-group col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-12 col-xs-12">
	    			<label><strong>{{ trans('adminlte_lang::message.attachment') }}</strong></label>
	    			<input id="attached-file" name="attached-file" type="file">
	    		</div>
	        </div>

	        <div class="row">
	        	<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-12 col-xs-12">
	        		<hr/>
	        		<div class="btn-toolbar pull-right">
	        			<button id="submit" type="button" class="btn btn-primary">{{ trans('adminlte_lang::message.submit') }}</button>
	        			<button id="clear" class="btn btn-default">{{ trans('adminlte_lang::message.clear') }}</button>
	        		</div>
	        	</div>
	        </div>
    	</form>
    </div>
</div>
@endsection

@section('page-script')
	<script type="text/javascript" src="{{ URL::asset('plugins/bootstrap-datepicker.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('plugins/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('plugins/select2.full.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('plugins/fileinput.min.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('js/add-request.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// Focus on the Name field
			$('#name').focus();

			// Date picker
		    $('#expiration-date').datepicker({
		    	autoclose: true,
		    	format: 'dd/mm/yyyy',
		    	startDate: new Date()
		    });

		    // WYSIHTML5
    		$('#content').wysihtml5();
    		$('.wysihtml5-sandbox').contents().find('body').keyup(function() {
    			if ($('#content').hasClass('has-error')) {
    				contentValidator();
    			}
    		}).on('focus', function() {
    			console.log('focused');

    			if ($('#input-content').hasClass('has-error')) {
    				$('.wysihtml5-sandbox').css('border-color', '#dd4b39');
    			}
    		});

    		// Select2 for assigning member 
    		$('#involved-employees').select2({
			    width: '100%' // This one line costs me a fucking day.
			}).on('select2:open', function() {
				$('.select2-selection').css('border-color', '#3c8dbc');
			}).on('select2:close', function() {
				$('.select2-selection').css('border-color', '#d2d6de');
			});

    		// Fileinput
			var fileInput = $('#attached-file').fileinput({
				maxFileCount: 5,
				dropZoneEnabled: true,
				showUpload: false,
				showCancel: false,
			});

			// Validate these stuffs as soon as it lost focus (if it's already has-error)
			$('#name').keyup(function() {
				if ($('#input-name').hasClass('has-error')) {
					nameValidator();
				}
			});

			$('#expiration-date').datepicker().on('changeDate', function() {
				console.log('datepicker has just lost the focus');

				if ($('#input-expiration-date').hasClass('has-error')) {
					dateValidator();
				}
			});

			$('#content').change(function() {
				if ($('#input-content').hasClass('has-error')) {
					contentValidator();
				}
			});

			$('#division').change(function() {
				if ($('#input-division').hasClass('has-error')) {
					divisionValidator();
				}
			});

			// Form validation
			$('#submit').click(function() {
				formValidator();
			});
		})
	</script>
@endsection

@section('page-style')
	<link href="{{ URL::asset('/plugins/datepicker3.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('/plugins/fileinput.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('/plugins/select2.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('/plugins/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection