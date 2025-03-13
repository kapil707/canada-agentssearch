<x-layouts.admin
    :title="$title"
    :breadcrumbs="$breadcrumbs"
    after-title-button
    after-title-button-label="Create"
    after-title-button-route="admin.pages.create"
    >
    <x-blocks.table striped :data="$data" :columns="$columns" route="{{route('admin.pages.index')}}" row-key="id" has-delete has-edit/>
</x-layouts.admin>
