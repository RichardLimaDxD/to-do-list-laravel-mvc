<x-layout.app>
    <main class="flex flex-col w-full min-h-screen max-w-lg mx-auto">
        <section class="bg-[#FFE5CC] pt-12 pb-6 px-6 flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="text-[#5C3D2E] hover:text-[#8B5A3C] transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-[#5C3D2E] flex-1">Create New Task</h1>
        </section>

        <section class="bg-white flex-1 px-6 py-6">
            <form action="{{ route('todolists.store') }}" method="post" class="space-y-5">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-semibold text-[#5C3D2E] mb-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#E59763]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            Title
                        </div>
                    </label>
                    <input type="text" name="title" id="title" placeholder="Enter task title..."
                        value="{{ old('title') }}"
                        class="w-full px-4 py-3 border-2 border-[#FFE5CC] rounded-xl focus:outline-none focus:border-[#E59763] focus:ring-2 focus:ring-[#E59763]/20 transition-colors @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-[#5C3D2E] mb-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#E59763]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                            Description
                        </div>
                    </label>
                    <textarea name="description" id="description" placeholder="Enter task description..." rows="6"
                        class="w-full px-4 py-3 border-2 border-[#FFE5CC] rounded-xl focus:outline-none focus:border-[#E59763] focus:ring-2 focus:ring-[#E59763]/20 transition-colors resize-none">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="status" class="block text-sm font-semibold text-[#5C3D2E] mb-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#E59763]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Status
                        </div>
                    </label>
                    <select name="status" id="status" value="{{ old('status', 'pending') }}"
                        class="w-full px-4 py-3 border-2 border-[#FFE5CC] rounded-xl focus:outline-none focus:border-[#E59763] focus:ring-2 focus:ring-[#E59763]/20 transition-colors bg-white">
                        <option value="pending" selected>Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <div class="flex gap-3 pt-4">
                    <a href="{{ route('dashboard') }}"
                        class="flex-1 px-6 py-3 bg-[#FFE5CC] text-[#5C3D2E] font-semibold rounded-xl hover:bg-[#FFD9B3] transition-colors text-center">
                        Cancel
                    </a>
                    <button type="submit"
                        class="flex-1 px-6 py-3 bg-[#E59763] text-white font-semibold rounded-xl hover:bg-[#D48458] transition-colors shadow-lg shadow-[#E59763]/30">
                        Create Task
                    </button>
                </div>
            </form>
        </section>
    </main>
</x-layout.app>