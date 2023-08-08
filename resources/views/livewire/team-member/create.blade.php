<div class="p-8">
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-xl font-bold dark:text-gray-100">Add Team Member</h1>
        <a href="{{route('index')}}" type="button"
           class="rounded-lg bg-red-600 px-2 py-1 text-xs font-bold text-white shadow hover:bg-red-500 flex items-center focus:outline-red-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953l7.108-4.062A1.125 1.125 0 0121 8.688v8.123zM11.25 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953L9.567 7.71a1.125 1.125 0 011.683.977v8.123z"/>
            </svg>
            <span class="ml-2">Go Back</span>
        </a>
    </div>
    <form wire:submit="createMember">
        <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-100">
                Name
            </label>
            <div class="mt-2">
                <input type="text" wire:model="name" id="name"
                       class="block w-full rounded-md border-0 p-2 text-gray-400 shadow-sm bg-gray-800 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:outline-red-600 focus:ring-red-600 sm:text-sm sm:leading-6"
                       placeholder="John">
                @error('name')
                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label for="timezone" class="block text-sm font-medium leading-6 text-gray-100">
                Time Zone
            </label>
            <select id="timezone" wire:model="timezone"
                    class="mt-2 block w-full p-2 rounded-md border-0 text-gray-400 shadow-sm bg-gray-800 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:outline-red-600 focus:ring-red-600 sm:text-sm sm:leading-6">
                @foreach(timezone_identifiers_list() as $timezone)
                    <option wire:key="{{ $timezone }}">{{$timezone}}</option>
                @endforeach
            </select>
            @error('timezone')
            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-6 flex justify-between items-center">
            <label for="show_in_menubar" class="block text-sm font-medium leading-6 text-gray-100">
                Show time in menu bar?
            </label>
            <input type="checkbox" wire:model="show_in_menubar"
                   class="text-red-500 rounded focus:ring-2 focus:ring-offset-2 focus:outline-red-600 focus:ring-red-600 ">
            @error('show_in_menubar')
            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit"
                class="mt-8 rounded-lg bg-red-600 px-4 py-3 font-bold text-white shadow hover:bg-red-500 w-full focus:outline-red-600">
            Add friend
        </button>
    </form>
</div>
