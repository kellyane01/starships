<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStarshipRequest;
use App\Services\StarshipService;

class StarshipController extends Controller
{
    protected $starshipService;

    public function __construct(StarshipService $starshipService)
    {
        $this->starshipService = $starshipService;
    }

    public function index()
    {
        $starships = $this->starshipService->getAll();
        return response()->json($starships);
    }

    public function store(StoreStarshipRequest $request)
    {
        $starship = $this->starshipService->create($request->all());
        return response()->json(['message' => 'Espaçonave criada com sucesso!', 'starship' => $starship], 201);
    }

    public function show($id)
    {
        $starship = $this->starshipService->getById($id);
        return response()->json($starship);
    }

    public function update(StoreStarshipRequest $request, $id)
    {
        $updatedStarship = $this->starshipService->update($id, $request->all());
        return response()->json($updatedStarship);
    }

    public function destroy($id)
    {
        $this->starshipService->delete($id);
        return response()->json(['message' => 'Espaçonave deletada com sucesso!']);
    }
}
