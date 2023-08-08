<div>
    <div class="sm:w-full sm:px-16">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <div class="mt-8" wire:poll>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 md:w-full" id="friends">
                    @if (!empty($team))
                        @foreach ($team as $trackedTZ)
                            <x-timezone :tz="$trackedTZ" key="{{$trackedTZ->id}}"></x-timezone>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Add User--}}
            <div class="mt-8 flex justify-center sm:items-center sm:justify-between">
                <a href="{{route('create')}}"
                   type="button"
                   class="scale-100 p-4 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/>
                    </svg>
                </a>
            </div>

            <div class="flex justify-center mt-8 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        TimeCode 2023
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($memberToDelete))
        {{-- Modal--}}
        <div>
            <div class="absolute inset-0 bg-black/70"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center w-full">
                <div class="text-gray-100 dark:gray-900 mb-8">
                    <div>Are you sure you</div>
                    <div>want to remove:</div>
                    <div class="text-bold">{{$memberToDelete->name}}</div>
                </div>
                <div class="space-x-4">
                    <button wire:click="deleteMember({{$memberToDelete}})"
                            class="
                    cursor-pointer scale-100 p-4 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500 text-red-500 font-extrabold">
                        <div>Remove</div>
                    </button>
                    <button wire:click="cancel"
                            class="
                    cursor-pointer scale-100 p-4 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500 text-gray-900 dark:text-gray-100">
                        <div>Cancel</div>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <script>
        let friends = document.getElementById('friends');
        let sortable = Sortable.create(friends, {
                dataIdAttr: 'data-id',
                handle: '.handle',
                animation: 300,
                store: {
                    set: function (sortable) {
                        let order = sortable.toArray();

                        // Do not mess with this.  Leave it as an array
                        // of a single string; Livewire only received
                        // the first array value if it isn't done this way.
                        // I don't know why, it just is.
                        order = [order.join('|')];

                        window.Livewire.dispatch('updateOrder', order);
                    }
                }
            }
        );
    </script>
</div>
