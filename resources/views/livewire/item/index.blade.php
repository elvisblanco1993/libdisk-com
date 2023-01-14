<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <h1 class="text-2xl font-extrabold">{{ __("Items") }}</h1>
            {{-- Shelves list section --}}
            <div class="text-xs uppercase">
                @foreach ($shelves as $shelf)
                    <a href="{{ route('shelf.show', ['shelf' => $shelf->id]) }}" class="inline-block mr-2 my-1 px-2 py-1 text-slate-500 font-medium tracking-wider bg-slate-50 rounded-full border border-slate-100 hover:bg-indigo-50 hover:border-indigo-100 hover:text-indigo-500 transition-all">{{ $shelf->name }}</a>
                @endforeach
            </div>

            <div class="grid grid-cols-12 gap-4">
                @forelse ($items as $item)
                    <div class="col-span-3 border text-center hover:shadow">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/81bvX0Y6aBL._AC_UL254_SR254,254_.jpg" alt="" class="w-full">
                        <a href="#" class="inline-block mt-4 text-xs mx-4 text-center flex-nowrap overflow-hidden">The title of the book goes in here</a>
                        <a href="#" class="inline-block my-2 text-xs px-2 py-0.5 bg-slate-100 border border-slate-300 rounded">collection name</a>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        <div class="mt-6">
            {{ $items->links() }}
        </div>
    </div>
</div>
