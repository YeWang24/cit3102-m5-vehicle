<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $allowed = ['make', 'model', 'color'];   // whitelist
        $query = Vehicle::query();

        foreach ($allowed as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->query($field));
            }
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'make'  => 'required|string',
            'model' => 'required|string',
            'color' => 'required|string',
            'year'  => 'required|integer',
            'price' => 'required|integer',
        ]);

        return response()->json(Vehicle::create($data), 201);
    }

    public function show(Vehicle $vehicle)
    {
        return response()->json($vehicle);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'make'  => 'sometimes|required|string',
            'model' => 'sometimes|required|string',
            'color' => 'sometimes|required|string',
            'year'  => 'sometimes|required|integer',
            'price' => 'sometimes|required|integer',
        ]);

        $vehicle->update($data);
        return response()->json($vehicle);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return response()->noContent();
    }
}