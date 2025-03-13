<x-layouts.admin :title="$title" :breadcrumbs="$breadcrumbs">
    <div>
        <div class="grid grid-cols-1">
            <div class="font-bold pb-2.5 text-white bg-slate-700 flex justify-between px-4 py-2">
                <div class="text-xl">Client ID: {{$data->client_id}}</div>
                <div class="">Created
                    At: {{ $data->created_at->setTimezone('Canada/Eastern')->toDayDateTimeString() }}</div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                @role('super_admin')
                <form method="POST" action="{{route('admin.business-applications.update',$data->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="" style="margin-top: 15px; display: flex;justify-content: end">
                        <x-blocks.button type="submit" label="Update"></x-blocks.button>
                    </div>
                @endrole
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
                        <td class="{{ $valueClass }}" colspan="1">
                            <span class="bg-gray-900 text-white px-2">1</span> <strong>Experience that applies to the
                                applicant:</strong>
                            <x-blocks.input-checkbox
                                name="experience"
                                :checked="old('experience',$data->form_data['experience'] ?? '') == 'Business Person'"
                                label="Business Person"
                                value="Business Person">
                            </x-blocks.input-checkbox>
                            <x-blocks.input-checkbox
                                name="experience"
                                :checked="old('experience',$data->form_data['experience'] ?? '') == 'Senior Manager'"
                                label="Senior Manager"
                                value="Senior Manager">
                            </x-blocks.input-checkbox>
                            <x-blocks.input-checkbox
                                name="experience"
                                :checked="old('experience',$data->form_data['experience'] ?? '') == 'Self Employed Artist'"
                                label="Self Employed Artist"
                                value="Self Employed Artist">
                            </x-blocks.input-checkbox>
                            <x-blocks.input-checkbox
                                name="experience"
                                :checked="old('experience',$data->form_data['experience'] ?? '') == 'I am a professional and am willing to invest in a business in Canada'"
                                label="I am a professional and am willing to invest in a business in Canada"
                                value="I am a professional and am willing to invest in a business in Canada">
                            </x-blocks.input-checkbox>
                            <x-blocks.input-checkbox
                                name="experience"
                                :checked="old('experience',$data->form_data['experience'] ?? '') == 'Skilled Work'"
                                label="Skilled Work"
                                value="Skilled Work">
                            </x-blocks.input-checkbox>
                            <x-blocks.input-checkbox
                                name="experience"
                                :checked="old('experience',$data->form_data['experience'] ?? '') == 'Student'"
                                label="Student"
                                value="Student">
                            </x-blocks.input-checkbox>
                            <x-blocks.input-checkbox
                                name="experience"
                                :checked="old('experience',$data->form_data['experience'] ?? '') == 'Other'"
                                label="Other"
                                value="Other">
                            </x-blocks.input-checkbox>
                        </td>
                    </tr>
                    <tr>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">2</span> <strong>Full Name (As per
                                passport):</strong>
                            <x-blocks.input-field name="name" value="{{ old('name',$data->form_data['name']) }}"/>
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>Email:</strong><x-blocks.input-field name="email" value="{{ old('email',$data->form_data['email'] ?? '') }}"></x-blocks.input-field>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>Phone Number (with country and area code):</strong>
                            <x-blocks.input-field name="phone" value="{{ old('phone',$data->form_data['phone'] ?? '') }}"></x-blocks.input-field>
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>Country of residence:</strong>
                            <select id="country" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0">--Select--</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->name}}" @if(old('country',$data->form_data['country'] ?? '') == $country->name) selected @endif>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>City of
                                residence:</strong>
                            <x-blocks.input-field name="city_of_residence" value="{{ old('city_of_residence',$data->form_data['city_of_residence'] ?? '') }}"></x-blocks.input-field>
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>Nationality:</strong>
                            <x-blocks.input-field name="nationality" value="{{ old('nationality',$data->form_data['nationality'] ?? '') }}"></x-blocks.input-field>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong>How did the applicant obtain our
                                reference:</strong>
                            <x-blocks.input-field name="reference" value="{{ old('reference',$data->form_data['reference'] ?? '') }}"></x-blocks.input-field>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">3</span> <strong>Date of Birth of the
                                applicant:</strong>
                            <x-blocks.input-field name="dob" value="{{ old('dob',$data->form_data['dob']) }}" type="date"></x-blocks.input-field>
                        </td>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">4</span> <strong>Marital
                                Status:</strong>
                            <x-blocks.input-radio
                                name="marital_status"
                                :checked="old('marital_status',$data->form_data['marital_status'] ?? '') == 'Married'"
                                label="Married"
                                value="Married">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="marital_status"
                                :checked="old('marital_status',$data->form_data['marital_status'] ?? '') == 'Divorced'"
                                label="Divorced"
                                value="Divorced">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="marital_status"
                                :checked="old('marital_status',$data->form_data['marital_status'] ?? '') == 'Legally Separated'"
                                label="Legally Separated"
                                value="Legally Separated">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="marital_status"
                                :checked="old('marital_status',$data->form_data['marital_status'] ?? '') == 'Never Married'"
                                label="Never Married"
                                value="Never Married">
                            </x-blocks.input-radio>

                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        @if(isset($data->form_data['spouse_dob']))
                            <td class="{{ $valueClass }}">
                                <strong>Spouse's Date of Birth
                                    ?:</strong>
                                <x-blocks.input-field name="spouse_dob" value="{{ old('spouse_dob',$data->form_data['spouse_dob']) }}" type="date"></x-blocks.input-field>
                            </td>
                        @endif
                        @if(isset($data->form_data['spouse_experience']))
                            <td class="{{ $valueClass }}">
                                <strong>Spouse's Experience:</strong>
                                <x-blocks.input-radio
                                    name="spouse_experience"
                                    :checked="old('spouse_experience',$data->form_data['spouse_experience'] ?? '') == 'Work Experience as a Business person'"
                                    label="Work Experience as a Business person"
                                    value="Work Experience as a Business person">
                                </x-blocks.input-radio>
                                <x-blocks.input-radio
                                    name="spouse_experience"
                                    :checked="old('spouse_experience',$data->form_data['spouse_experience'] ?? '') == 'Work Experience as a Skilled Worker'"
                                    label="Work Experience as a Skilled Worker"
                                    value="Work Experience as a Skilled Worker">
                                </x-blocks.input-radio>
                                <x-blocks.input-radio
                                    name="spouse_experience"
                                    :checked="old('spouse_experience',$data->form_data['spouse_experience'] ?? '') == 'Not employed currently'"
                                    label="Not employed currently"
                                    value="Not employed currently">
                                </x-blocks.input-radio>
                                <x-blocks.input-radio
                                    name="spouse_experience"
                                    :checked="old('spouse_experience',$data->form_data['spouse_experience'] ?? '') == 'Never employed'"
                                    label="Never employed"
                                    value="Never employed">
                                </x-blocks.input-radio>
                                <x-blocks.input-radio
                                    name="spouse_experience"
                                    :checked="old('spouse_experience',$data->form_data['spouse_experience'] ?? '') == 'Homemaker'"
                                    label="Homemaker"
                                    value="Homemaker">
                                </x-blocks.input-radio>
                                <x-blocks.input-radio
                                    name="spouse_experience"
                                    :checked="old('spouse_experience',$data->form_data['spouse_experience'] ?? '') == 'NA'"
                                    label="NA"
                                    value="NA">
                                </x-blocks.input-radio>
                            </td>
                        @endif
                    </tr>
                    <tr class="{{ $rowClass }}">
                        @if(isset($data->form_data['no_of_children']))
                            <td class="{{ $valueClass }}">
                                <strong>No. of children:</strong>
                                <select id="no_of_children" name="no_of_children" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @for($i = 0; $i <= 10; $i++)
                                        <option value="{{$i}}" @if($i == old('no_of_children',$data->form_data['no_of_children'] ?? '')) selected @endif>{{$i}}</option>
                                @endfor
                            </td>
                        @endif
                    </tr>
                    <tr class="{{ $rowClass }}">
                        @if(isset($data->form_data['children_age']))
                            <td class="{{ $valueClass }}">
                                <strong>How old are your children?:</strong>
                                <x-blocks.input-field name="children_age" value="{{old('children_age',$data->form_data['children_age'] ?? '')}}"></x-blocks.input-field>
                            </td>
                        @endif
                    </tr>
                    <tr class="{{ $rowClass }}">
                        @if(isset($data->form_data['is_children_on_study_permit']))
                            <td class="{{ $valueClass }}">
                                <strong>Are any of your children studying in Canada at this time on a study permit?:</strong>
                                <x-blocks.input-radio
                                    name="is_children_on_study_permit"
                                    :checked="old('is_children_on_study_permit',$data->form_data['is_children_on_study_permit'] ?? '') == 'Yes'"
                                    label="Yes"
                                    value="Yes">
                                </x-blocks.input-radio>
                                <x-blocks.input-radio
                                    name="is_children_on_study_permit"
                                    :checked="old('is_children_on_study_permit',$data->form_data['is_children_on_study_permit'] ?? '') == 'No'"
                                    label="No"
                                    value="No">
                                </x-blocks.input-radio>
                            </td>
                        @endif
                    </tr>
                    @if(isset($data->form_data['children_lt_20']) || isset($data->form_data['children_enrolled']))
                        <tr class="{{ $rowClass }}">
                            @if(isset($data->form_data['children_lt_20']))
                                <td class="{{ $valueClass }}">
                                    <strong>Have children less than 22 years of
                                        age?:</strong>
                                    <x-blocks.input-radio
                                        name="children_lt_20"
                                        :checked="old('children_lt_20',$data->form_data['children_lt_20'] ?? '') == 'Yes'"
                                        label="Yes"
                                        value="Yes">
                                    </x-blocks.input-radio>
                                    <x-blocks.input-radio
                                        name="children_lt_20"
                                        :checked="old('children_lt_20',$data->form_data['children_lt_20'] ?? '') == 'No'"
                                        label="No"
                                        value="No">
                                    </x-blocks.input-radio>
                                </td>
                            @endif
                            @if(isset($data->form_data['children_enrolled']))
                                <td class="{{ $valueClass }}">
                                    <strong>Have children enrolled in accredited Canadian education institution/s and
                                        are actively pursuing academic, professional or vocational training on a
                                        full-time basis?:</strong>
                                    <x-blocks.input-radio
                                        name="children_enrolled"
                                        :checked="old('children_enrolled',$data->form_data['children_enrolled'] ?? '') == 'Yes'"
                                        label="Yes"
                                        value="Yes">
                                    </x-blocks.input-radio>
                                    <x-blocks.input-radio
                                        name="children_enrolled"
                                        :checked="old('children_enrolled',$data->form_data['children_enrolled'] ?? '') == 'No'"
                                        label="No"
                                        value="No">
                                    </x-blocks.input-radio>
                                </td>
                            @endif
                        </tr>
                    @endif
                    @if(isset($data->form_data['children_canadian']) || isset($data->form_data['spouse_children_mental']))
                        <tr class="{{ $rowClass }}">
                            @if(isset($data->form_data['children_canadian']))
                                <td class="{{ $valueClass }}">
                                    <strong>Have any of the applicant's children who are Canadian citizens or permanent
                                        residents of Canada?:</strong>
                                    <x-blocks.input-radio
                                        name="children_canadian"
                                        :checked="old('children_canadian',$data->form_data['children_canadian'] ?? '') == 'Yes'"
                                        label="Yes"
                                        value="Yes">
                                    </x-blocks.input-radio>
                                    <x-blocks.input-radio
                                        name="children_canadian"
                                        :checked="old('children_canadian',$data->form_data['children_canadian'] ?? '') == 'No'"
                                        label="No"
                                        value="No">
                                    </x-blocks.input-radio>
                                </td>
                            @endif
                            @if(isset($data->form_data['spouse_children_mental']))
                                <td class="{{ $valueClass }}">
                                    <strong>Do the applicant's spouse or their children have a physical or mental
                                        disorder that requires medical
                                        attention?:</strong>
                                    <x-blocks.input-radio
                                        name="spouse_children_mental"
                                        :checked="old('spouse_children_mental',$data->form_data['spouse_children_mental'] ?? '') == 'Yes'"
                                        label="Yes"
                                        value="Yes">
                                    </x-blocks.input-radio>
                                    <x-blocks.input-radio
                                        name="spouse_children_mental"
                                        :checked="old('spouse_children_mental',$data->form_data['spouse_children_mental'] ?? '') == 'No'"
                                        label="No"
                                        value="No">
                                    </x-blocks.input-radio>
                                </td>
                            @endif
                        </tr>
                    @endif
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">5</span> <strong>Currently in canada
                                ?:</strong>
                            <x-blocks.input-radio
                                name="in_canada"
                                :checked="old('in_canada',$data->form_data['in_canada'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="in_canada"
                                :checked="old('in_canada',$data->form_data['in_canada'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                    </tr>
                    <tr>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">6</span> <strong>Did you ever visit Canada?
                                ?:</strong>
                            <x-blocks.input-radio
                                name="Did_you_ever_visit_Canada"
                                :checked="old('Did_you_ever_visit_Canada',$data->form_data['Did_you_ever_visit_Canada'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="Did_you_ever_visit_Canada"
                                :checked="old('Did_you_ever_visit_Canada',$data->form_data['Did_you_ever_visit_Canada'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>If Yes, when
                                ?:</strong>
                            <x-blocks.input-field name="if_yes_visited_canada_when" value="{{old('if_yes_visited_canada_when',$data->form_data['if_yes_visited_canada_when'] ?? '')}}"></x-blocks.input-field>
                        </td>
                    </tr>
                    <tr>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">7</span> <strong>Is your Canadian Temporary Residence Visa or any other visa currently valid?
                                ?:</strong>
                            <x-blocks.input-radio
                                name="is_currently_have_valid_visa"
                                :checked="old('is_currently_have_valid_visa',$data->form_data['is_currently_have_valid_visa'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="is_currently_have_valid_visa"
                                :checked="old('is_currently_have_valid_visa',$data->form_data['is_currently_have_valid_visa'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>If yes, till when
                                ?:</strong>
                            <x-blocks.input-field name="your_current_visa_validity" value="{{old('your_current_visa_validity',$data->form_data['your_current_visa_validity'] ?? '')}}"></x-blocks.input-field>
                        </td>
                    </tr>
                    @if(isset($data->form_data['area_of_business']))
                        <tr class="{{ $rowClass }}">
                            <td class="{{ $valueClass }}">
                                <span class="bg-gray-900 text-white px-2">8</span> <strong>Area of business or
                                    management experience acquired in past 10 years:</strong>
                                <x-blocks.input-checkbox
                                    name="area_of_business"
                                    :checked="old('area_of_business',$data->form_data['area_of_business'] ?? '') == 'Manufacturing / trading'"
                                    label="Manufacturing / trading"
                                    value="Manufacturing / trading">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="area_of_business"
                                    :checked="old('area_of_business',$data->form_data['area_of_business'] ?? '') == 'Only trading / Import / Export'"
                                    label="Only trading / Import / Export"
                                    value="Only trading / Import / Export">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="area_of_business"
                                    :checked="old('area_of_business',$data->form_data['area_of_business'] ?? '') == 'Project work (builder / Construction etc)'"
                                    label="Project work (builder / Construction etc)"
                                    value="Project work (builder / Construction etc)">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="area_of_business"
                                    :checked="old('area_of_business',$data->form_data['area_of_business'] ?? '') == 'Wholesale / Retail establishment'"
                                    label="Wholesale / Retail establishment"
                                    value="Wholesale / Retail establishment">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="area_of_business"
                                    :checked="old('area_of_business',$data->form_data['area_of_business'] ?? '') == 'Information Technology'"
                                    label="Information Technology"
                                    value="Information Technology">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="area_of_business"
                                    :checked="old('area_of_business',$data->form_data['area_of_business'] ?? '') == 'Consulting'"
                                    label="Consulting"
                                    value="Consulting">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="area_of_business"
                                    :checked="old('area_of_business',$data->form_data['area_of_business'] ?? '') == 'Other'"
                                    label="Other"
                                    value="Other">
                                </x-blocks.input-checkbox>
                            </td>
                            <td class="{{ $valueClass }}">
                                <strong>Product / Commodity description that the applicant deals in/her business
                                    :</strong>
                                <x-blocks.input-field name="product_description" value="{{old('your_current_visa_validity',$data->form_data['product_description'] ?? '')}}"></x-blocks.input-field>
                            </td>
                        </tr>
                    @endif
                    @if(isset($data->form_data['apply_same']))
                        <tr class="{{ $rowClass }}">
                            <td class="{{ $valueClass }}">
                                <strong>Will the applicant consider two
                                    applicants to apply under the entrepreneur stream in the same
                                    application?:</strong>
                                <x-blocks.input-radio
                                    name="apply_same"
                                    :checked="old('apply_same',$data->form_data['apply_same'] ?? '') == 'Yes'"
                                    label="Yes"
                                    value="Yes">
                                </x-blocks.input-radio>
                                <x-blocks.input-radio
                                    name="apply_same"
                                    :checked="old('apply_same',$data->form_data['apply_same'] ?? '') == 'No'"
                                    label="No"
                                    value="No">
                                </x-blocks.input-radio>
                            </td>
                        </tr>
                    @endif
                    @if(isset($data->form_data['website_address']))
                        <tr>
                            <td class="{{ $valueClass }}">
                                <span class="bg-gray-900 text-white px-2">9</span> <strong>Business website address:</strong>
                                <x-blocks.input-field name="website_address" value="{{old('website_address',$data->form_data['website_address'] ?? '')}}"></x-blocks.input-field>
                            </td>
                        </tr>
                    @endif
                    <tr class="{{ $rowClass }}">
                        @if(isset($data->form_data['intend_to_open_branch']))
                            <td class="{{ $valueClass }}">
                                <strong>Do you intend to open a branch / subsidiary office of your existing business in Canada and would you or key personnel from your office transfer to Canada under the Intra Company Transfer (ICT) program:</strong>
                                <x-blocks.input-radio
                                    name="intend_to_open_branch"
                                    :checked="old('intend_to_open_branch',$data->form_data['intend_to_open_branch'] ?? '') == 'Yes'"
                                    label="Yes"
                                    value="Yes">
                                </x-blocks.input-radio>
                                <x-blocks.input-radio
                                    name="intend_to_open_branch"
                                    :checked="old('intend_to_open_branch',$data->form_data['intend_to_open_branch'] ?? '') == 'No'"
                                    label="No"
                                    value="No">
                                </x-blocks.input-radio>
                            </td>
                        @endif
                        @if(isset($data->form_data['']))
                            <td class="{{ $valueClass }}">
                                <strong>If yes, how many people are employed in your business outside Canada?
                                    :</strong>
                                <x-blocks.input-field name="how_many_employed" value="{{old('how_many_employed',$data->form_data['how_many_employed'] ?? '')}}"></x-blocks.input-field>
                            </td>
                        @endif
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">10</span> <strong>Educational
                                Qualification:</strong>
                            <x-blocks.input-radio
                                name="qualification"
                                :checked="old('qualification',$data->form_data['qualification'] ?? '') == 'Post graduate'"
                                label="Post graduate"
                                value="Post graduate">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="qualification"
                                :checked="old('qualification',$data->form_data['qualification'] ?? '') == 'Bachelors degree (15 years of education)'"
                                label="Bachelors degree (15 years of education)"
                                value="Bachelors degree (15 years of education)">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="qualification"
                                :checked="old('qualification',$data->form_data['qualification'] ?? '') == 'Did not complete Bachelors degree'"
                                label="Did not complete Bachelors degree"
                                value="Did not complete Bachelors degree">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="qualification"
                                :checked="old('qualification',$data->form_data['qualification'] ?? '') == 'Grade 12 education with at least one year diploma / certificate'"
                                label="Grade 12 education with at least one year diploma / certificate"
                                value="Grade 12 education with at least one year diploma / certificate">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="qualification"
                                :checked="old('qualification',$data->form_data['qualification'] ?? '') == 'Grade 12 (Secondary school) completed'"
                                label="Grade 12 (Secondary school) completed"
                                value="Grade 12 (Secondary school) completed">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="qualification"
                                :checked="old('qualification',$data->form_data['qualification'] ?? '') == 'Grade 10 completed'"
                                label="Grade 10 completed"
                                value="Grade 10 completed">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="qualification"
                                :checked="old('qualification',$data->form_data['qualification'] ?? '') == 'Grade 10 not completed'"
                                label="Grade 10 not completed"
                                value="Grade 10 not completed">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="qualification"
                                :checked="old('qualification',$data->form_data['qualification'] ?? '') == 'Other'"
                                label="Other"
                                value="Other">
                            </x-blocks.input-radio>
                        </td>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">11</span> <strong>Do you have your educational documents to prove your education identified above?
                                :</strong>
                            <x-blocks.input-radio
                                name="have_your_educational_documents_to_prove"
                                :checked="old('have_your_educational_documents_to_prove',$data->form_data['have_your_educational_documents_to_prove'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="have_your_educational_documents_to_prove"
                                :checked="old('have_your_educational_documents_to_prove',$data->form_data['have_your_educational_documents_to_prove'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">12</span> <strong>Ordered to leave Canada or any
                                other country?:</strong>
                            <x-blocks.input-radio
                                name="leave_canada"
                                :checked="old('leave_canada',$data->form_data['leave_canada'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="leave_canada"
                                :checked="old('leave_canada',$data->form_data['leave_canada'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">13</span> <strong>Arrested for, or been charged
                                with any offense in any country, including driving under the influence of alcohol or
                                drugs?:</strong>
                            <x-blocks.input-radio
                                name="arrested"
                                :checked="old('arrested',$data->form_data['arrested'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="arrested"
                                :checked="old('arrested',$data->form_data['arrested'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">14</span> <strong>Been in the military (including
                                mandatory service), a militia, or a civil defense unit or the
                                police?:</strong>
                            <x-blocks.input-radio
                                name="in_military"
                                :checked="old('in_military',$data->form_data['in_military'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="in_military"
                                :checked="old('in_military',$data->form_data['in_military'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">15</span> <strong>Been employed by a government in
                                a security-related
                                capacity?:</strong>
                            <x-blocks.input-radio
                                name="employed_in_security"
                                :checked="old('employed_in_security',$data->form_data['employed_in_security'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="employed_in_security"
                                :checked="old('employed_in_security',$data->form_data['employed_in_security'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">16</span> <strong>Visited other countries within
                                the last 10 years?:</strong>
                            <x-blocks.input-radio
                                name="visited_in_10_years"
                                :checked="old('visited_in_10_years',$data->form_data['visited_in_10_years'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="visited_in_10_years"
                                :checked="old('visited_in_10_years',$data->form_data['visited_in_10_years'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong>Visited Countries:</strong>
                            <x-blocks.input-field name="visited_countries" value="{{old('visited_countries',$data->form_data['visited_countries'] ?? '')}}"></x-blocks.input-field>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">17</span> <strong> Applicant or spouse have blood
                                relatives in Canada?:</strong>
                            <x-blocks.input-radio
                                name="spouse_have_relatives"
                                :checked="old('spouse_have_relatives',$data->form_data['spouse_have_relatives'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="spouse_have_relatives"
                                :checked="old('spouse_have_relatives',$data->form_data['spouse_have_relatives'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                        @if(isset($data->form_data['spouse_relative_state']))
                            <td class="{{ $valueClass }}">
                                <strong>If Yes, Province(s) they are in:</strong>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('British Columbia', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="British Columbia"
                                    value="British Columbia">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('Alberta', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="Alberta"
                                    value="Alberta">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('Saskatchewan', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="Saskatchewan"
                                    value="Saskatchewan">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('Manitoba', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="Manitoba"
                                    value="Manitoba">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('Ontario', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="Ontario"
                                    value="Ontario">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('Quebec', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="Quebec"
                                    value="Quebec">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('Nova Scotia', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="Nova Scotia"
                                    value="Nova Scotia">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('New Brunswick', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="New Brunswick"
                                    value="New Brunswick">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('Prince Edward Island', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="Prince Edward Island"
                                    value="Prince Edward Island">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('Newfoundland', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="Newfoundland &amp; Labrador"
                                    value="Newfoundland">
                                </x-blocks.input-checkbox>
                                <x-blocks.input-checkbox
                                    name="spouse_relative_state"
                                    :checked="in_array('My spouse or myself do not have any blood relatives residing in Canada', old('spouse_relative_state',$data->form_data['spouse_relative_state']))"
                                    label="My spouse or myself do not have any blood relatives residing in Canada"
                                    value="My spouse or myself do not have any blood relatives residing in Canada">
                                </x-blocks.input-checkbox>
                            </td>
                        @endif
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">18</span> <strong> Ever visited
                                Canada?:</strong>
                            <x-blocks.input-radio
                                name="visited_canada"
                                :checked="old('visited_canada',$data->form_data['visited_canada'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="visited_canada"
                                :checked="old('visited_canada',$data->form_data['visited_canada'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                    </tr>
                    @if(isset($data->form_data['visited_in_2']) || isset($data->form_data['provinces_visited']))
                        <tr class="{{ $rowClass }}">
                            <td class="{{ $valueClass }}">
                                Visited Canada in last 2 years?:</strong>
                                <x-blocks.input-radio
                                    name="visited_in_2"
                                    :checked="old('visited_in_2',$data->form_data['visited_in_2'] ?? '') == 'Yes'"
                                    label="Yes"
                                    value="Yes">
                                </x-blocks.input-radio>
                                <x-blocks.input-radio
                                    name="visited_in_2"
                                    :checked="old('visited_in_2',$data->form_data['visited_in_2'] ?? '') == 'No'"
                                    label="No"
                                    value="No">
                                </x-blocks.input-radio>
                            </td>
                            @if(isset($data->form_data['provinces_visited']))
                                <td class="{{ $valueClass }}">
                                    <strong>If Yes, Province(s) visited:</strong>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('British Columbia', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="British Columbia"
                                        value="British Columbia">
                                    </x-blocks.input-checkbox>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('Alberta', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="Alberta"
                                        value="Alberta">
                                    </x-blocks.input-checkbox>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('Saskatchewan', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="Saskatchewan"
                                        value="Saskatchewan">
                                    </x-blocks.input-checkbox>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('Manitoba', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="Manitoba"
                                        value="Manitoba">
                                    </x-blocks.input-checkbox>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('Ontario', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="Ontario"
                                        value="Ontario">
                                    </x-blocks.input-checkbox>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('Quebec', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="Quebec"
                                        value="Quebec">
                                    </x-blocks.input-checkbox>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('Nova Scotia', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="Nova Scotia"
                                        value="Nova Scotia">
                                    </x-blocks.input-checkbox>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('New Brunswick', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="New Brunswick"
                                        value="New Brunswick">
                                    </x-blocks.input-checkbox>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('Prince Edward Island', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="Prince Edward Island"
                                        value="Prince Edward Island">
                                    </x-blocks.input-checkbox>
                                    <x-blocks.input-checkbox
                                        name="provinces_visited"
                                        :checked="in_array('Newfoundland', old('provinces_visited',$data->form_data['provinces_visited']))"
                                        label="Newfoundland &amp; Labrador"
                                        value="Newfoundland">
                                    </x-blocks.input-checkbox>
                                </td>
                            @endif
                        </tr>
                    @endif
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">19</span> <strong> Visa to Canada ever been
                                refused?:</strong>
                            <x-blocks.input-radio
                                name="visa_refused"
                                :checked="old('visa_refused',$data->form_data['visa_refused'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="visa_refused"
                                :checked="old('visa_refused',$data->form_data['visa_refused'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                        <td class="{{ $valueClass }}">
                            Visa refused details:</strong>
                            <x-blocks.input-field name="visa_refused_details" value="{{old('visa_refused_details',$data->form_data['visa_refused_details'] ?? '')}}"></x-blocks.input-field>
                        </td>
                    </tr>
                    <tr>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">20</span> <strong> Total assets between applicant
                                and spouse:</strong>
                            <x-blocks.input-field name="assets" value="{{old('assets',$data->form_data['assets'] ?? '')}}"></x-blocks.input-field>
                        </td>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">21</span> <strong>Funds Available to invest in
                                canada:</strong>
                            <x-blocks.input-field name="funds_available" value="{{old('funds_available',$data->form_data['funds_available'] ?? '')}}"></x-blocks.input-field>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">22</span> <strong> Taken English proficiency test
                                (IELTS or CELPIP) ?:</strong>
                            <x-blocks.input-radio
                                name="taken_english_test"
                                :checked="old('taken_english_test',$data->form_data['taken_english_test'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="taken_english_test"
                                :checked="old('taken_english_test',$data->form_data['taken_english_test'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                            @if(isset($data->form_data['taken_english_test']) && $data->form_data['taken_english_test'] == 'Yes')
                                <p>Scores:</p>
                                <ul>
                                    <li>Reading: <x-blocks.input-field name="reading" value="{{old('reading',$data->form_data['reading'] ?? '')}}"></x-blocks.input-field></li>
                                    <li>Speaking: <x-blocks.input-field name="speaking" value="{{old('speaking',$data->form_data['speaking'] ?? '')}}"></x-blocks.input-field></li>
                                    <li>Writing: <x-blocks.input-field name="writing" value="{{old('writing',$data->form_data['writing'] ?? '')}}"></x-blocks.input-field></li>
                                    <li>Listening:<x-blocks.input-field name="listening" value="{{old('listening',$data->form_data['listening'] ?? '')}}"></x-blocks.input-field></li>
                                </ul>
                            @endif
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong> English Language
                                Proficiency:</strong> {{ $data->form_data['language_proficiency'] ?? '' }}
                            <x-blocks.input-field name="language_proficiency" value="{{old('language_proficiency',$data->form_data['language_proficiency'] ?? '')}}"></x-blocks.input-field>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <strong> Planning to relocate / start the immigration
                                process:</strong> {{ $data->form_data['planning_to_start'] ?? '' }}
                            <x-blocks.input-field name="planning_to_start" value="{{old('planning_to_start',$data->form_data['planning_to_start'] ?? '')}}"></x-blocks.input-field>
                        </td>
                        <td class="{{ $valueClass }}">
                            <strong> Intend to move to Canada
                                in:</strong>
                            <x-blocks.input-field name="intend_to_move" value="{{old('intend_to_move',$data->form_data['intend_to_move'] ?? '')}}"></x-blocks.input-field>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">23</span> <strong> Have you obtained an official assessment of your education by applying for an Education Credentials Assessment (ECA)?
                                :</strong> {{ $data->form_data['have_you_obtained_educational_credentials_assessment'] ?? '' }}
                            <x-blocks.input-radio
                                name="have_you_obtained_educational_credentials_assessment"
                                :checked="old('have_you_obtained_educational_credentials_assessment',$data->form_data['have_you_obtained_educational_credentials_assessment'] ?? '') == 'Yes'"
                                label="Yes"
                                value="Yes">
                            </x-blocks.input-radio>
                            <x-blocks.input-radio
                                name="have_you_obtained_educational_credentials_assessment"
                                :checked="old('have_you_obtained_educational_credentials_assessment',$data->form_data['have_you_obtained_educational_credentials_assessment'] ?? '') == 'No'"
                                label="No"
                                value="No">
                            </x-blocks.input-radio>
                        </td>
                    </tr>
                    <tr class="{{ $rowClass }}">
                        <td class="{{ $valueClass }}">
                            Queries:</strong> {{ $data->form_data['queries'] ?? '' }}
                            <x-blocks.input-field name="queries" value="{{old('queries',$data->form_data['queries'] ?? '')}}"></x-blocks.input-field>
                        </td>
                        <td class="{{ $valueClass }}">
                            <span class="bg-gray-900 text-white px-2">24</span> <strong> Interests:</strong>
                            <ul>
                                @if(isset($data->form_data['interests']))
                                    @foreach($data->form_data['interests'] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
                @role('super_admin')
                </form>
                @endrole
            </div>
        </div>
    </div>
</x-layouts.admin>
