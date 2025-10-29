<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

trait PromotionExpiryTrait
{
    /**
     * Check and mark expired promotions, and update related CarSelectedPromos.
     */
    public static function checkExpiredPromos(): void
    {
        $now = Carbon::now();
        $table = (new static)->getTable();

        // Get expired promotion IDs
        $expiredIds = DB::table($table)
            ->where('is_expired', 0)
            ->whereRaw("CONCAT(end_date, ' ', end_time) < ?", [$now])
            ->pluck('promotion_id');

        if ($expiredIds->isNotEmpty()) {
            // Mark those promos as expired
            DB::table($table)
                ->whereIn('promotion_id', $expiredIds)
                ->update(['is_expired' => 1]);

            // Also expire CarSelectedPromos linked to them
            DB::table('car_selected_promos')
                ->whereIn('promotion_id', $expiredIds)
                ->update(['is_expired' => 1]);
        }
    }

    public static function activePromos()
    {
        return static::where('is_expired', 0)->get();
    }

    public static function expiredPromos()
    {
        return static::where('is_expired', 1)->get();
    }
}
