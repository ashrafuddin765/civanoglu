<div
    class="fixed top-0 w-full z-30 py-4 px-12 flex flex-wrap justify-between items-center {{ request()->routeIs('home') ? 'sticky-header' : 'general-header' }}">
    <div class="min-w-max">
        <a href="{{ route('home') }}">
            <img width="100" src="/img/logo.png" alt="">
        </a>
    </div>
    <div class="w-max">
        <ul class="flex justify-center">
            <li><a class="inline-block p-4 text-white" href="{{ route('home') }}">Home</a></li>
            <li><a class="inline-block p-4 text-white" href="{{ route('properties') }}?type=2">Villa</a></li>
            <li><a class="inline-block p-4 text-white" href="{{ route('properties') }}?type=1">Apertment</a></li>
            <li><a class="inline-block p-4 text-white" href="{{ route('properties') }}?type=0">Land</a></li>
            <li><a class="inline-block p-4 text-white" href="">Dupl</a></li>
        </ul>
    </div>
    <div class="min-w-max text-3xl">
        <a href="">🏁</a>
        <a href="">🏁</a>
    </div>
</div>
