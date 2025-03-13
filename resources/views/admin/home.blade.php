<x-layouts.admin :title="$title">
    <x-blocks.card>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <x-blocks.card class="bg-gray-700 text-white">
                Business Forms Submitted Today <span class="p-2 rounded-md bg-white text-gray-900"><strong>{{$business_form_today_count}}</strong></span>
            </x-blocks.card>
            <x-blocks.card class="bg-green-800 text-white">
                Total Business Forms <span class="p-2 rounded-md bg-white text-gray-900"><strong>{{$business_form_count}}</strong></span>
            </x-blocks.card>
        </div>
        @php
            $columns = [
                ['label' => 'ID', 'field' => 'id', 'align' => 'left', 'sortable' => true],
                ['label' => 'Client ID', 'field' => 'client_id', 'align' => 'left', 'sortable' => true,'link' => true],
                ['label' => 'Name', 'field' => 'name', 'align' => 'left', 'sortable' => true],
                ['label' => 'Email', 'field' => 'email', 'align' => 'left', 'sortable' => true],
                ['label' => 'Country', 'field' => 'country', 'align' => 'left', 'sortable' => true],
            ];
        @endphp
        <div class="mt-4">
            <div class="text-xl">Latest Business Form Submissions</div>
            <x-blocks.table striped :data="$lastest_business_forms" :columns="$columns" route="{{route('admin.business-applications.index')}}" row-key="id" no-links/>
        </div>
        <div class="mt-4">
            <div class="text-xl">Reminders for Today</div>
            <div class="grid grid-cols-1 md:grid-cols-3">
                @if($reminders->count() > 0)
                    @foreach($reminders as $item)
                        <x-blocks.card class="bg-blue-700 text-white">
                            Client ID: <a href="{{route('admin.business-applications.show', $item->form_submission->id)}}">{{$item->form_submission->client_id}}</a> <br>
                            Applicant Name: {{$item->form_submission->form_data['name']}}<br>
                            Remark: {{$item->remark}}
                        </x-blocks.card>
                    @endforeach
                @else
                    <div class="text">No reminders</div>
                @endif
            </div>
        </div>
    </x-blocks.card>
</x-layouts.admin>
