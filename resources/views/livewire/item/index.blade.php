<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-extrabold">{{ __("Latest additions") }}</h1>
        <div class="py-6"></div>
        <div class="grid grid-cols-12 gap-4">
            @forelse ($latestAdditions as $latestItem)
                <div class="col-span-2 border text-center">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/81bvX0Y6aBL._AC_UL254_SR254,254_.jpg" alt="">
                    <p class="mt-2 text-xs mx-4 text-center flex-nowrap overflow-hidden">The title of the book goes in here</p>
                    <a href="#" class="inline-block my-2 text-xs px-2 py-0.5 bg-slate-100 border border-slate-300 rounded">collection name</a>
                </div>
            @empty
                <div class="col-span-2 border text-center hover:shadow">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/81bvX0Y6aBL._AC_UL254_SR254,254_.jpg" alt="">
                    <a href="#" class="inline-block mt-2 text-xs mx-4 text-center flex-nowrap overflow-hidden">The title of the book goes in here</a>
                    <a href="#" class="inline-block my-2 text-xs px-2 py-0.5 bg-slate-100 border border-slate-300 rounded">collection name</a>
                </div>
            @endforelse
        </div>
    </div>
</div>
