<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users / Create') }}
            </h2>
            <a href="{{ route('users.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name') }}" name="name" type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter name">
                                <x-error-message field="name" />
                            </div>

                            <label for="" class="text-lg font-medium">Email</label>
                            <div class="my-3">
                                <input value="{{ old('email') }}" name="email" type="email"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter email">
                                <x-error-message field="email" />
                            </div>

                            <label for="" class="text-lg font-medium">Password</label>
                            <div class="my-3">
                                <input value="{{ old('password') }}" name="password" type="password"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter password">
                                <x-error-message field="password" />
                            </div>

                            <label for="" class="text-lg font-medium">Confirm Password</label>
                            <div class="my-3">
                                <input value="{{ old('confirm_password') }}" name="confirm_password" type="password"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Please confirm password">
                                <x-error-message field="confirm_password" />
                            </div>

                            <div class="gird gird-cols-4 mb-3">
                                @if ($roles->isNotEmpty())
                                    @foreach ($roles as $role)
                                        <div class="mt-3">
                                            {{-- {{ $hasRoles->contains($role->id) ? 'checked' : '' }}  --}}
                                            {{-- <input type="checkbox" id="role-{{ $role->id }}" class="rounded"
                                                name="role[]" value="{{ $role->name }}"> --}}
                                            <input type="checkbox" name="role[]" value="{{ $role->id }}"
                                                {{ in_array($role->id, old('role', [])) ? 'checked' : '' }}>
                                            <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <button
                                class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md text-white px-5 py-3">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
