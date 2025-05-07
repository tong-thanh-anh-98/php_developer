<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
            <a href="{{ route('articles.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">
                Create
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert />
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left" width="60">#</th>
                        <th class="px-6 py-3 text-left">Title</th>
                        <th class="px-6 py-3 text-left" width="180">Content</th>
                        <th class="px-6 py-3 text-left" width="180">Author</th>
                        <th class="px-6 py-3 text-center" width="180">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($articles->isNotEmpty())
                        @foreach ($articles as $article)
                            <tr class="border-b">
                                <td class="px-6 py-3 text-left">{{ $article->id }}</td>
                                <td class="px-6 py-3 text-left">{{ $article->title }}</td>
                                <td class="px-6 py-3 text-left">{{ $article->text }}</td>
                                <td class="px-6 py-3 text-left">{{ $article->author }}</td>
                                <td class="px-6 py-3 text-center">
                                    <a href="#" class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md text-white px-3 py-2 me-1">
                                        Edit
                                    </a>
                                    <a href="#" class="bg-red-600 hover:bg-red-500 text-sm rounded-md text-white px-3 py-2">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="my-3">
                {{ $articles->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
