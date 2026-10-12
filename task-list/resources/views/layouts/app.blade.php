<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Task List</title>
    {{-- the blade fornatter disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-700 cursor-pointer
        }
        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input, textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error {
            @apply text-red-500 text-sm
        }

    </style>
    {{-- the blade fornatter enable --}}

    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-4">@yield('title')</h1>    
    @if (session()->has('success'))
        <div x-data="{ flash:true }">
        <div x-show="flash" class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700" role="alert">
            <strong class="font-bold">Success!</strong> 
            <div>{{session('success')}}</div>
            <span @click="flash = false" class=" cursor-pointer absolute top-1 right-3">x</span>
        </div>
    </div>
        
    @endif
    <div>@yield('content')</div>
</body>
</html>