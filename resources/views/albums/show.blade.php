@extends('layouts.app')

@section('content')
	<h1> {{$album->name}} </h1>
	<a class="button secondary" href="/">Go Back</a>
	<a class="button" href="/photos/create/{{$album->id}}">Upload photo to album</a>
	<hr>
		@if(count($album->photos) > 0)
		@php
			$colcount = count($album->photos);
			$i = 1;
		@endphp
		<div id="albums">
			<div class="row text-center">
				@foreach ($album->photos as $photo)
					@if ($i == $colcount)
						<div class="medium-4 columns end">
							<a class="thumbnail" href="/photos/{{$photo->id}}">
								<img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
							</a>
							<br>
							<h5>{{$photo->title}}</h5>
						
					@else
						<div class="medium-4 columns">
							<a class="thumbnail" href="/photos/{{$photo->id}}">
								<img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
							</a>
							<br>
							<h5>{{$photo->title}}</h5>
						
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
		<p>No Photos To Display</p>
	@endif
@endsection