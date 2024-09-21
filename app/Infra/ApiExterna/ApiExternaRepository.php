<?php
namespace App\Infra\ApiExterna;

use App\Core\ApiExterna\IApiExternaRepository;
use App\Core\Support\APIExternaReponseModel;
use App\Infra\ApiExterna\Config\BaseConfigApiExterna;

class ApiExternaRepository extends BaseConfigApiExterna implements IApiExternaRepository
{
    public function getAllProducts(): APIExternaReponseModel
    {
        return $this->get('products', []);
    }

    public function getProductById(int $id): APIExternaReponseModel
    {
        return $this->get("products/". $id, []);
    }
}
