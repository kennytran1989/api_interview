<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Services\CSVServices;
class ExportProductToCSVCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:exportCSV';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export All Product To CSV php artisan make:command PostCommand And Store it';

    protected $CSVServices;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->CSVServices = app(CSVServices::class);

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->CSVServices->exportCSVAndStorage();
    }
}
