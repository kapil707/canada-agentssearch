<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="width: 100%; height: 100%; min-height: 100% !important;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Just2Canada Admin' }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
        <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    </head>
    <body class="antialiased h-full">
        <div class="wrapper h-auto min-h-full w-full relative" x-data="{showSidebar: false}">
            <x-admin.header/>
            <x-admin.sidebar/>
            <div class="content-wrapper ml-0 lg:ml-64 relative">
                @if($title)
                    <x-blocks.page-header :title="$title" :breadcrumbs="$breadcrumbs" :no-breadcrumbs="!$breadcrumbs">
                        @if($afterTitleButton)
                            <x-slot name="afterTitle">
                                <x-blocks.button variant="primary" id="{{$afterTitleButtonId}}" :label="$afterTitleButtonLabel" class="ml-4 mr-0 mb-0" :type="$afterTitleButtonType" href="{{ $afterTitleButtonRoute ? route($afterTitleButtonRoute,$afterTitleButtonRouteParam) : NULL }}" :formId="$afterTitleButtonForm"/>
                            </x-slot>
                        @endif
                    </x-blocks.page-header>
                @endif
                <div class="p-4 relative">
                    @if(session('success'))
                        <x-blocks.alert type="success">
                            {{ session('success') }}
                        </x-blocks.alert>
                    @elseif(session('danger'))
                        <x-blocks.alert type="danger">
                            {{ session('danger') }}
                        </x-blocks.alert>
                    @elseif(session('info'))
                        <x-blocks.alert type="info">
                            {{ session('info') }}
                        </x-blocks.alert>
                    @elseif(session('warning'))
                        <x-blocks.alert type="warning">
                            {{ session('warning') }}
                        </x-blocks.alert>
                    @endif
                    {{ $slot }}
                </div>
            </div>
        </div>
        @livewireScripts
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>

</html>
