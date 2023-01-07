<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('artikels.create') }}" class="bg-green-500 hove:bg-green-700 font-bold text-white py-2 px-4 rounded">
                    + Create Artikel 
                </a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">Title</th>
                        <th class="border px-6 py-4">Content</th>
                        <th class="border px-6 py-4">Picture</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($artikel as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $item->title }}</td>
                                <td class="border px-6 py-4">{{ $item->content }}</td>
                                <td class="border px-6 py-4 ">{{ $item->profile_photo_path }}</td>
                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('artikels.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('artikels.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="6" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $artikel->links() }}
            </div>
        </div>
    </div>
</x-app-layout>