<?php
namespace App\Core\Service\Products;

interface IProductsDeleteService
{
    public function deleteProduct(int $id): bool;
}
