<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;
use Illuminate\Support\Facades\Log;

class RunIsExpiredPromotionCampaigns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-is-expired-promotion-campaigns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {

        } catch (Exception $e) {
            Log::error('Error::CAR_PROMOTION_IS_EXPIRED, Message: ' . $e->getMessage() . ' Line No: ' . $e->getLine());
        }
    }
}
