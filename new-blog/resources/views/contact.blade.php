@extends('layouts.app')


@section('content')

	<h1>Contact</h1>
	
	@if(count($people))
	
		@foreach($people as $person)
		
		<ul>
			<li>{{$person}}</li>
		</ul>
			@endforeach
		
	
	@endif
	
@section('footer')
<script>

</script>
@stop