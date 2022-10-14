<div class="flex flex-col mx-auto max-w-xs my-32 items-center bg-gray-200 rounded-t-lg pt-0 md:max-w-md">
    <div class="mt-2 mx-auto ">
        {{ $logo }}
    </div>

    <div class="w-full max-w-lg mt-2 px-6 py-4 bg-white shadow-md shadow-brightRedLight overflow-hidden rounded-b-lg">
        {{ $slot }}
    </div>
</div>
