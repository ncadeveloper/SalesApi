<?php

namespace App\Services;

use App\Http\Requests\SellerStoreRequest;
use App\Http\Requests\SellerUpdateRequest;
use App\Repositories\Interfaces\SellerInterfaceRepository;
use App\Services\Interfaces\SellerInterface;

class SellerService implements SellerInterface
{
    private SellerInterfaceRepository $repository;

    public function __construct(SellerInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getSellers()
    {
        return $this->repository->all();
    }

    public function getSellerById($id)
    {
        return $this->repository->find($id);
    }

    public function createSeller(SellerStoreRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'commission' => $request->commission > 0 ? $request->commission : 8.5
        ];
        return $this->repository->create($data);
    }

    public function updateSeller($sellerId, SellerUpdateRequest $request)
    {
        $data = $request->all();
        return $this->repository->update($sellerId, $data);
    }

    public function deleteSeller($sellerId)
    {
        return $this->repository->delete($sellerId);
    }
}
