<x-layout title="Product">



    <div class="p-4 sm:ml-64">

        <div class="dark:border-gray-700 mt-16">

    <div class="flex justify-between rounded-sm bg-white dark:bg-gray-800">
        <a href="{{ route('product.create') }}" class="font-bold text-2xl text-blue-600 hover:underline">Tambah Produk</a>




        <form class="max-w-lg">
                <div class="relative w-full">
                    <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 border focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" value="{{ request('search') }}" />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
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



                <h1 class="font-bold text-2xl">Produk</h1>

            @if(session('success'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{  session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
              </div>
              @endif
           <div class="flex items-center justify-center h-99 mb-4 mt-5 rounded-sm bg-gray-50 dark:bg-gray-800">

            @if ($products->isNotEmpty())
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori
                </th>
                <th scope="col" class="px-6 py-3">
                    Stok
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{-- {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }} --}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @if ($product->image)
                    <img src="{{ asset('storage/image/' . $product->image) }}" alt="" width="150" class="rounded-lg">
                    @else
                    <p>Tidak ada gambar</p>
                    @endif
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->name }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->category->name }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->stock }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ number_format($product->price, 0, ',', '.') }}
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('product.edit', $product->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                   <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline ml-2">
                    @csrf
                    @method('DELETE')
                       <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                   </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
            <div class="w-full text-center text-gray-700 dark:text-gray-300 py-10">
                <h2 class="text-lg font-semibold">Data tidak ditemukan.</h2>
            </div>
        @endif

           </div>
        </div>
     </div>
</x-layout>
