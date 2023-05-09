<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Facebook Meta --}}
<meta property="og:title" content="@yield('og.title')" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ config('app.url') }}/@yield('og.image')" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


<script src="{{ asset('js/main.js') }}" defer></script>
<script src="{{ asset('js/drop-down.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js" integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])



<title>@yield('title', 'Apostolic Mountain')</title>
@livewireStyles
