<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>Expenses</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10">

    <div class="flex justify-between mb-8">

        <h1 class="text-3xl font-bold">

            Expense List

        </h1>

        <a
            href="{{ route('expenses.create') }}"
            class="bg-green-600 text-white px-6 py-3 rounded-lg">

            Add Expense

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 p-4 rounded mb-6">

            {{ session('success') }}

        </div>

    @endif

    <table class="w-full bg-white rounded shadow">

        <thead class="bg-gray-200">

        <tr>

            <th class="p-4">Category</th>

            <th>Description</th>

            <th>Amount</th>

            <th>Date</th>

        </tr>

        </thead>

        <tbody>

        @forelse($expenses as $expense)

            <tr class="border-t">

                <td class="p-4">

                    {{ $expense->category->category_name }}

                </td>

                <td>

                    {{ $expense->description }}

                </td>

                <td>

                    ₱{{ number_format($expense->amount,2) }}

                </td>

                <td>

                    {{ $expense->expense_date }}

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4" class="text-center p-6">

                    No expenses yet.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>