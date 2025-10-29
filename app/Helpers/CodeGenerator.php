<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\CarInfo;

class CodeGenerator
{
    /**
     * Generate auto-incremental code
     *
     * Format: {Prefix}{YYMMDD}-{6 digit sequence}
     * Example: A250831-000001
     */
    public static function generate(string $prefix): string
    {
        // Today's date in YYMMDD
        $datePart = Carbon::now()->format('ymd');

        // Build prefix with date
        $baseCode = $prefix . $datePart;

        // Find latest code from DB
        $latest = CarInfo::where('car_detail_id', 'like', $baseCode . '-%')
            ->orderBy('car_detail_id', 'desc')
            ->value('car_detail_id');

        if ($latest) {
            // Extract number part
            $lastNumber = (int) substr($latest, -6);
            $newNumber = str_pad($lastNumber + 1, 6, '0', STR_PAD_LEFT);
        } else {
            $newNumber = "000001";
        }

        return $baseCode . '-' . $newNumber;
    }
}
