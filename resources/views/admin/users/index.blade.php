<x-layouts.admin
    :title="$title"
    :breadcrumbs="$breadcrumbs"
    after-title-button
    after-title-button-type="button"
    after-title-button-label="Create"
    after-title-button-route="admin.users.create"
>
    <x-blocks.card class="py-2">
        <form action="{{ route('admin.users.index') }}" method="GET">
            <div class="flex justify-center items-center">
                <div class="flex items-center">
                    Search using name and email
                    <x-blocks.input-field name="search" class="w-auto mb-2 ml-2" plcaholder="Search Here"/>
                    <x-blocks.button type="submit" label="Search" class=""></x-blocks.button>
                </div>
            </div>
        </form>
    </x-blocks.card>
    @if($search)
        <div class="font-semibold">Search results for: {{$search}}</div>
    @endif
    @php
    $rowClass = 'border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-100 odd:dark:bg-gray-800 even:dark:bg-gray-700';
    @endphp
    <x-blocks.card class="w-full">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            {{ $data->links() }}
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left">ID</th>
                    <th scope="col" class="px-6 py-3 text-left">Name</th>
                    <th scope="col" class="px-6 py-3 text-left">Email</th>
                    <th scope="col" class="px-6 py-3 text-left">Role</th>
                    <th scope="col" class="px-6 py-3 text-left">Last Logged At</th>
                    <th scope="col" class="px-6 py-3 text-right"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $row)
                    <tr class="{{ $rowClass }}">
                        <td class="px-6 py-4 text-left">
                            {{$row['id']}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$row['name']}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$row['email']}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$row['roles'][0]['name']}}
                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$row['last_logged_in'] ? \Carbon\Carbon::parse($row['last_logged_in'])->setTimezone('Canada/Eastern')->toDayDateTimeString():'-'}}
                        </td>
                        <td class="px-6 py-3 text-right">
                            <x-blocks.icon-button round :href="route('admin.users.edit',$row['id'])">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </x-blocks.icon-button>
                            <x-blocks.icon-button round type="submit" onclick="onDelete({{$row['id']}})">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </x-blocks.icon-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
        <script>
            function onDelete(id) {
                var confirm = window.confirm(' Do you want to delete this record?')
                if(confirm) {
                    var form = document.createElement("form");
                    var element1 = document.createElement("input");
                    var element2 = document.createElement("input");

                    form.method = "POST";
                    form.action = "/admin/users/" + id.toString();

                    element1.value="{{ csrf_token() }}";
                    element1.name="_token";
                    form.appendChild(element1);

                    element2.value="DELETE";
                    element2.name="_method";
                    form.appendChild(element2);

                    document.body.appendChild(form);

                    form.submit();
                }
            }
        </script>
    </x-blocks.card>

    <!-- Main modal -->
    <div id="createModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->

        </div>
    </div>
</x-layouts.admin>
