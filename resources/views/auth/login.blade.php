<!doctype html>

<title>CMS</title>
<link rel="stylesheet" href="{{ URL::asset ('css/app.css') }}">
<link rel="stylesheet" href="{{ URL::asset ('css/vendor/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset ('css/vendor/tailwind/all.min.css') }}">
{{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/tailwind.min.css'> --}}
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="{{ URL::asset ('js/vendor/alpine/alpine.min.js') }}"></script>

<body class="font-family: Open Sans, sans-serif antialiased bg-gray-200 text-gray-900 font-sans">
    <div class="flex items-center h-screen w-full">
        <div class="w-full bg-white rounded shadow-lg p-8 m-4 md:max-w-sm md:mx-auto">
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <span class="block w-full text-center text-xl uppercase font-bold mb-4">Login</span>      
            <form class="mb-4" action="user/login" method="post">
                @csrf
                <div class="mb-4 md:w-full">
                <label for="email" class="block text-xs mb-1">Username or Email</label>
                <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="email" name="email" id="email" placeholder="Username or Email">
                </div>
                <div class="mb-6 md:w-full">
                <label for="password" class="block text-xs mb-1">Password</label>
                <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="password" name="password" id="password" placeholder="Password">
                </div>
                <button class="bg-green-500 hover:bg-green-700 text-white uppercase text-sm font-semibold px-4 py-2 rounded">Login</button>
            </form>
            <a class="text-blue-700 text-center text-sm" href="/login">Forgot password?</a>
        </div>
    </div>
</body>


  