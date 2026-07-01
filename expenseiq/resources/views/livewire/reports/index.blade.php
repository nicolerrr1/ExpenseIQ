<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

    <a href="{{ route('reports.export.csv') }}"
       class="bg-green-600 text-white px-4 py-2 rounded">
        Export CSV
    </a>

    <hr>

    <h1>Monthly Report</h1>

    <hr>

    <p>
        <strong>Total Budget:</strong>
        ₱{{ number_format($report['totalBudget'], 2) }}
    </p>

    <p>
        <strong>Total Expenses:</strong>
        ₱{{ number_format($report['totalExpenses'], 2) }}
    </p>

    <p>
        <strong>Remaining Budget:</strong>
        ₱{{ number_format($report['remainingBudget'], 2) }}
    </p>

    <hr>

    <h2>Category Summary</h2>

    @forelse($report['categorySummary'] as $category => $amount)

        <p>
            {{ $category }} —
            ₱{{ number_format($amount,2) }}
        </p>

    @empty

        <p>No expenses found.</p>

    @endforelse

</body>
</html>