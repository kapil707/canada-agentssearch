<div class="grid grid-cols-1 lg:grid-cols-2 pb-2 pt-4 lg:pt-2 px-6 bg-slate-200 lg:h-14">
    <div class="flex items-center justify-between lg:justify-start">
        <div class="t text-xl font-semibold text-gray-700">{{$title}}</div>
        @if(isset($afterTitle))
        <div class="">
            {{ $afterTitle }}
        </div>
        @endif
    </div>
    @if(!$noBreadcrumbs)
        <div class="flex justify-start lg:justify-end h-14 lg:h-auto">
            <x-blocks.breadcrumb :items="$breadcrumbs"/>
        </div>
    @endif
</div>