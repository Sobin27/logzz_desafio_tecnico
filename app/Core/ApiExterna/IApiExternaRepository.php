<?php
namespace App\Core\ApiExterna;

interface IApiExternaRepository
{
    public function getAllProducts();
    public function getProductById(int $id);
}
