<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

<h1>Dashboard</h1>

<hr>

<h2>Total Budget</h2>

<p>
₱{{ number_format($dashboard['totalBudget'],2) }}
</p>

<h2>Total Expenses</h2>

<p>
₱{{ number_format($dashboard['totalExpenses'],2) }}
</p>

<h2>Remaining Budget</h2>

<p>
₱{{ number_format($dashboard['remainingBudget'],2) }}
</p>

<h2>Total Expenses Recorded</h2>

<p>
{{ $dashboard['expenseCount'] }}
</p>

<hr>

<h2>Recent Expenses</h2>

@forelse($dashboard['recentExpenses'] as $expense)

<p>

{{ $expense->description }}

-

{{ $expense->category->category_name }}

-

₱{{ number_format($expense->amount,2) }}

</p>

@empty

<p>No expenses yet.</p>

@endforelse

</body>
</html>