<?php 

namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class ClientService
{
    protected $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository) // injeta a interface
    {
        $this->clientRepository = $clientRepository;
    }

    public function createNewClient(array $data)
    {
        return $this->clientRepository->createNewClient($data); //manda as informações para o nosso repositories
    }

}