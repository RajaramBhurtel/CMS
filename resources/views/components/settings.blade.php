<section class="py-8 max-w-4xl mx-auto">

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <div class="flex">
                <img src="https://i.pravatar.cc/60?u=120" alt="" width="40" height="40" class="rounded-xl mr-4">
                <h4 class="font-semibold mt-2">User</h4>
            </div>

            <ul class="mt-6">
                <li>
                    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'text-blue-500' : '' }}"><i class="fa-solid fa-gauge"></i>Dashboard</a>
                </li>

                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <h1 class="text-lg font-bold mb-8 pb-2 border-b">
                {{ $heading }}
            </h1>
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>