<x-layout.app>
    <main class="flex flex-col w-full min-h-screen max-w-lg mx-auto">
        <section class="bg-[#FFE5CC] pt-12 pb-16 px-8 flex flex-col items-center relative">
            @if ($message = session()->get('message'))
                <div class="absolute top-4 left-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg text-center">
                    {{ $message }}
                </div>
            @endif

            <div
                class="w-24 h-24 rounded-full bg-linear-to-br from-[#E59763] to-[#D48458] flex items-center justify-center border-2 border-[#8B5A3C] mb-4">
                <span class="text-4xl text-white font-bold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
            </div>

            <h2 class="text-2xl font-bold text-[#5C3D2E] mb-1">{{ auth()->user()->name }}</h2>

            <a href="{{ route('logout') }}"
                class="bg-[#FFE5CC] hover:bg-[#FFD9B3] border border-[#E59763] text-[#5C3D2E] font-semibold py-2 px-8 rounded-lg transition-colors">
                Log Out
            </a>
        </section>

        <section class="bg-white flex flex-col items-center gap-4">
            <div class="w-full h-20">
                <img src="{{ asset('/assets/Group.svg') }}" alt="Clock" class="w-full h-30">
            </div>
            <p class="text-2xl font-semibold text-[#5C3D2E] mt-4 mb-4">{{ $greeting ?? 'Good Day' }}</p>
        </section>

        <section class=" bg-white flex-1 px-4 pb-6">
            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-2xl font-bold text-[#5C3D2E]">Tasks List</h3>
                <div class="flex gap-2">
                    <a href="{{ route('todolists.create') }}"
                        class="w-10 h-10 rounded-full border-2 border-[#FFE5CC] flex items-center justify-center hover:bg-[#FFE5CC] transition-colors">
                        <svg class="w-5 h-5 text-[#E59763]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <line x1="12" y1="5" x2="12" y2="19" stroke-width="2" />
                            <line x1="5" y1="12" x2="19" y2="12" stroke-width="2" />
                        </svg>
                    </a>
                    <a href="{{ route('todolists.deleted') }}"
                        class="w-10 h-10 rounded-full border-2 border-[#FFE5CC] flex items-center justify-center hover:bg-[#FFE5CC] transition-colors"
                        title="Deleted Lists">
                        <svg class="w-5 h-5 text-[#E59763]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                stroke-width="2" />
                        </svg>
                    </a>
                </div>
            </div>

            <form action="{{ route('dashboard') }}" method="get" class="mb-4 p-3 bg-[#FFF8F0] rounded-lg">
                <input type="text" name="search" placeholder="Search by title..." value="{{ request('search') }}"
                    class="w-full px-4 py-2 border border-[#E59763] rounded-lg mb-3 focus:outline-none focus:ring-2 focus:ring-[#E59763]">

                <div class="flex items-center gap-2">
                    <label for="status" class="text-[#5C3D2E] font-medium whitespace-nowrap">Filter:</label>
                    <select name="status" id="status"
                        class="flex-1 px-4 py-2 border border-[#E59763] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E59763]">
                        <option value="">All</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed
                        </option>
                    </select>
                </div>

                <div class="flex gap-2 mt-3">
                    <button type="submit"
                        class="cursor-pointer flex-1 bg-[#E59763] text-white py-2 px-4 rounded-lg hover:bg-[#D48458] transition-colors font-medium">
                        Search
                    </button>
                    <a href="{{ route('dashboard') }}"
                        class="cursor-pointer bg-[#FFE5CC] text-[#5C3D2E] py-2 px-4 rounded-lg hover:bg-[#FFD9B3] transition-colors font-medium">
                        Clear
                    </a>
                </div>
            </form>

            <div class="bg-white rounded-3xl shadow-lg p-4 mb-4 border border-[#F4C27F]/20">
                <h4 class="text-lg font-semibold text-[#5C3D2E] mb-4">Tasks List</h4>

                @if($todolists->count() > 0)
                    <div class="space-y-3 max-h-96 overflow-y-auto">
                        @foreach ($todolists as $todolist)
                            <div
                                class="flex items-start gap-3 p-3 rounded-xl bg-[#FFF8F0] hover:bg-[#FFE5CC] transition-colors">
                                <div class="mt-1 shrink-0">
                                    @if($todolist->status === 'completed')
                                        <div class="w-5 h-5 rounded-full bg-[#E59763] flex items-center justify-center">
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </div>
                                    @else
                                        <div class="w-5 h-5 rounded border-2 border-[#22C55E]"></div>
                                    @endif
                                </div>

                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-[#5C3D2E] mb-1">{{ $todolist->title }}</p>
                                    @if($todolist->description)
                                        <p class="text-sm text-[#8B5A3C] mb-1">{{ Str::limit($todolist->description, 50) }}</p>
                                    @endif
                                    <div class="flex items-center gap-3 text-xs text-[#8B5A3C] mb-2">
                                        <span>{{ $todolist->created_at->setTimezone('America/Sao_Paulo')->format('d/m/Y') }}</span>
                                        <span
                                            class="px-2 py-0.5 rounded-full bg-{{ $todolist->status === 'completed' ? 'green' : 'orange' }}-100 text-{{ $todolist->status === 'completed' ? 'green' : 'orange' }}-800 capitalize">
                                            {{ $todolist->status }}
                                        </span>
                                    </div>
                                    <div class="flex flex-row  items-center gap-2">
                                        <a href="{{ route('todolists.edit', $todolist) }}"
                                            class="cursor-pointer text-[#E59763] hover:text-[#D48458] text-sm font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('todolists.destroy', $todolist) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="cursor-pointer text-red-500 hover:text-red-700 text-sm font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-[#8B5A3C]">
                        <p class="text-lg mb-2">No tasks yet</p>
                        <p class="text-sm">Create your first task to get started!</p>
                    </div>
                @endif
            </div>

            <div class="flex justify-center mt-4">
                <div class="flex gap-2">
                    {{ $todolists->links() }}
                </div>
            </div>
        </section>
    </main>
</x-layout.app>