<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Board</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white font-sans pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
            <a href="" style="flex-direction:row; display:flex ">
                <img class="w-8 h-8 bg-white inline-block mr-1" src="{{Vite::asset('resources/images/aj.jpeg')}}" alt=""/>
                <span class="inline-block flex flex-col mt-0.5">
                 <span class="text-xs font-bold h-2">PIXEL</span>
                 <span class="text-xs font-bold h-2 mt-0.5">POSITIONS</span>
                 </span>
            </a>
        </div>
        <div class="space-x-6 font-bold">
            <a href="">Jobs</a>
            <a href="">Careers</a>
            <a href="">Salaries</a>
            <a href="">Companies</a>
        </div>
        @auth
        <div class="flex space-x-6">
            <a href="/jobs/create">Post a Job</a>
            <form method="post" action="/logout" >
            @csrf
            @method('DELETE')
           <button>logout</button>
          </form>
            @endauth

            @guest
            <a href="/register">Sign Up</a>
            <a href="/login">Log in</a>
            @endguest
        </div>
        </nav>
        <main class="mt-10 max-w-[986px] mx-auto">
            {{$slot}}
        </main>
    </div>
</body>
</html>