<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Seller Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    @if($umkm)
                        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $umkm->name }}</p>
                    @endif
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Produk -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Produk</div>
                        <div class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $stats['product_count'] }}</div>
                    </div>
                </div>

                <!-- Total Pesanan -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pesanan</div>
                        <div class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $stats['order_count'] }}</div>
                    </div>
                </div>

                <!-- Pesanan Pending -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Pesanan Pending</div>
                        <div class="text-3xl font-bold text-yellow-600 mt-2">{{ $stats['pending_orders'] }}</div>
                    </div>
                </div>

                <!-- Pesanan Selesai -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Pesanan Selesai</div>
                        <div class="text-3xl font-bold text-green-600 mt-2">{{ $stats['completed_orders'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-seller-layout>
