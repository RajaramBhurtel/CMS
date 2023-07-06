<!doctype html>

<title>CMS</title>
<link rel="stylesheet" href="{{ URL::asset ('css/app.css') }}">
<link rel="stylesheet" href="{{ URL::asset ('css/vendor/fontawesome/css/all.min.css') }}">
@vite('resources/css/app.css')
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
<script src="{{ URL::asset ('js/vendor/alpine/alpine.min.js') }}"></script>
<body style="font-family: Open Sans, sans-serif">
    <div class="md:flex">

        <!-- sidebar -->
        <x-sidebar />
        <!-- End sidebar -->


        <!-- content -->
        <div class="flex-1 flex-col flex">

            <!-- Top navbar -->
            <x-navbar />
            <!-- End Top navbar -->

            <!-- Main Content -->
            {{ $slot }}
            <!-- End Main Content -->
            <footer class="border-t p-4 pb-3 text-xs bg-gray-100">
                2023 © Design & Develop by Sabin.
            </footer>
        </div>

    </div>
</body>