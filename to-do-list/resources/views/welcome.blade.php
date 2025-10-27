<x-layout.app>
    <main class="flex flex-col items-center gap-3 w-full mt-14 p-4 justify-center lg:p-12">
        <img src="{{ asset('/assets/Done.svg') }}" alt="Done" class="min-w-11/12 max-w-2xs mx-auto lg:min-w-2xs">
        <div class="flex flex-col items-center">
            <span class="text-primary text-2xl font-normal text-center">
                Welcome to
            </span>
            <h1 class="text-4xl font-bold text-center mb-3 lg:text-5xl">
                {{ config('app.name') }}
                do-to list
            </h1>
        </div>
        <p class="w-full text-center text-xs font-extralight mb-12 lg:text-sm lg:w-1/2 lg:text-center">Lorem ipsum
            dolor sit amet,
            consectetur
            adipiscing
            elit.
            Interdum
            dictum tempus, interdum at dignissim metus.
            Ultricies sed nunc.</p>
        <a href="{{ route('login') }}"
            class="cursor-pointer flex flex-row items-center justify-center gap-4 w-full h-12 bg-linear-to-l  shadow-2xl shadow-black/20 from-[#D8605B] to-[#F4C27F] text-center text-white px-4 py-2 rounded-4xl font-bold lg:w-1/2">Get
            Started <img src="{{ asset('/assets/Vector.svg') }}" alt="Arrow" class="w-4 h-4 inline-block"></a>
    </main>
</x-layout.app>