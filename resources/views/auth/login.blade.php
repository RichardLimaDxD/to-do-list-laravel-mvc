<x-layout.app>
    <main class="flex flex-col items-center gap-1 w-full p-4 justify-center lg:px-4 py-1">
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

        <form action="{{ route('login') }}" method="POST"
            class="w-full flex flex-col gap-4 justify-center items-center lg:w-1/2">
            @csrf

            <div class="w-full flex flex-col gap-2 justify-center items-center">
                <input type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}"
                    class="w-full h-12 bg-white border border-gray-300 rounded-4xl px-4 py-2 text-sm">


                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full flex flex-col gap-2 justify-center items-center">

                <input type="password" name="password" id="password" placeholder="Password"
                    class="w-full h-12 bg-white border border-gray-300 rounded-4xl px-4 py-2 text-sm">

                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="cursor-pointer flex flex-row items-center justify-center gap-4 w-full h-12 bg-linear-to-l  shadow-2xl shadow-black/20 from-[#D8605B] to-[#F4C27F] text-center text-white px-4 py-2 rounded-4xl font-bold lg:min-w-9/12">Login</button>

            @if (session('message'))
                <span class="text-red-500 text-sm">{{ session('message') }}</span>
            @endif
        </form>
        <a href="{{ route('register') }}" class="mt-5">Don't have an account? <span
                class="text-primary font-bold text-[#D8605B]">Sign Up</span></a>
    </main>
</x-layout.app>