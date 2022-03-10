{{--
	para revision de la variable attributes
	@dd( $attributes )
--}}
@props(['demo'])


<div {{ $attributes }}>
	{{ $slot }}

</div>

<div class="mt-2">
	@foreach($demo as $dem)
		<article>
			<h3>{{ $dem['title'] }}</h3>
			<p>{{ $dem['content'] }}</p>
		</article>
	@endforeach
</div>