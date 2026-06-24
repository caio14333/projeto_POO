<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Taverna do Aventureiro
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Hero -->
            <div class="relative overflow-hidden rounded-xl shadow-lg" style="background: radial-gradient(circle at 20% 20%, #3a2a1d 0%, #241a12 55%, #1a120c 100%);">
                <!-- textura sutil -->
                <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, #000 0px, #000 1px, transparent 1px, transparent 14px);"></div>

                <div class="relative px-8 py-14 text-center">
                    <!-- emblema -->
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-5 border-2" style="background: #2a1d12; border-color: #c8862f;">
                        <svg viewBox="0 0 24 24" class="w-10 h-10" fill="none" stroke="#e8a93f" stroke-width="1.6">
                            <path d="M4 21l8-8m0 0l8-8m-8 8L4 5m8 8l8 8" stroke-linecap="round"/>
                            <path d="M3 4l4 1-1 4-4-1z" fill="#e8a93f" stroke="none"/>
                            <path d="M17 15l4 1-1 4-4-1z" fill="#e8a93f" stroke="none"/>
                        </svg>
                    </div>

                    <p class="uppercase tracking-[0.2em] text-sm mb-3" style="color: #c8862f;">RPG em Laravel</p>

                    <h1 class="font-serif text-4xl sm:text-5xl font-bold mb-4" style="color: #f3e3c7; font-family: Georgia, 'Times New Roman', serif;">
                        Bem-vindo à Taverna do Aventureiro
                    </h1>

                    <p class="text-base sm:text-lg max-w-xl mx-auto mb-8" style="color: #c9b89a;">
                        Uma base simples para gerenciar personagens, itens e quests.
                    </p>

                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center gap-2 px-7 py-3 rounded-md font-semibold text-sm transition shadow-md"
                           style="background: #c8862f; color: #1a120c;"
                           onmouseover="this.style.background='#e0a04a'" onmouseout="this.style.background='#c8862f'">
                            Acessar dashboard
                            <svg viewBox="0 0 20 20" class="w-4 h-4" fill="currentColor"><path d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"/></svg>
                        </a>
                    @else
                        <div class="flex flex-wrap items-center justify-center gap-3">
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center gap-2 px-7 py-3 rounded-md font-semibold text-sm transition shadow-md"
                               style="background: #c8862f; color: #1a120c;"
                               onmouseover="this.style.background='#e0a04a'" onmouseout="this.style.background='#c8862f'">
                                Entrar
                            </a>
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center gap-2 px-7 py-3 rounded-md font-semibold text-sm transition border-2"
                               style="border-color: #c8862f; color: #e8a93f;"
                               onmouseover="this.style.background='rgba(200,134,47,0.12)'" onmouseout="this.style.background='transparent'">
                                Criar conta
                            </a>
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Fichas / cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Personagens -->
                <div class="rounded-lg p-6 border-2 bg-white dark:bg-gray-800" style="border-color: #d9c9a8;">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-11 h-11 rounded-md flex items-center justify-center flex-shrink-0" style="background: #fbeede;">
                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="#b5651d" stroke-width="1.8">
                                <circle cx="12" cy="8" r="3.2"/>
                                <path d="M5 20c0-3.6 3.1-6.5 7-6.5s7 2.9 7 6.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h5 class="font-serif font-bold text-lg text-gray-800 dark:text-gray-100" style="font-family: Georgia, serif;">Personagens</h5>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Crie e organize os heróis da sua campanha.
                    </p>
                </div>

                <!-- Itens -->
                <div class="rounded-lg p-6 border-2 bg-white dark:bg-gray-800" style="border-color: #d9c9a8;">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-11 h-11 rounded-md flex items-center justify-center flex-shrink-0" style="background: #fdeaea;">
                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="#b03a3a" stroke-width="1.8">
                                <path d="M4 8l8-4 8 4v8l-8 4-8-4z" stroke-linejoin="round"/>
                                <path d="M4 8l8 4 8-4M12 12v8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h5 class="font-serif font-bold text-lg text-gray-800 dark:text-gray-100" style="font-family: Georgia, serif;">Itens</h5>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Controle o inventário sem excesso de telas.
                    </p>
                </div>

                <!-- Quests -->
                <div class="rounded-lg p-6 border-2 bg-white dark:bg-gray-800" style="border-color: #d9c9a8;">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-11 h-11 rounded-md flex items-center justify-center flex-shrink-0" style="background: #eaf6ea;">
                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="#3a8f4f" stroke-width="1.8">
                                <path d="M7 3h10v16l-5-3-5 3z" stroke-linejoin="round"/>
                                <path d="M9 8h6M9 11h6" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h5 class="font-serif font-bold text-lg text-gray-800 dark:text-gray-100" style="font-family: Georgia, serif;">Quests</h5>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Acompanhe as missões e o progresso do jogo.
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
