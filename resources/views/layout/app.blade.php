<!DOCTYPE html>
<html>
<head>
    <title>TodoBuddy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-rose-50 text-rose-950">

<header class="border-b border-rose-200 bg-white/80 backdrop-blur sticky top-0 z-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center justify-between gap-2">
            <a href="/" class="font-semibold tracking-tight text-rose-950 text-lg sm:text-xl flex-shrink-0">TodoBuddy</a>

            <nav class="flex items-center gap-1 sm:gap-2">
                @auth
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="sm:hidden p-2 rounded-md text-rose-800 hover:bg-rose-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Desktop navigation -->
                    <div class="hidden sm:flex items-center gap-2">
                        <a href="/todos" class="rounded-md px-3 py-2 text-sm font-medium text-rose-800 hover:bg-rose-100 hover:text-rose-950 whitespace-nowrap">My Todos</a>

                        @if(auth()->user()->isAdmin())
                            <a href="/admin/todos" class="rounded-md px-3 py-2 text-sm font-medium text-rose-800 hover:bg-rose-100 hover:text-rose-950 whitespace-nowrap">Admin</a>
                        @endif

                        <div class="hidden lg:block h-6 w-px bg-rose-200"></div>

                        <div class="hidden lg:flex items-center gap-2">
                            <span class="text-sm text-rose-700 truncate max-w-[100px]">{{ auth()->user()->name }}</span>
                            <span class="inline-flex items-center rounded-full bg-rose-100 px-2 py-0.5 text-xs font-medium text-rose-800 ring-1 ring-rose-600/10 whitespace-nowrap">{{ auth()->user()->role ?? 'user' }}</span>
                        </div>

                        <form action="/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="rounded-md bg-rose-600 px-3 py-2 text-sm font-medium text-white hover:bg-rose-700 whitespace-nowrap">Logout</button>
                        </form>
                    </div>
                @endauth

                @guest
                    <!-- Mobile menu button for guests -->
                    <button id="mobile-menu-button-guest" class="sm:hidden p-2 rounded-md text-rose-800 hover:bg-rose-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Desktop guest navigation -->
                    <div class="hidden sm:flex items-center gap-2">
                        <a href="/login" class="rounded-md px-3 py-2 text-sm font-medium text-rose-800 hover:bg-rose-100 hover:text-rose-950 whitespace-nowrap">Login</a>
                        <a href="/register" class="rounded-md bg-rose-600 px-3 py-2 text-sm font-medium text-white hover:bg-rose-700 whitespace-nowrap">Register</a>
                    </div>
                @endguest
            </nav>
        </div>

        <!-- Mobile menu -->
        @auth
            <div id="mobile-menu" class="hidden sm:hidden mt-3 pt-3 border-t border-rose-200">
                <div class="flex flex-col gap-2">
                    <a href="/todos" class="rounded-md px-3 py-2 text-sm font-medium text-rose-800 hover:bg-rose-100 hover:text-rose-950">My Todos</a>
                    
                    @if(auth()->user()->isAdmin())
                        <a href="/admin/todos" class="rounded-md px-3 py-2 text-sm font-medium text-rose-800 hover:bg-rose-100 hover:text-rose-950">Admin</a>
                    @endif
                    
                    <div class="flex items-center justify-between px-3 py-2">
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-rose-700">{{ auth()->user()->name }}</span>
                            <span class="inline-flex items-center rounded-full bg-rose-100 px-2 py-0.5 text-xs font-medium text-rose-800 ring-1 ring-rose-600/10">{{ auth()->user()->role ?? 'user' }}</span>
                        </div>
                    </div>
                    
                    <form action="/logout" method="POST" class="px-3">
                        @csrf
                        <button type="submit" class="w-full rounded-md bg-rose-600 px-3 py-2 text-sm font-medium text-white hover:bg-rose-700">Logout</button>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <div id="mobile-menu-guest" class="hidden sm:hidden mt-3 pt-3 border-t border-rose-200">
                <div class="flex flex-col gap-2">
                    <a href="/login" class="rounded-md px-3 py-2 text-sm font-medium text-rose-800 hover:bg-rose-100 hover:text-rose-950">Login</a>
                    <a href="/register" class="rounded-md bg-rose-600 px-3 py-2 text-sm font-medium text-white hover:bg-rose-700">Register</a>
                </div>
            </div>
        @endguest
    </div>
