<x-layout-auth title="Register">
    <div class="mt-20">
        <h1 class="text-center text-2xl font-semibold">Register</h1>
        <form class="max-w-sm mx-auto" action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input type="name" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input type="email" name="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div class="relative">
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        value="{{ old('password') }}">

                    <!-- Ikon toggle -->
                    <span id="togglePassword" class="absolute inset-y-0 right-3 flex items-center cursor-pointer">
                        <!-- Mata terbuka (hidden awalnya) -->
                        <svg id="eyeOpen" class="w-5 h-5 text-gray-500 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.944-9.544-7a10.05 10.05 0 012.293-3.95M15 12a3 3 0 01-3 3m0-6a3 3 0 013 3m0 0a3 3 0 01-3 3m0 0a3 3 0 003-3m6 3a10.05 10.05 0 01-1.447 2.412M4.121 4.121l15.758 15.758" />
                        </svg>

                        <!-- Mata tertutup (default ditampilkan) -->
                        <svg id="eyeClosed" class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="flex justify-between">
                <p class="font-medium dark:text-blue-500 hover:underline">Sudah register?</p>
            <a href="{{ route('login.view') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Login</a>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 mt-4 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
        </form>
    </div>
</x-layout-auth>

<script>
    $('#togglePassword').on('click', function () {
        const passwordInput = $('#password');
        const isPasswordVisible = passwordInput.attr('type') === 'text';

        // Toggle type
        passwordInput.attr('type', isPasswordVisible ? 'password' : 'text');

        // Toggle icons
        $('#eyeClosed').toggleClass('hidden', !isPasswordVisible);
        $('#eyeOpen').toggleClass('hidden', isPasswordVisible);
    });
</script>

