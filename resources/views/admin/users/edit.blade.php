<x-layouts.admin :title="$title" :breadcrumbs="$breadcrumbs">
    <x-blocks.card>
        <form action="{{route('admin.users.update',$user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex items-center flex-col">
                <div class="p-6 space-y-6 w-1/2">
                    @if($errors->any())
                        <x-blocks.alert type="danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </x-blocks.alert>
                    @endif
                    <x-blocks.input-field type="text" label="Name" name="name" value="{{old('name',$user->name)}}"></x-blocks.input-field>
                    <x-blocks.input-field type="email" label="Email" name="email" value="{{old('email',$user->email)}}"></x-blocks.input-field>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Role</label>
                    <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="admin" @if(old('role',$user->roles[0]['name']) == 'admin') selected @endif>admin</option>
                        <option value="super_admin" @if(old('role',$user->roles[0]['name']) == 'super_admin') selected @endif>super_admin</option>
                    </select>
                </div>
                <!-- Modal footer -->
                <div class=" w-1/2 p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </div>
        </form>
    </x-blocks.card>
    <x-blocks.card class="mt-0.5">
        <form action="{{route('admin.users.change-password',$user->id)}}" method="POST">
            @csrf
            <div class="flex items-center flex-col">
                <div class="p-6 space-y-6 w-1/2">
                    <div class="text-center">Change Password</div>
                    <x-blocks.input-password-field type="password" label="New Password" name="password" required></x-blocks.input-password-field>
                </div>
                <!-- Modal footer -->
                <div class=" w-1/2 p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change Password</button>
                </div>
            </div>
        </form>
    </x-blocks.card>
</x-layouts.admin>
