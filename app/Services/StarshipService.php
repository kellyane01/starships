<?php

namespace App\Services;

use App\Repositories\StarshipRepository;

class StarshipService
{
    protected $starshipRepository;

    public function __construct(StarshipRepository $starshipRepository)
    {
        $this->starshipRepository = $starshipRepository;
    }

    public function getAll()
    {
        return $this->starshipRepository->getAll();
    }

    public function create(array $data)
    {
        $data['id'] = $this->getNextId();
        $data['created'] = now();
        return $this->starshipRepository->create($data);
    }

    public function getById($id)
    {
        return $this->starshipRepository->find($id);
    }

    public function getNextId()
    {
        $starships = $this->starshipRepository->getAll();

        if (empty($starships)) {
            return 1;
        }

        $lastId = max(array_column($starships, 'id'));

        $nextId = $lastId + 1;

        return "$nextId";
    }

    public function update($id, array $data)
    {
        $data['edited'] = now();
        return $this->starshipRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->starshipRepository->delete($id);
    }
}
