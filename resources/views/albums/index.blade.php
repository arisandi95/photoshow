@extends('layouts.app')

@section('content')
	@if(count($albums) > 0)
		@php
			$colcount = count($albums);
			$i = 1;
		@endphp
		<div id="albums">
			<div class="row text-center">
				@foreach ($albums as $album)
					@if ($i == $colcount)
						<div class="medium-4 columns end">
							<a class="thumbnail" href="/albums/{{$album->id}}">
								<img src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
							</a>
							<br>
							<h5>{{$album->name}}</h5>
						
					@else
						<div class="medium-4 columns">
							<a class="thumbnail" href="/albums/{{$album->id}}">
								<img src="storage/album_covers/{{$album->cover_image}}"  alt="{{$album->name}}">
							</a>
							<br>
							<h5>{{$album->name}}</h5>
						
					@endif
						@if ($i % 3 == 0)
							</div></div><div class="row text-center">
						@else
							</div>
						@endif
					@php
						$i++;
					@endphp
				@endforeach
			</div>
		</div>
	@else
		<p>No Albums To Display</p>
	@endif

@endsection
