<?php

namespace App\Console\Commands;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Http\Controllers\FieldMeterReadingController;

class ProcessWaterBillCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'waterbill:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process water bill';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fieldMeterReadingController = new FieldMeterReadingController();

        // Replace the following with your request data
        $requestData = [
            'current_month' => '2024-01-01',
            'next_month' => '2024-02-01',
            'read_date' => '2024-02-15',
            'reading_meter' => 139,  // replace with actual values
            'meter_reading' => 138, //from database
            'customer_id' => '011-2021-0002',
            'id' => 10, //reader account id
        ];

        $request = Request::create('', 'POST', $requestData);
        $response = $fieldMeterReadingController->store($request);

        $this->info($response);
    }
}
