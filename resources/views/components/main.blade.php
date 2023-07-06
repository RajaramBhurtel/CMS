<main class="bg-[#f3f3f9] mb-auto flex-grow ">
    <div class="border-b bg-white border-gray-300 pl-6 py-2 shadow-sm  text-xl font-bold">
        {{ $title }}
        <span class="block text-xs font-normal text-gray-300 mt-2">
            <a href="#">Home</a> &raquo;
            <a href="#">Projects</a> &raquo;
            <a href="#">Active</a> &raquo;
            <a href="#">Test</a>
        </span>
    </div>
    <div class="overflow-y-auto">

            {{ $slot }}

    </div>
</main>