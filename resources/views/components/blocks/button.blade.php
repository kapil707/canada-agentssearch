@if($href)
    <a href="{{ $href }}" {{$attributes->merge(['class' => $componentClass])}}>{{$label}}</a>
@else
    <button type="{{$type}}" {{$attributes->merge(['class' => $componentClass])}}
        @if($formId) form="{{$formId}}" @endif
    >{{$label}}</button>
@endif
