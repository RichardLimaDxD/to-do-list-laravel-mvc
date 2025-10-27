<x-layout.app>
    <main class="flex flex-col w-full min-h-screen max-w-lg mx-auto">
        <section class="bg-[#FFE5CC] pt-12 pb-6 px-6 flex items-center gap-4 relative">
            <a href="{{ route('dashboard') }}" class="text-[#5C3D2E] hover:text-[#8B5A3C] transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-[#5C3D2E] flex-1">Deleted Tasks</h1>

            @if ($message = session()->get('message'))
                <div
                    class="absolute top-20 left-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg text-center shadow-lg">
                    {{ $message }}
                </div>
            @endif
        </section>

        <section class="bg-white flex-1 px-6 py-6">
            @if($todolists->count() > 0)
                <div class="space-y-3 mb-6">
                    @foreach ($todolists as $todolist)
                        <div
                            class="bg-[#FFF8F0] rounded-2xl p-4 border-2 border-[#FFE5CC] hover:border-[#E59763] transition-colors">
                            <div class="flex items-start gap-3 mb-3">
                                <div class="w-5 h-5 rounded-full bg-red-100 flex items-center justify-center mt-1 shrink-0">
                                    <svg class="w-3 h-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-[#5C3D2E] mb-1 text-lg">{{ $todolist->title }}</h3>
                                    @if($todolist->description)
                                        <p class="text-sm text-[#8B5A3C] mb-2">{{ Str::limit($todolist->description, 80) }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center gap-3 mb-3 text-xs text-[#8B5A3C]">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Created: {{ $todolist->created_at->setTimezone('America/Sao_Paulo')->format('d/m/Y') }}
                                </span>
                                <span
                                    class="px-2 py-0.5 rounded-full bg-{{ $todolist->status === 'completed' ? 'green' : 'orange' }}-100 text-{{ $todolist->status === 'completed' ? 'green' : 'orange' }}-800 capitalize">
                                    {{ $todolist->status }}
                                </span>
                            </div>

                            <form action="{{ route('todolists.restore', $todolist) }}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit"
                                    class="w-full px-4 py-2 bg-[#E59763] text-white font-semibold rounded-lg hover:bg-[#D48458] transition-colors flex items-center justify-center gap-2 shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Restore Task
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center mt-4">
                    <div class="flex gap-2">
                        {{ $todolists->links() }}
                    </div>
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-16 text-center">
                    <div class="w-24 h-24 rounded-full bg-[#FFF8F0] flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-[#E59763]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#5C3D2E] mb-2">No Deleted Tasks</h3>
                    <p class="text-[#8B5A3C] mb-4">You don't have any deleted tasks yet.</p>
                    <a href="{{ route('dashboard') }}"
                        class="px-6 py-3 bg-[#E59763] text-white font-semibold rounded-xl hover:bg-[#D48458] transition-colors shadow-lg shadow-[#E59763]/30 inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Go to Dashboard
                    </a>
                </div>
            @endif
        </section>
    </main>
</x-layout.app>