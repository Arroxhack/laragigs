<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <script src="//unpkg.com/alpinejs" defer></script> {{-- AlpineJS --}}

        <script src="https://cdn.tailwindcss.com"></script> {{-- Tailwind --}}

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>

        <title>LaraGigs | Find Laravel Jobs & Projects</title>
        
    </head>
    
    <body class="mb-48">
        {{-- Navbar --}}
        <nav class="flex justify-between items-center mb-4">
            <a href="/laragigs/public/">
                <img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"/>
            </a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth {{-- auth directive, it shows only if a user is logged --}}
                    <li>
                        <span class="font-bold uppercase">
                            Welcome {{auth()->user()->name}} {{-- Getting the name from the user --}}
                        </span>
                    </li>
                    <li>
                        <a href="/laragigs/public/listings/manage" class="hover:text-laravel">
                            <i class="fa-solid fa-gear"></i>
                            Manage Listings
                        </a>
                    </li>
                    <li>
                        <form class="inline" method="POST" action="/laragigs/public/logout"> {{-- Logout --}}
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                        </form>
                    </li>
                @else {{-- in case a user is not logged in, do this --}}
                    <li>
                        <a href="/laragigs/public/register" class="hover:text-laravel">
                            <i class="fa-solid fa-user-plus"></i> 
                            Register
                        </a>
                    </li>
                    <li>
                        <a href="/laragigs/public/login" class="hover:text-laravel">
                            <i class="fa-solid fa-door-open"></i>
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>

    <main> {{-- !!!! WAY OF USING THE LAYOUT INSTEAS OF YIELD AND THEN @EXTENDS AND @SECTION  --}}
        {{$slot}} 
    </main>
    
    {{-- Footer --}}
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>

    <a href="/laragigs/public/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">
        Post Job
    </a>

    </footer>

    {{-- Flash Message --}}
    {{-- putting our message, it doesnt matter where case it is position fixed --}}
    <x-flash-message />

</body>
</html>