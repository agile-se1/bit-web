<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<nav class="bg-white px-2 sm:px-4 py-2.5 w-full top-0 left-0 drop-shadow-2xl font-normal">
    <div class="container flex flex-wrap items-center justify-around mx-auto py-2">
        <a href="#" class="flex items-center justify-start">
            <img src="{{ $message->embed(public_path() .  '/mail/logo.png')}}" class="mr-3 sm:h-9 scale-175" alt="Logo">
        </a>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col p-4 mt-4 border rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                <li>
                    <Link href="/"
                          class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">
                        Home
                    </Link>
                </li>
                <li>
                    <Link href="#"
                          class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">
                        Informationen
                    </Link>
                </li>
                <li>
                    <Link href="#"
                          class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">
                        Berufsfeldwahl
                    </Link>
                </li>
                <li>
                    <Link href="#"
                          class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">
                        Referenten
                    </Link>
                </li>
                <li>
                    <Link href="#"
                          class="text-2xl block py-2 pl-3 pr-4 text-bit-blue rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">
                        Anfahrt
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--
<div class="w-full bg-local" style="background-image: url('')">
    <img class="w-1"/>
    <h1>
        Login Link
    </h1>
</div>
-->

<div class="p-6 max-w-5xl mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
    <div class="shrink-0">
        <img class="h-12 w-12" src="/img/logo.svg" alt="ChitChat Logo">
    </div>
    <div>
        <div class="text-xl font-medium text-black">ChitChat</div>
        <p class="text-slate-500">You have a new message!</p>
    </div>
</div>
<h1 class="">Hi {{$first_name}}</h1>
<p>Klicke <a href="{{$link}}">hier</a>, um dich einzuloggen.</p>

<p>Link als Klartext: {{$link}}</p>
</body>
</html>



