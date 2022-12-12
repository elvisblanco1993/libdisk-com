<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-extrabold">{{ __("New Shelf") }}</h1>
            <a href="{{ route('admin.shelf.index') }}" class="w-8 h-8 flex items-center justify-center rounded-md border border-slate-100 hover:border-slate-200 bg-slate-50 hover:bg-slate-100 text-slate-500 hover:text-slate-800 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        <div class="my-10">
            <form wire:submit.prevent="save" method="post" class="max-w-2xl mx-auto">
                <div class="">
                    <x-jet-label for="name" value="Shelf Name *" />
                    <x-jet-input type="text" id="name" wire:model="name" class="mt-1 w-full " />
                    <x-jet-input-error for="name"/>
                </div>
                <div class="mt-6">
                    <x-jet-label for="logo" value="Logo *" />
                    <div class="mt-1 w-full border border-dashed border-slate-300 rounded-md px-3 py-2 flex items-center justify-between">
                        <div class="flex items-center">
                            @if ($logo)
                                <img src="{{ $logo->temporaryUrl() }}" alt="" class="flex-none w-16 h-16 object-center object-cover rounded-md">
                            @else
                                <div class="flex-none w-16 h-16 bg-slate-100 text-slate-400 rounded-md flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="text-sm text-slate-600 mx-4">
                                <p>{{ __("Upload an image to be displayed as your shelve's logo.") }}</p>
                                <p>{{ __("WEBP, PNG or JPEG (res. 500x500px)") }}</p>
                            </div>
                        </div>
                        <label for="logo" class="px-5 py-2 rounded-full border border-indigo-100 text-sm font-medium cursor-pointer text-indigo-600 hover:border-indigo-400 hover:text-indigo-800 transition-all">
                            <span>{{__("Upload")}}</span>
                            <input type="file" wire:model="logo" accept=".webp,.jpeg,.png" id="logo" class="sr-only">
                        </label>
                    </div>
                    <x-jet-input-error for="logo"/>
                </div>
                <div class="mt-6">
                    <x-jet-label for="description" value="Description" />
                    <textarea id="description" cols="30" rows="6" wire:model="description"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full "></textarea>
                    <x-jet-input-error for="description"/>
                </div>
                <div class="mt-6">
                    <x-jet-label for="copyright" value="Copyright text" />
                    <textarea id="copyright" cols="30" rows="6" wire:model="copyright"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 w-full "></textarea>
                    <x-jet-input-error for="copyright"/>
                </div>
                <div class="mt-6">
                    <label for="is_private" class="font-medium text-sm text-gray-700 flex items-center space-x-2">
                        <x-jet-input type="checkbox" id="is_private" wire:model="is_private"/>
                        <span>Make private</span>
                    </label>
                    <p class="mt-1 text-sm text-slate-600 px-3 py-2 border rounded-md flex items-center"><span class="mr-2 text-2xl text-indigo-600">&#9432;</span>Enabling this option will make this shelf visible only to members with an account.</p>
                </div>
                <div class="mt-6">
                    <label for="is_hidden" class="font-medium text-sm text-gray-700 flex items-center space-x-2">
                        <x-jet-input type="checkbox" id="is_hidden" wire:model="is_hidden"/>
                        <span>Hide</span>
                    </label>
                    <p class="mt-1 text-sm text-slate-600 px-3 py-2 border rounded-md flex items-center"><span class="mr-2 text-2xl text-indigo-600">&#9432;</span>Enabling this option will completely hide the shelf from all users.</p>
                </div>
                <div class="mt-6 flex justify-end">
                    <x-jet-button type="submit">{{ __("Create shelf") }}</x-jet-button>
                </div>
            </form>
        </div>
    </div>
</div>
