<x-layouts.admin :title="$title" :breadcrumbs="$breadcrumbs">
    <x-blocks.card>
        <div id="accordion-open" data-accordion="open" x-data="assessment">
            <x-blocks.accordion heading-id="home-heading" body-id="home-body" title="Form Settings" heading-class="">
                <div class="flex justify-between items-center">
                    <p class="font-bold">Assessment Options</p>
                    <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            @click="showModal"
                    >Add Option</button>
                </div>
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-right">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assessment_options as $index => $option)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$option}}
                            </th>
                            <td class="py-4 px-6 justify-end flex">
                                <div class="text-blue-600 cursor-pointer" @click="edit('{{$option}}',{{$index}})">Edit</div>
                                <div class="text-red-600 cursor-pointer ml-3" @click="deleteFn({{$index}})">Delete</div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </x-blocks.accordion>
            <div aria-hidden="true"
                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full"
                 id="assessment-modal"
                 tabindex="-1">
                <div class="relative p-4 w-4/12 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                @click="hideModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white" x-text="title"></h3>
                            <form class="space-y-6">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                    <input type="text" x-model="name" name="name" id="assesment-option-name"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                           required>
                                    <template x-if="errors.name">
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500" x-text="errors.name"></p>
                                    </template>
                                </div>
                                <button type="button"
                                        x-on:click="submitFn"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-blocks.card>
    <div id="settings-loader" class="hidden fixed z-50 top-0 bottom-0 left-0 right-0" style="background-color: rgba(0,0,0,0.5)"></div>
</x-layouts.admin>
<script>

    document.addEventListener('alpine:init', () => {
        Alpine.data('assessment', () => ({
            init() {
                this.modal = new Modal(document.getElementById('assessment-modal'));
            },
            name: '',
            title: '',
            editMode: false,
            editIndex: 0,
            errors: {
                name: ''
            },
            modal: null,
            showModal(e,title = 'Add new assessment option') {
                this.modal.show()
                this.title = title
                document.querySelectorAll('[modal-backdrop]').forEach(el => {
                    el.classList.remove('hidden');
                });
            },
            hideModal() {
                this.editMode = false
                this.modal.hide()
                document.querySelectorAll('[modal-backdrop]').forEach(el => {
                    el.classList.add('hidden');
                });
            },
            async submitFn()  {
                let loader = document.getElementById('settings-loader');
                loader.classList.remove('hidden')
                try {
                    this.errors.name = '';
                    const res = await axios.post("{{route('admin.settings.assessment-options')}}", {
                        name: this.name,
                        is_edit: this.editMode,
                        edit_index: this.editIndex
                    })
                    if(res.data.message === 'success') {
                        window.location.reload()
                    }
                } catch (e) {
                    console.log(e.response.data)
                    if(e.response.data.errors.name) {
                        this.errors.name = e.response.data.errors.name[0]
                    }
                }
                loader.classList.add('hidden')
            },
            edit(name, index) {
                this.editMode = true;
                this.editIndex = index;
                this.name = name;
                this.showModal(null,'Edit assessment Option');
            },
            async deleteFn(index) {
                let cnf = confirm("Do you want to delete?");
                if(cnf) {
                    try {
                        let loader = document.getElementById('settings-loader');
                        loader.classList.remove('hidden')
                        const data = await axios.post('{{route('admin.settings.assessment-options.delete')}}', {
                            index: index
                        })
                        if(data.data.message === 'success') {
                            window.location.reload()
                        }
                    } catch (e) {
                        console.log(e)
                    }
                    loader.classList.add('hidden')
                }
            }
        }));
    });
</script>
