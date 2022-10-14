<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-veryDarkBlue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-brightRed active:bg-veryDarkBlue focus:outline-none focus:border-veryDarkBlue focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
