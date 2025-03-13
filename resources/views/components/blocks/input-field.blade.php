<div>
    @if($label)
        <label for="{{ $name }}" class="block mb-2 text-md font-bold text-gray-900 dark:text-gray-300">{{$label}}</label>
    @endif
    <input autocomplete="off" type="{{ $type }}" id="{{ $name }}" value="{{ $value }}" {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }} @if($required) required @endif name="{{$name}}">
</div>
