<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-brightRed border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-brightRedSupLight hover:text-veryDarkBlue active:bg-brightRedLight focus:outline-none focus:border-veryDarkBlue focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
