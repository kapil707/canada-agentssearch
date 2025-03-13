<template x-if="showSidebar">
    <div class="backdrop opacity-50 bg-black fixed top-0 right-0 left-0 bottom-0 block lg:hidden" @click="showSidebar = false"></div>
</template>
<div class="absolute bg-slate-800 top-0 left-0 h-full mt-0 lg:mt-12 w-64 z-50 transform lg:transform-none lg:opacity-100 duration-200" :class="{'translate-x-0 ease-in opacity-100':showSidebar === true, '-translate-x-full ease-out opacity-0': showSidebar === false}">
    <ul class="sidebar-menu overflow-hidden whitespace-nowrap">
        @foreach ($menuItems as $item)
        <li class="{{ $item['class'] }}">
            <a href="{{ route($item['route_name']) }}" class="block px-3 py-4" @if($item['route_name'] == 'job-seeker') target="_blank" @endif>
                @if(isset($item['icon']))
                    <span class="float-left">{!! $item['icon'] !!}</span>
                @endif
                {{$item['label']}}
            </a>
        </li>
        @endforeach
    </ul>
</div>
