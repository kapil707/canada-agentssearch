<x-layouts.admin :title="$title" :breadcrumbs="$breadcrumbs">
    <div>
        <div class="grid grid-cols-1">
            <div class="font-bold pb-2.5 text-white bg-slate-700 flex justify-between px-4 py-2">
                <div class="text-xl">Client ID: {{$data->client_id}}</div>
                <div class="flex text-lime-300">
                    @role('super_admin')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <a href="{{route('admin.employers.download',$data->id)}}">Download</a>
                    @endrole
                </div>
                <div class="">Created
                    At: {{ $data->created_at->setTimezone('Canada/Eastern')->toDayDateTimeString() }}</div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-800 dark:text-gray-400">
                    @php
                        $rowClass = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200';
                        $headingClass = 'px-6 py-4 font-semifold text-gray-900 dark:text-white';
                        $valueClass = 'px-6 py-4';
                    @endphp
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-1/2">
                        </th>
                        <th scope="col" class="px-6 py-3 w-1/2">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>Canada Revenue Agency Payroll deductions program account number:</strong> {{ $data->form_data['crapdpan'] }}
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>Business Legal Name:</strong> {{ $data->form_data['business_legal_name'] }}
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>Business Address:</strong> {{ $data->form_data['business_address'] }}
                        </td>
                        <td class="{{ $valueClass }}">
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>Principle Employer Contact Information:</strong> {{ $data->form_data['principle_contact_info'] }}
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>Name:</strong> {{ $data->form_data['name'] }}
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>Job Title:</strong> {{ $data->form_data['job_title'] }}
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>Telephone Number:</strong> {{ $data->form_data['phone'] }}
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>Email:</strong> {{ $data->form_data['email'] }}
                        </td>
                        <td class="{{ $valueClass }}">
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>How many employees are employed nationally under the employer’s 9-digit CRA business number?:</strong> {{ $data->form_data['no_of_employees'] }}
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>Did the business report more than $5 million (CAD) in annual gross revenue to CRA during its last tax year?:</strong> {{ $data->form_data['more_than_5_million'] }}
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>In the last 12 months, did the employer lay off any employees working in the position(s) being requested in this application?:</strong> {{ $data->form_data['lay_off_last_12'] }}
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>If yes, how many Canadians/permanent residents? How many TFWs? Provide reason(s) for the layoff(s):</strong> {{ $data->form_data['no_of_canadians'] }}
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>I have received a positive LMIA decision in the past two years:</strong> {{ isset($data->form_data['positive_lmia_past_2']) ? $data->form_data['positive_lmia_past_2'] : '-'}}
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>My most recent LMIA decision was positive:</strong> {{ isset($data->form_data['last_limia_positive']) ? $data->form_data['last_limia_positive'] : '-'}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-blocks.card>
        <form action="{{route('admin.employers.update',$data->id)}}" method="POST">
            <div class="flex items-center">
                @csrf
                @method('PUT')
                <label for="assessed_as" class="block font-bold mb-2 text-sm  text-gray-900 dark:text-gray-400">Assessed As</label>
                <select id="assessed_as" name="assessed_as" class="mx-2 mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-72 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option>--Please Select--</option>
                    @foreach($assessment_options as $option)
                        <option value="{{$option}}" @if($data->assessed_as == $option) selected @endif>{{$option}}</option>
                    @endforeach
                    <!--<option value="ICT" @if($data->assessed_as == 'ICT') selected @endif>ICT</option>
                    <option value="CSUV" @if($data->assessed_as == 'CSUV') selected @endif>CSUV</option>
                    <option value="PNP" @if($data->assessed_as == 'PNP') selected @endif>PNP</option>-->
                </select>
                <x-blocks.button class="" label="Submit" type="submit"></x-blocks.button>
            </div>
        </form>
    </x-blocks.card>
    <div>
        <div class="grid grid-cols-1">
            @if($data->remarks->count() > 0)
                <div class="text-center text-2xl font-bold my-4">Remarks</div>
            @endif
            @foreach($data->remarks as $remark)
                <div id="accordion-open" data-accordion="collapse">
                    <h2 id="accordion-open-heading-{{$remark->id}}">
                        <button aria-controls="accordion-open-body-{{$remark->id}}"
                                aria-expanded=false"
                                class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-900 mt-4 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-open-body-{{$remark->id}}"
                                type="button">
                            <span class="flex items-center font-bold text-xl text-ellipsis"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                                 class="h-5 w-5" viewBox="0 0 20 20"
                                                                                                 fill="currentColor"><path
                                        d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"/></svg> {{ $remark->remark }}</span>
                            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-body-{{$remark->id}}" class="hidden" aria-labelledby="accordion-open-heading-{{$remark->id}}">
                        <x-blocks.card class="mt-2">
                            <div class="text-blue-700 mb-4">
                                [Created At: {{$remark->created_at->setTimezone('Canada/Eastern')->toDayDateTimeString() }}]
                            </div>
                            <div class="text-semibold">
                                Remark: {{ $remark->remark }}
                            </div>
                            @if($remark->next_follow)
                                <div class="text-semibold">
                                    Next Follow Up: {{ $remark->next_follow }}
                                </div>
                            @endif
                            @if($remark->quoted_fee)
                                <div class="text-semibold">
                                    Quoted Fee: {{ $remark->quoted_fee }}
                                </div>
                            @endif
                            @if($remark->file_1)
                                <div class="text-semibold">
                                    <a class="text-blue-700" href="{{url('storage/'.$remark->file_1)}}">File 1</a>
                                </div>
                            @endif
                            @if($remark->link_1)
                                <div class="text-semibold">
                                    Link 1: <a class="text-blue-700" href="{{$remark->link_1}}" target="_blank">{{$remark->link_1}}</a>
                                </div>
                            @endif
                            @if($remark->file_2)
                                <div class="text-semibold">
                                    <a class="text-blue-700" href="{{url('storage/'.$remark->file_2)}}">File 2</a>
                                </div>
                            @endif
                            @if($remark->link_2)
                                <div class="text-semibold">
                                    Link 2: <a class="text-blue-700" href="{{$remark->link_2}}" target="_blank">{{$remark->link_2}}</a>
                                </div>
                            @endif
                            @if($remark->file_3)
                                <div class="text-semibold">
                                    <a class="text-blue-700" href="{{url('storage/'.$remark->file_3)}}">File 3</a>
                                </div>
                            @endif
                            @if($remark->link_3)
                                <div class="text-semibold">
                                    Link 3: <a class="text-blue-700" href="{{$remark->link_3}}" target="_blank">{{$remark->link_3}}</a>
                                </div>
                            @endif
                            @if($remark->file_4)
                                <div class="text-semibold">
                                    <a class="text-blue-700" href="{{url('storage/'.$remark->file_4)}}">File 4</a>
                                </div>
                            @endif
                            @if($remark->link_4)
                                <div class="text-semibold">
                                    Link 4: <a class="text-blue-700" href="{{$remark->link_4}}" target="_blank">{{$remark->link_4}}</a>
                                </div>
                            @endif
                        </x-blocks.card>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-xl font-bold my-4">Add Remark</div>
    <div class="relative md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <form action="{{ route('admin.form-remarks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $data->id }}" name="form_submission_id"/>
                <x-blocks.card>
                    @if ($errors->any())
                        <x-blocks.alert type="danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </x-blocks.alert>
                    @endif
                    <label for="message"
                           class="block mb-2 text-md font-bold text-gray-900 dark:text-gray-400">Your
                        Remark</label>
                    <textarea @if ($errors->any()) autofocus @endif id="message" rows="4" name="remark" required
                              class="mb-4 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Your remark here...">{{old('remark')}}</textarea>
                    <x-blocks.input-field type="text" class="mb-4" label="Quoted Fee?" name="quoted_fee"
                                          value="{{old('quoted_fee')}}"></x-blocks.input-field>
                    <x-blocks.input-field type="date" class="mb-4" label="Next Follow Up?" name="next_follow"
                                          value="{{old('next_follow')}}"></x-blocks.input-field>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <x-blocks.input-field type="file" class="mb-4" label="File 1"
                                              name="file_1"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Link 1"
                                              name="link_1" value="{{old('link_1')}}"></x-blocks.input-field>
                        <x-blocks.input-field type="file" class="mb-4" label="File 2"
                                              name="file_2"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Link 2"
                                              name="link_2" value="{{old('link_2')}}"></x-blocks.input-field>
                        <x-blocks.input-field type="file" class="mb-4" label="File 3"
                                              name="file_3"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Link 3"
                                              name="link_3" value="{{old('link_3')}}"></x-blocks.input-field>
                        <x-blocks.input-field type="file" class="mb-4" label="File 4"
                                              name="file_4"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Link 4"
                                              name="link_4" value="{{old('link_4')}}"></x-blocks.input-field>
                    </div>
                    <x-blocks.button type="submit" label="Save"></x-blocks.button>
                </x-blocks.card>
            </form>
        </div>
    </div>
</x-layouts.admin>
