<x-layouts.admin :title="$title" :breadcrumbs="$breadcrumbs">
    <x-blocks.card class="py-2">
        <form action="{{ route('admin.quick-registrations.index') }}" method="GET">
            <div class="flex justify-center items-center">
                <div class="flex items-center">
                    Search using client id, country, name and email
                    <x-blocks.input-field name="search" class="w-auto mb-2 ml-2" plcaholder="Search Here"/>
                    <x-blocks.button type="submit" label="Search" class=""></x-blocks.button>
                </div>
            </div>
        </form>
    </x-blocks.card>
    @if($search)
        <div class="font-semibold">Search results for: {{$search}}</div>
    @endif
    <x-blocks.table striped :data="$data" :columns="$columns" route="{{route('admin.quick-registrations.index')}}" row-key="id" has-delete/>
</x-layouts.admin>
