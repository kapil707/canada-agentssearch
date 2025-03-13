<x-layouts.admin
    :title="$title"
    :breadcrumbs="$breadcrumbs"
    after-title-button
    after-title-button-type="submit"
    after-title-button-form="form"
    after-title-button-label="Save"
>
    <x-blocks.card>
        <form method="POST" id="form" action="{{ route('admin.pageheads.store') }}">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                @if($errors->any())
                    <x-blocks.alert type="danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-blocks.alert>
                @endif
                <x-blocks.input-field label="Page Title" name="title"/>
                <x-blocks.input-field label="URL Path" name="url_key"/>
                <div>
                    <div class="text-sm font-medium py-2">Page Content</div>
                    <textarea id="editor" name="content"></textarea>
                </div>
                <x-blocks.toggle label="Show In Main Menu?" class="pt-2" name="show_in_main_menu" is-checked="{{old('show_in_main_menu')}}"></x-blocks.toggle>
                <x-blocks.toggle label="Active?" name="active" is-checked="{{old('active')}}"></x-blocks.toggle>
                <x-blocks.input-field label="Meta Title" name="meta_title"/>
                <x-blocks.input-field label="Meta Keywords" name="meta_keywords"/>
                <div class="text-sm font-bold py-2">Meta Description</div>
                <textarea id="meta-description" name="meta_description" rows="4"></textarea>
            </div>
        </form>
        <script>
            tinymce.init({
                selector: 'textarea#editor',
                plugins: ['link','table','code'],  // required by the code menu item,
                menubar: 'edit insert format tools table',
            });
        </script>
    </x-blocks.card>
</x-layouts.admin>
