<?php

namespace App\Livewire\Website;

use App\Models\DeviceReport;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyReports extends Component
{
    use WithPagination;

    public $selectedReportId = null;
    public $showDetailModal = false;

    public function openReportDetails(int $reportId): void
    {
        $exists = DeviceReport::query()
            ->where('id', $reportId)
            ->where('admin_id', Auth::id())
            ->exists();

        if (!$exists) {
            return;
        }

        $this->selectedReportId = $reportId;
        $this->showDetailModal = true;
    }

    public function closeReportDetails(): void
    {
        $this->showDetailModal = false;
        $this->selectedReportId = null;
    }

    public function render()
    {
        $reports = DeviceReport::query()
            ->where('admin_id', Auth::id())
            ->latest()
            ->paginate(12);

        $selectedReport = null;
        if ($this->selectedReportId) {
            $selectedReport = DeviceReport::query()
                ->where('id', $this->selectedReportId)
                ->where('admin_id', Auth::id())
                ->first();
        }

        return view('livewire.website.my-reports', [
            'reports' => $reports,
            'selectedReport' => $selectedReport,
        ])->layout('livewire.website.layouts.app');
    }
}
