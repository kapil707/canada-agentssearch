
@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'text-blue-700 hover:text-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium '. ($round ? 'rounded-full' : 'rounded-lg').' text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{$type}}" {{ $attributes->merge(['class' => 'text-blue-700 hover:text-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium '. ($round ? 'rounded-full' : 'rounded-lg').' text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) }}>
        {{ $slot }}
    </button>
@endif
