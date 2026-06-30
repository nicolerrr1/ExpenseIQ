<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ExpenseIQ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow">
            <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                           class="mt-1 block w-full rounded border-gray-300" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="mt-1 block w-full rounded border-gray-300" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password"
                           class="mt-1 block w-full rounded border-gray-300" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           class="mt-1 block w-full rounded border-gray-300" required>
                </div>

                <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                    Register
                </button>
            </form>

            <p class="mt-4 text-sm text-center text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Log in</a>
            </p>
        </div>
    </div>

</body>
</html>