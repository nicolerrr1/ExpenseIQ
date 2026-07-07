<?php

namespace App\Livewire\Reports;

use App\Models\Category;
use App\Services\ReportService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $month;

    public $category = 'all';

    public $report = [];

    public function mount(ReportService $reportService)
    {
        $this->month = now()->month;

        $this->loadReport($reportService);
    }

    public function updatedMonth(ReportService $reportService)
    {
        $this->loadReport($reportService);
    }

    public function updatedCategory(ReportService $reportService)
    {
        $this->loadReport($reportService);
    }

    private function loadReport(ReportService $reportService)
    {
        $this->report = $reportService->getMonthlyReport(
            Auth::id(),
            $this->month,
            now()->year,
            $this->category
        );

        $this->dispatch(
            'report-chart-updated',
            labels: $this->report['chartLabels'],
            data: $this->report['chartData'],
        );
    }

    public function render()
    {
        return view('livewire.reports.index', [
            'report' => $this->report,
            'categories' => Category::orderBy('category_name')->get(),
        ])->layout('layouts.app');
    }
}