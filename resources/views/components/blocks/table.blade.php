<x-blocks.card class="w-full">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if(!$noLinks)
            {{ $data->links() }}
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    @foreach ($columns as $column)
                        <th scope="col" class="px-6 py-3 text-{{ isset($column['align']) ? $column['align'] : 'right' }}">
                            {{ $column['label'] }}
                        </th>
                    @endforeach
                    @if($hasEdit || $hasDelete)
                        <th scope="col" class="px-6 py-3 text-right"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr class="{{ $rowClass }}">
                        @foreach ($columns as $col)
                            @if(isset($col['link']) && $col['link'])
                                <td class="px-6 py-4 text-{{ isset($col['align']) ? $col['align'] : 'right' }}">
                                    <a href="{{$route}}/{{$row[$rowKey]}}" class="text-blue-700">{{ $row[$col['field']] }}</a>
                                </td>
                            @else
                                <td class="px-6 py-4 text-{{ isset($col['align']) ? $col['align'] : 'right' }}">
                                    {{ $row[$col['field']] }}
                                </td>
                            @endif
                        @endforeach
                        @if($hasEdit || $hasDelete)
                            <td class="px-6 py-3 text-right">
                                @if($hasEdit)
                                    <x-blocks.icon-button round :href="$route.'/'.$row[$rowKey].'/edit'">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </x-blocks.icon-button>
                                @endif
                                @if($hasDelete)
                                    <x-blocks.icon-button round type="submit" onclick="onDelete({{$row[$rowKey]}})">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </x-blocks.icon-button>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(!$noLinks)
            {{ $data->links() }}
        @endif
    </div>
    @if($hasDelete)
    <script>
        function onDelete(id) {
            var confirm = window.confirm(' Do you want to delete this record?')
            if(confirm) {
                var form = document.createElement("form");
                var element1 = document.createElement("input");
                var element2 = document.createElement("input");

                form.method = "POST";
                form.action = "{{ $route }}/" + id.toString();

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
    @endif
</x-blocks.card>
