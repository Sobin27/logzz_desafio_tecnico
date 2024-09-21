<?php

namespace App\Console\Commands;

use App\Core\Service\Products\IProductsImportService;
use Illuminate\Console\Command;

class ProductsImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:import {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(IProductsImportService $importService): bool
    {
        $productId = $this->option('id');
        return $importService->importProducts($productId);
    }
}
