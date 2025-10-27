<x-layout.app>
    <main class="flex flex-col items-center gap-1 w-full p-4 justify-center lg:px-4 py-1">

        <img src="{{ asset('/assets/Done.svg') }}" alt="Done" class="min-w-11/12 max-w-2xs mx-auto lg:min-w-2xs">
        <div class="flex flex-col items-center">
            <h1 class="text-3xl font-bold text-center mb-3 lg:text-3xl">
                Get’s things done with TODO
            </h1>
        </div>
        <p class="w-full text-center text-xs font-extralight mb-4 lg:text-sm lg:w-1/2 lg:text-center">Lorem ipsum
            Let’s help you meet up your tasks
        </p>

        <form action="{{ route('register') }}" method="post"
            class="w-full flex flex-col gap-4 justify-center items-center lg:w-1/2">
            @csrf

            <div class="w-full flex flex-col gap-2 justify-center items-center">
                <input type="text" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}"
                    class="w-full h-12 bg-white border border-gray-300 rounded-4xl px-4 py-2 text-sm">

                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full flex flex-col gap-2 justify-center items-center">
                <input type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}"
                    class="w-full h-12 bg-white border border-gray-300 rounded-4xl px-4 py-2 text-sm">

                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full flex flex-col gap-2 justify-center items-center">
                <input type="password" name="password" id="password" placeholder="Enter Password"
                    class="w-full h-12 bg-white border border-gray-300 rounded-4xl px-4 py-2 text-sm">

                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full flex flex-col gap-2 justify-center items-center">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Confirm Password"
                    class="w-full h-12 bg-white border border-gray-300 rounded-4xl px-4 py-2 text-sm">

                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="cursor-pointer flex flex-row items-center justify-center gap-4 w-full h-12 bg-linear-to-l  shadow-2xl shadow-black/20 from-[#D8605B] to-[#F4C27F] text-center text-white px-4 py-2 rounded-4xl font-bold lg:min-w-9/12">Register</button>

            @if (session('message'))
                <span class="text-red-500 text-sm">{{ session('message') }}</span>
            @endif
        </form>

        <a href="{{ route('login') }}" class="mt-5">Already have an account? <span
                class="text-primary font-bold text-[#D8605B]">Sign in</span></a>
    </main>
</x-layout.app>