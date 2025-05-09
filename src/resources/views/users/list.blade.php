<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users ') }}
            </h2>
            @can('create users')
                <a href="{{ route('users.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">
                    Create
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert />
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left" width="60">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Roles</th>
                        <th class="px-6 py-3 text-left" width="180">Created</th>
                        <th class="px-6 py-3 text-center" width="180">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($users->isNotEmpty())
                        @foreach ($users as $user)
                            <tr class="border-b">
                                <td class="px-6 py-3 text-left">{{ $user->id }}</td>
                                <td class="px-6 py-3 text-left">{{ $user->name }}</td>
                                <td class="px-6 py-3 text-left">{{ $user->email }}</td>
                                <td class="px-6 py-3 text-left">{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-left">{{ $user->created_at->format('d M, Y') }}</td>
                                <td class="px-6 py-3 text-center">
                                    @can('edit users')
                                        <a href="{{ route('users.edit', $user->id) }}" class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md text-white px-3 py-2" style="float: left; margin-right: 8px;">
                                            Edit
                                        </a>
                                    @endcan
                                    @can('delete users')
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-700 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm rounded-md text-white px-3 py-2" style="float: left;">Delete</button>
                                        </form>
                                    @endcan
                                    {{-- <a href="javascript:void(0);" onclick="deleteUser({{ $user->id }})" class="bg-red-600 hover:bg-red-500 text-sm rounded-md text-white px-3 py-2">
                                        Delete
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="my-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    {{-- <x-slot name="script">
        <script type="text/javascript">
            function deleteUser(id) {
                if (confirm("Are you sure want to delete?")) {
                    $.ajax({
                        url: '/roles/' + id, // RESTful URL
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            window.location.href = '{{ route("users.list") }}';
                        },
                        error: function(xhr) {
                            alert('Delete failed. Please try again.');
                        }
                    });
                }
            }
        </script>
    </x-slot> --}}

</x-app-layout>
