<?php
namespace App\Core\Service\Products;

interface IProductsImportService
{
    public function importProducts(int $id): bool;
}
