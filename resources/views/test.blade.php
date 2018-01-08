@extends('adminlte::layouts.app')

@section('page-script')
<script type="text/javascript" src="js/spa.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		console.log('hash location: ' + window.location.hash.trim());

		// Route handling
		routing();

		sidebarClickHandler();
	});
</script>
@endsection