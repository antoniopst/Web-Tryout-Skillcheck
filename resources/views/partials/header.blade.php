<!-- Header Start -->
<header class="bg-teal-500 fixed top-0 left-0 w-full z-[9999] shadow-lg">
    <div class="container max-w-screen-xl mx-auto px-5">
        <div class="flex justify-between py-4 items-center relative">
            <a href="/" class="text-3xl font-bold text-white hover:text-slate-800 transition">skillcheck.</a>

            <!-- Main Navigation -->
            <ul class="md:flex gap-10 hidden" id="main-nav">
                <li><a href="/" class="md:text-xl text-lg {{ Request::is('/') ? 'md:border-b-3 border-slate-800 md:text-slate-800 text-teal-500' : 'md:text-white text-slate-800' }} pb-1 px-2 font-medium transition">Home</a></li>
                <li><a href="/about" class="md:text-xl text-lg {{ Request::is('about') ? 'md:border-b-3 border-slate-800 md:text-slate-800 text-teal-500' : 'md:text-white text-slate-800' }} pb-1 px-2 font-medium transition">About</a></li>
                <li><a href="/question-lists" class="md:text-xl text-lg {{ Request::is('question-lists') ? 'md:border-b-3 border-slate-800 md:text-slate-800 text-teal-500' : 'md:text-white text-slate-800' }} pb-1 px-2 font-medium transition">Tryout</a></li>
                @auth
                    <li>
                        <a href="{{ Auth::user()->role === 'admin' ? route('dashboard.admin') : route('dashboard') }}"
                            class="md:text-xl text-lg {{ Request::is('dashboard') || Request::is('dashboard/admin') ? 'md:border-b-3 border-slate-800 md:text-slate-800 text-teal-500' : 'md:text-white text-slate-800' }} pb-1 px-2 font-medium transition">Dashboard</a>
                    </li>
                @endauth
            </ul>

            <!-- User Section -->
            <div class="flex items-center gap-3 relative" x-data="{ open: false, mobileOpen: false }">
                {{-- Guest --}}
                @guest
                    <a href="/login"
                        class="px-8 py-2 {{ Request::is('login') ? 'bg-slate-800 text-white' : 'bg-white text-teal-500' }} hover:bg-slate-800 hover:text-white rounded-2xl text-lg font-medium transition">
                        Login
                    </a>
                @endguest

                {{-- Auth --}}
                @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center gap-2 px-4 py-2 bg-white/20 hover:bg-white/40 rounded-full transition shadow text-white font-semibold focus:outline-none">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                        <svg :class="{'rotate-180': open}" class="w-4 h-4 ml-1 transition-transform"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute right-0 top-14 mt-2 w-48 bg-white border border-teal-200 rounded-xl shadow-lg py-2 z-50">
                        @if(Auth::user()->hasAnyRole(['admin', 'superadmin']))
                            <a href="{{ route('dashboard.admin') }}"
                                class="flex items-center gap-2 px-5 py-2 text-teal-700 hover:bg-teal-50 hover:text-teal-900 font-semibold transition">
                                <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v4a1 1 0 001 1h3v9h8v-9h3a1 1 0 001-1V7a1 1 0 00-1-1H4a1 1 0 00-1 1z" />
                                </svg>
                                Dashboard Admin
                            </a>
                        @endif
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center gap-2 px-5 py-2 text-slate-700 hover:bg-teal-50 hover:text-teal-600 transition">
                            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Profile
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="px-5">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-2 w-full text-left px-0 py-2 text-red-700 hover:bg-red-50 hover:text-red-900 transition">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @endauth

                <!-- Hamburger for Mobile -->
                <div class="md:hidden flex flex-col gap-[5px] cursor-pointer" @click="mobileOpen = !mobileOpen">
                    <span class="block h-1 w-7 bg-white transition duration-500"></span>
                    <span class="block h-1 w-7 bg-white transition duration-500"></span>
                    <span class="block h-1 w-7 bg-white transition duration-500"></span>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <ul x-show="mobileOpen" x-transition
            class="md:hidden absolute right-2 top-20 bg-teal-50 border-2 border-teal-500 px-8 py-4 rounded-xl transition duration-500 z-40"
            style="display: none;" @click.outside="mobileOpen = false">
            <li><a href="/" class="block py-1 text-lg text-slate-800 hover:text-teal-500">Home</a></li>
            <li><a href="/about" class="block py-1 text-lg text-slate-800 hover:text-teal-500">About</a></li>
            <li><a href="/question-lists" class="block py-1 text-lg text-slate-800 hover:text-teal-500">Tryout</a></li>
            @auth
                <li>
                    <a href="{{ Auth::user()->role === 'admin' ? route('dashboard.admin') : route('dashboard') }}"
                        class="block py-1 text-lg text-slate-800 hover:text-teal-500">Dashboard</a>
                </li>
            @endauth
        </ul>
    </div>
</header>
<!-- Header End -->
