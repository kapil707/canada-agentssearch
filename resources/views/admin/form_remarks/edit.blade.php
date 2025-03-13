<x-layouts.admin :title="$title" :breadcrumbs="$breadcrumbs">
    <div class="relative md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <form action="{{ route('admin.form-remarks.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                              placeholder="Your remark here...">{{old('remark',$data->remark)}}</textarea>
                    <x-blocks.input-field type="text" class="mb-4" label="Quoted Fee?" name="quoted_fee"
                                          value="{{old('quoted_fee',$data->quoted_fee)}}"></x-blocks.input-field>
                    <x-blocks.input-field type="text" class="mb-4" label="Total Fee" name="total_fee"
                                          value="{{old('total_fee',$data->total_fee)}}"></x-blocks.input-field>
                    <x-blocks.input-field type="text" class="mb-4" label="The above fee covers the following services" name="services"
                                          value="{{old('services',$data->services)}}"></x-blocks.input-field>
                    <div class="flex">
                        <x-blocks.input-field type="text" class="mb-4" label="First Installment" name="first_installment"
                                              value="{{old('first_installment',$data->first_installment)}}"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Payable on" name="first_payable_on"
                                              value="{{old('first_payable_on',$data->first_payable_on)}}" type="date"></x-blocks.input-field>
                    </div>
                    <div class="flex">
                        <x-blocks.input-field type="text" class="mb-4" label="Second Installment" name="second_installment"
                                              value="{{old('second_installment',$data->second_installment)}}"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Payable on" name="second_payable_on"
                                              value="{{old('second_payable_on',$data->second_payable_on)}}" type="date"></x-blocks.input-field>
                    </div>
                    <div class="flex">
                        <x-blocks.input-field type="text" class="mb-4" label="Third Installment" name="third_installment"
                                              value="{{old('third_installment',$data->third_installment)}}"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Payable on" name="third_payable_on"
                                              value="{{old('third_payable_on',$data->third_payable_on)}}" type="date"></x-blocks.input-field>
                    </div>
                    <x-blocks.input-field type="date" class="mb-4" label="Next Follow Up?" name="next_follow"
                                          value="{{old('next_follow',$data->next_follow)}}"></x-blocks.input-field>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <x-blocks.input-field type="file" class="mb-4" label="File 1"
                                              name="file_1"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Link 1"
                                              name="link_1" value="{{old('link_1',$data->link_1)}}"></x-blocks.input-field>
                        <x-blocks.input-field type="file" class="mb-4" label="File 2"
                                              name="file_2"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Link 2"
                                              name="link_2" value="{{old('link_2',$data->link_2)}}"></x-blocks.input-field>
                        <x-blocks.input-field type="file" class="mb-4" label="File 3"
                                              name="file_3"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Link 3"
                                              name="link_3" value="{{old('link_3',$data->link_3)}}"></x-blocks.input-field>
                        <x-blocks.input-field type="file" class="mb-4" label="File 4"
                                              name="file_4"></x-blocks.input-field>
                        <x-blocks.input-field type="text" class="mb-4" label="Link 4"
                                              name="link_4" value="{{old('link_4',$data->link_4)}}"></x-blocks.input-field>
                    </div>
                    <x-blocks.button type="submit" label="Save"></x-blocks.button>
                </x-blocks.card>
            </form>
        </div>
    </div>
</x-layouts.admin>
