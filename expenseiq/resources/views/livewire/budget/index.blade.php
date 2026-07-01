@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div>

        <h1 class="text-[42px] font-bold text-[#4D3900]">
            Budget Setting
        </h1>

        <p class="text-gray-500">
            Set monthly limits. Alerts fire at 80% and 100%.
        </p>

    </div>

    <!-- Warning -->
    <div class="bg-[#F7C2CC] border border-[#E8899A] rounded-2xl px-5 py-3">

        <p class="text-[#A61C45] font-bold">
            <i class="fa-solid fa-triangle-exclamation mr-2"></i>
            Budget Limit Warning
        </p>

    </div>

    <!-- Card -->
    <div class="bg-white rounded-[28px] border-2 border-yellow-400 overflow-hidden">

        <form action="{{ route('budget.save') }}" method="POST">

            @csrf

            @php
                $totalBudget = 0;
                $totalSpent = 0;
            @endphp

            <table class="w-full">

                <thead>

                    <tr class="bg-[#F3C400] text-[#5D4300]">

                        <th class="text-left px-8 py-4 text-2xl">
                            Category
                        </th>

                        <th class="text-center text-2xl">
                            Budget
                        </th>

                        <th class="text-center text-2xl">
                            Spent
                        </th>

                        <th class="text-center text-2xl">
                            Available
                        </th>

                    </tr>

                </thead>

                <tbody>

                @foreach($categories as $category)

                   @php

                        $budget = $budgets[$category->id] ?? null;

                        $amount = $budget->budget_amount ?? 0;

                        $spentAmount = $spent[$category->id] ?? 0;

                        $available = $amount - $spentAmount;

                        $totalBudget += $amount;

                        $totalSpent += $spentAmount;

                    @endphp

                    <tr class="border-b border-yellow-300">

                        <td class="px-8 py-5 text-[22px]">

                            {{ $category->category_name }}

                        </td>

                        <td class="text-center">

                            <input
                                type="hidden"
                                name="category_id[]"
                                value="{{ $category->id }}"
                            >

                            <input
                                type="number"
                                name="budget_amount[]"
                                value="{{ $amount }}"
                                min="0"
                                class="w-56 h-14 rounded-xl border border-gray-300 text-center text-2xl focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            >

                        </td>

                        <td class="text-center text-2xl">

                            ₱{{ number_format($spentAmount,2) }}

                        </td>

                        <td class="text-center text-2xl">

                            ₱{{ number_format($available,2) }}

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            <!-- Footer -->

            <div class="flex items-center justify-between px-8 py-6">

                <div class="text-xl font-semibold text-[#5D4300]">

                    Total Monthly Budget:
                    ₱{{ number_format($totalBudget,2) }}

                </div>

                <button
                    type="submit"
                    class="bg-[#F3C400] hover:bg-yellow-500 text-[#4D3900] font-bold px-8 py-3 rounded-xl transition">

                    Save Budget

                </button>

                <div class="text-xl font-semibold text-[#5D4300]">

                    Total Spent:
                    ₱{{ number_format($totalSpent,2) }}

                    &nbsp;&nbsp;—&nbsp;&nbsp;

                    Total Available:
                    ₱{{ number_format($totalBudget - $totalSpent,2) }}

                </div>

            </div>

        </form>

    </div>

</div>

@endsection