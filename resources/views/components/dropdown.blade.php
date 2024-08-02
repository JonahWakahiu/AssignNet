<!-- User Pic -->
<div x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }" @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false"
    class="relative flex items-center">
    <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
        @keydown.space.prevent="openWithKeyboard = true" @keydown.enter.prevent="openWithKeyboard = true"
        @keydown.down.prevent="openWithKeyboard = true"
        class="rounded-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 dark:focus-visible:outline-blue-600"
        aria-controls="userMenu">
        {{ $trigger }}

    </button>


    <!-- User Dropdown -->
    <div x-cloak x-show="userDropDownIsOpen || openWithKeyboard" x-transition.opacity x-trap="openWithKeyboard"
        @click.outside="userDropDownIsOpen = false, openWithKeyboard = false"
        @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()" id="userMenu"
        class="absolute right-0 top-12 flex w-full shadow-md min-w-[12rem] flex-col overflow-hidden rounded-xl border border-slate-300 bg-white py-1.5 dark:border-slate-700 dark:bg-slate-800">
        {{ $slot }}
    </div>
</div>
