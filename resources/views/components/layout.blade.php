<!doctype html>

<title>CMS</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ URL::asset ('css/app.css') }}">
<link rel="icon" type="image/x-icon" href="{{ URL::asset ('favicon.png') }}">
<link rel="stylesheet" href="{{ URL::asset ('css/vendor/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="https://unpkg.com/@geoapify/geocoder-autocomplete@^1/styles/minimal.css">
@vite('resources/css/app.css')
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="{{ URL::asset ('js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ URL::asset ('js/vendor/alpine/alpine.min.js') }}"></script>
<script src="{{ URL::asset ('js/custom.js') }}"></script>
<script src="https://unpkg.com/@geoapify/geocoder-autocomplete@^1/dist/index.min.js"></script>
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
            @if (session()->has('success'))
            <div x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 4000)"
                x-show="show"
                class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
            >
                <p>{{ session('success') }}</p>
            </div>
            @endif
            <footer class="border-t p-4 pb-3 text-xs bg-gray-100">
                2023 © Design & Develop by <a href="https://www.rajarambhurtel.com.np" class="link">Rajaram</a>.
            </footer>
        </div>

    </div>
    @yield('scripts') 
</body>