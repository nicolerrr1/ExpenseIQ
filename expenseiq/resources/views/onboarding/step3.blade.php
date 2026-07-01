<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ExpenseIQ</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="min-h-screen bg-[#FFF7F2] flex items-center justify-center">

<div class="bg-white rounded-[40px] shadow-xl p-16 w-[700px] text-center">

    <div class="text-8xl mb-8">
        🎉
    </div>

    <h1 class="text-5xl font-extrabold text-[#4D3900] mb-6">

        Welcome to ExpenseIQ!

    </h1>

    <p class="text-gray-500 text-xl mb-10">

        Your account is ready.

        Let's start tracking your expenses.

    </p>

    <form action="{{ route('welcome.finish') }}" method="POST">

        @csrf

        <button
            class="bg-[#F3C400] hover:bg-yellow-500 text-[#4D3900] text-xl font-bold px-12 py-5 rounded-2xl transition"
        >

            Go to Dashboard

        </button>

    </form>

</div>

</body>
</html>