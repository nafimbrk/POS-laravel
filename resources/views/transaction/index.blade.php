<x-layout title="Transaction">



    <div class="p-4 sm:ml-64">

        <div class="dark:border-gray-700 mt-16">

            <div class="flex justify-between rounded-sm bg-white dark:bg-gray-800">
                <h1 class="font-bold text-2xl hover:underline">Transaksi</h1>




                <form class="max-w-lg">
                    <div class="relative w-full">
                        <input type="search" name="search" id="search-dropdown"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 border focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            value="{{ request('search') }}" />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 rounded-lg dark:border-gray-700">

            @if ($products->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                          @if ($product->image)
                          <a href="#">
                              <img class="w-full h-48 object-cover" src="{{ asset('storage/image/' . $product->image) }}" alt="product image">
                          </a>
                          @else
                          <p class="w-full h-48">Tidak ada gambar</p>
                          @endif
                            <div class="px-5 pb-5">
                                <a href="#">
                                    <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-2">
                                        {{ $product->name }}
                                    </h5>
                                </a>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold text-gray-900 dark:text-white">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                    <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="w-full text-center text-gray-700 dark:text-gray-300 py-10">
                    <h2 class="text-lg font-semibold">Data tidak ditemukan.</h2>
                </div>
            @endif

        </div>
    </div>

</x-layout>
