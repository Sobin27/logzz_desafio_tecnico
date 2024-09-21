<?php
namespace App\Infra\ApiExterna\Config;

use App\Core\Support\APIExternaReponseModel;
use App\Exceptions\InternalServerErrorException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class BaseConfigApiExterna
{
    private Response $request;
    private APIExternaReponseModel $response;

    public function get(string $path, array $data): APIExternaReponseModel
    {
        $this->request = $this->getRequest()->get($this->url($path), $data);
        $this->setResponse();
        return $this->response;
    }
    private function getRequest(): PendingRequest
    {
        return Http::withOptions(['verify' => false]);
    }

    /**
     * @throws \Exception
     */
    private function url(string $path): string
    {
        if (preg_match('/^\/.*$/', $path)) {
            throw new \Exception('Erro interno no servidor');
        }
        return env('API_EXTERNA') . $path;
    }
    private function setResponse(): void
    {
        $this->response = new APIExternaReponseModel();
        $this->response->statusCode = $this->request->status();
        $this->response->data = $this->request->json();

    }
}
