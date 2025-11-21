<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 dark:bg-gray-900">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="h-full flex items-center justify-center px-6 py-12">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <h1 class="text-center text-4xl font-bold text-gray-900 dark:text-orange-600 mb-8">JOB HZ ADMS</h1>

        <form class="space-y-6" action="dashboardLogin" method="POST">
            @csrf
            <!-- Email -->
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email
                    address</label>
                <input id="email" type="email" name="email" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500
                 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="name@example.com">
            </div>

            <!-- Password -->
            <div>
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                <input id="password" type="password" name="password" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500
                 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="••••••••">
            </div>

            <!-- Remember me -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" type="checkbox"
                        class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500">
                    <label for="remember" class="ml-2 text-sm text-gray-900 dark:text-gray-300">Remember me</label>
                </div>
                {{-- <a href="#" class="text-sm text-primary-600 hover:underline dark:text-primary-400">Forgot
                    password?</a> --}}
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-orange-600 hover:bg-primary-700 focus:ring-4 focus:outline-none
               focus:ring-primary-300 font-bold text-2xl rounded-lg px-5 py-2.5 text-center
               dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Sign in
            </button>

            <!-- Sign up link -->
            {{-- <p class="text-sm text-center text-gray-500 dark:text-gray-400">
                Don’t have an account?
                <a href="#" class="text-primary-600 hover:underline dark:text-primary-400">Create one</a>
            </p> --}}
        </form>
        @error('email')
            <div class="text-red-500 text-sm mt-2">
                <p>{{ $message }}</p>
            </div>
        @enderror
        @error('password')
            <div class="text-red-500 text-sm mt-2">
                <p>{{ $message }}</p>
            </div>
        @enderror
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
