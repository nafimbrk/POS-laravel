<x-layout title="Dashboard">
    <div class="p-4 sm:ml-60">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-[50px]">


    <h1 class="font-bold text-2xl mb-5">Selamat datang {{ Auth::user()->name }}, anda sebagai {{ Auth::user()->role->name }}</h1>



    <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="pl-5 pt-5 h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
            <div class="font-bold text-2xl">{{ $categoriesTotal }}</div>
            <div class="font-semibold text-2xl">Kategori</div>
        </div>
        <div class="pl-5 pt-5 h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
            <div class="font-bold text-2xl">{{ $productTotal }}</div>
            <div class="font-semibold text-2xl">Produk</div>
        </div>
     </div>


        </div>
        </div>
</x-layout>
