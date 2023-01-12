<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-extrabold">{{ __("Shelves") }}</h1>
            @can('shelf.create')
                <a href="{{ route('admin.shelf.create') }}" class="btn-link">{{ __("New Shelf") }}</a>
            @endcan
        </div>

        <div class="my-10">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">#</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Mode</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Visibility</th>
                                        <th scope="col" class="px-6 py-4">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($shelfs as $shelf)
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $shelf->id }}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $shelf->name }}</td>
                                            <td class="text-gray-900 font-light px-6 py-4 whitespace-nowrap text-xs uppercase tracking-wider">
                                                @if ($shelf->is_private)
                                                    Private
                                                @else

                                                @endif
                                            </td>
                                            <td class="text-gray-900 font-light px-6 py-4 whitespace-nowrap text-xs uppercase tracking-wider">
                                                @if ($shelf->is_hidden)
                                                    Hidden
                                                @else
                                                    Visible
                                                @endif
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('admin.shelf.edit', ['shelf' => $shelf]) }}" class="">{{ __("Edit") }}</a>
                                                @livewire('shelf.delete', ['shelf' => $shelf], key('delete-shelf-' . $shelf->id))
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