</header>

<main class="mx-auto max-w-5xl px-4 py-8">
    @yield('content')
</main>

<footer class="bg-rose-950 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About Section -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-rose-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">TB</span>
                    </div>
                    <h3 class="text-xl font-bold">TodoBuddy</h3>
                </div>
                <p class="text-rose-200 mb-6 leading-relaxed">
                    A modern todo management application built with Laravel 12, featuring user authentication, 
                    role-based access control, and a beautiful responsive design. Empowering users to manage 
                    their tasks efficiently with a clean and intuitive interface.
                </p>
                <div class="flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-rose-800 rounded-full text-xs font-medium">Laravel 12</span>
                    <span class="px-3 py-1 bg-rose-800 rounded-full text-xs font-medium">PHP 8.2+</span>
                    <span class="px-3 py-1 bg-rose-800 rounded-full text-xs font-medium">Tailwind CSS</span>
                    <span class="px-3 py-1 bg-rose-800 rounded-full text-xs font-medium">MySQL</span>
                </div>
            </div>

            <!-- Creator Section -->
            <div>
                <h4 class="text-lg font-semibold mb-4 text-rose-100">Creator</h4>
                <div class="space-y-3">
                    <div>
                        <p class="font-medium text-white">Taswoor Hussain</p>
                        <p class="text-rose-200 text-sm">Full Stack JavaScript Developer</p>
                        <p class="text-rose-300 text-xs mt-1">Trainer | Laravel | React | Next.js | Node.js</p>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center gap-2 text-rose-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Gilgit, Pakistan</span>
                        </div>
                        <div class="flex items-center gap-2 text-rose-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+92 3554664771</span>
                        </div>
                        <div class="flex items-center gap-2 text-rose-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-xs">taswoor.mern.dev@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links & Skills -->
            <div>
                <h4 class="text-lg font-semibold mb-4 text-rose-100">Connect & Skills</h4>
                <div class="space-y-4">
                    <div>
                        <p class="text-sm font-medium text-rose-200 mb-2">Top Skills</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-rose-800 rounded text-xs">React</span>
                            <span class="px-2 py-1 bg-rose-800 rounded text-xs">Next.js</span>
                            <span class="px-2 py-1 bg-rose-800 rounded text-xs">Node.js</span>
                            <span class="px-2 py-1 bg-rose-800 rounded text-xs">Laravel</span>
                            <span class="px-2 py-1 bg-rose-800 rounded text-xs">MongoDB</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-rose-200 mb-2">Languages</p>
                        <div class="space-y-1 text-xs text-rose-300">
                            <div>• Urdu (Native)</div>
                            <div>• English (Limited Working)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Links -->
        <div class="border-t border-rose-800 mt-8 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-4">
                    <a href="https://linkedin.com/in/taswoorhussain72" target="_blank" rel="noopener noreferrer" 
                       class="flex items-center gap-2 text-rose-200 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                        <span class="text-sm">LinkedIn</span>
                    </a>
                    <a href="https://github.com/Taswoor2507" target="_blank" rel="noopener noreferrer" 
                       class="flex items-center gap-2 text-rose-200 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        <span class="text-sm">GitHub</span>
                    </a>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-rose-300 text-sm">© 2026 TodoBuddy. Crafted with ❤️ by Taswoor Hussain</p>
                    <p class="text-rose-400 text-xs mt-1">Empowering productivity through elegant code</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle for authenticated users
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Mobile menu toggle for guests
    const mobileMenuButtonGuest = document.getElementById('mobile-menu-button-guest');
    const mobileMenuGuest = document.getElementById('mobile-menu-guest');
    
    if (mobileMenuButtonGuest && mobileMenuGuest) {
        mobileMenuButtonGuest.addEventListener('click', function() {
            mobileMenuGuest.classList.toggle('hidden');
        });
    }
});
</script>

</body>
</html>
