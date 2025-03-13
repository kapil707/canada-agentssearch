<x-layouts.admin :title="$title" :breadcrumbs="$breadcrumbs">
    <x-blocks.card>
        <div class="text-xl mb-4"><span class="font-bold">Email: </span>{{$data->email}}</div>
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
            <form method="POST" action="{{route('admin.profile.change-password')}}">
                @csrf
                <div class="text-xl font-bold mb-4">Change Password</div>
                <div class="grid grid-cols-1 md:max-w-4xl">
                    <x-blocks.input-password-field label="Current Password" name="current_password"></x-blocks.input-password-field>
                    <x-blocks.input-password-field label="New Password" name="password"></x-blocks.input-password-field>
                    <x-blocks.input-password-field label="Confirm Password" name="password_confirmation"></x-blocks.input-password-field>
                </div>
                <x-blocks.button label="Update" type="submit"></x-blocks.button>
            </form>
        </x-blocks.card>
    </x-blocks.card>
</x-layouts.admin>
