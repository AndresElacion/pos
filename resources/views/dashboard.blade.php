<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div>Hello, {{ Auth::user()->name }}</div>
        </h2>
    </x-slot>

    
    <div class="flex h-screen overflow-hidden">
        @include('components.sidebar')
        <div class="flex-1">
            <div class="py-12 mr-60">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
