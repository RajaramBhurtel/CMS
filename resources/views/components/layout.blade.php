<!doctype html>

<title>CMS</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 ">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="https://t4.ftcdn.net/jpg/04/40/92/73/360_F_440927381_ljaelLw3fiAaM7baJB4kqN6BHCguhJ0l.jpg" alt="" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">

                    <a href="/register"
                       class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
                        Register
                    </a>

                    <a href="/login"
                       class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
                        Log In
                    </a>
                

                <a href="#newsletter"
                   class="bg-blue-500 ml-5 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter"
                class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
        >
            <h6 class="text-xs">Copyright © 2020 <a href="#" class="hover:text-blue-500">EIC Couriers & Cargo Pvt.</a> Ltd. All rights reserved.</h5>
        </footer>
    </section>
</body>