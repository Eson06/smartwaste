<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;
use App\Models\trash_collection;
use Illuminate\Support\Facades\DB;


class Dashboard extends Component
{
    public function render()
{
    // === Chart 1: Drivers per Barangay ===
    $driverData = Schedule::select('barangay')
        ->selectRaw('COUNT(DISTINCT driver_id) as total_drivers')
        ->groupBy('barangay')
        ->get();

    $barangays = $driverData->pluck('barangay');
    $totals = $driverData->pluck('total_drivers');

    // === Chart 2: Total Garbage per Barangay (single total per barangay) ===
    $garbageData = trash_collection::select('collection_barangay')
        ->selectRaw('SUM(collection_kilogram) as total_kg')
        ->groupBy('collection_barangay')
        ->get();

    $garbageBarangays = $garbageData->pluck('collection_barangay');
    $garbageTotals = $garbageData->pluck('total_kg');

    // === Chart 3: Sorted Garbage per Barangay (grouped/stacked by type) ===
    $sortedData = DB::table('trash_collections')
        ->select('collection_barangay', 'collection_type', DB::raw('SUM(collection_kilogram) as total_kg'))
        ->groupBy('collection_barangay', 'collection_type')
        ->get();

    // Unique barangays and types (preserve order)
    $sortedBarangays = $sortedData->pluck('collection_barangay')->unique()->values();
    $sortedTypes = $sortedData->pluck('collection_type')->unique()->values();

    // Build datasets per type for stacked/grouped chart
    $colors = ['#1E88E5', '#43A047', '#FB8C00', '#E53935', '#8E24AA', '#00ACC1', '#FDD835'];
    $sortedDatasets = [];

    foreach ($sortedTypes as $index => $type) {
        $sortedDatasets[] = [
            'label' => $type,
            'backgroundColor' => $colors[$index % count($colors)],
            'data' => $sortedBarangays->map(function ($barangay) use ($sortedData, $type) {
                $found = $sortedData->first(function ($item) use ($barangay, $type) {
                    return $item->collection_barangay === $barangay && $item->collection_type === $type;
                });
                return $found ? (float) $found->total_kg : 0;
            })->values()->all(),
            'borderRadius' => 8,
            'borderSkipped' => false,
        ];
    }

    // --- NEW: compute sortedTotals (sum of all types per barangay) ---
    $sortedTotals = $sortedBarangays->map(function ($barangay) use ($sortedData) {
        return (float) $sortedData
            ->filter(function ($item) use ($barangay) {
                return $item->collection_barangay === $barangay;
            })
            ->sum('total_kg');
    })->values()->all();

    return view('livewire.dashboard', [
        // Drivers chart
        'barangays' => $barangays,
        'totals' => $totals,

        // Total garbage chart
        'garbageBarangays' => $garbageBarangays,
        'garbageTotals' => $garbageTotals,

        // Sorted garbage chart (both forms)
        'sortedBarangays' => $sortedBarangays,
        'sortedDatasets' => $sortedDatasets,
        'sortedTotals' => $sortedTotals, // <-- now defined & returned
    ]);
}

}
