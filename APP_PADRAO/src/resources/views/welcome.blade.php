<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA PADRAO</title>

  <!-- Carregamento via Laravel Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-between antialiased font-sans">

    <!-- Header Simples -->
    <header class="w-full bg-white border-b border-gray-200 py-4 px-6 shadow-sm">
        <div class="max-w-5xl mx-auto flex items-center justify-between">
            <span class="font-black text-xl tracking-wider text-indigo-600">SISTEMA PADRAO</span>
            <div class="space-x-4 text-sm font-medium">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-indigo-600 hover:text-indigo-800">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Cadastrar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="flex-1 flex items-center justify-center p-6">
        <div class="max-w-2xl w-full bg-white border border-gray-200 rounded-2xl shadow-xl p-8 md:p-12 text-center">
            
            <!-- Imagem Genérica em SVG -->
            <div class="flex justify-center mb-6">
                <div class="w-24 h-24 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center border border-indigo-100 shadow-inner">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                </div>
            </div>

            <!-- Título -->
            <h1 class="text-3xl font-extrabold text-gray-900 mb-4 tracking-tight">
                SISTEMA PADRAO
            </h1>

            <!-- Descrição -->
            <p class="text-gray-600 leading-relaxed mb-8">
                Este projeto será a base para a criação de um sistema robusto desenvolvido em <strong class="text-gray-900">Laravel</strong>, estilizado com <strong class="text-gray-900">Tailwind CSS</strong> e integrado ao banco de dados <strong class="text-gray-900">PostgreSQL</strong>.
            </p>

            <!-- Badges da Stack -->
            <div class="flex flex-wrap justify-center gap-2 text-xs font-semibold">
                <span class="bg-red-50 text-red-700 border border-red-200 px-3 py-1 rounded-full">Laravel</span>
                <span class="bg-sky-50 text-sky-700 border border-sky-200 px-3 py-1 rounded-full">Tailwind CSS</span>
                <span class="bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1 rounded-full">PostgreSQL</span>
            </div>

        </div>
    </main>

    <!-- Rodapé -->
    <footer class="py-4 text-center text-xs text-gray-400">
        &copy; {{ date('Y') }} SISTEMA PADRAO. Todos os direitos reservados.
    </footer>

</body>
</html>