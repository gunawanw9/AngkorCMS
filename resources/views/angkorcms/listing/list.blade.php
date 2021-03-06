@if(count($listing->items)>0)
	<ul class='@if(isset($attr['list-class'])){{$attr['list-class']}} @endif'>
		@if(isset($attr['list-item-add']))
			{!!$attr['list-item-add']!!}
		@endif
		@foreach($listing->items as $item)
			<li class='@if(isset($attr['list-item-class'])){{$attr['list-item-class']}} @endif'>
				@if($item->url != '')
					@if($parameters['end_url'] == $item->url OR '/'.$parameters['end_url'] == $item->url)
						<a href="#{{ $item->anchor }}">{!! $item->text !!}</a>
					@else
						<a href="{{ url($item->url) }}{{ $item->anchor!='' ? '#'.$item->anchor : '' }}">{!! $item->text !!}</a>
					@endif
				@else
					{!! $item->text !!}
				@endif
			</li>
		@endforeach
	</ul>
@endif
