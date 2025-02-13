<?php

namespace App\Http\Controllers;

use App\Enums\CarFilterEnum;
use App\Enums\CarPartsFilterEnum;
use App\Http\Requests\CarFilterRequest;
use App\Http\Requests\CarPartsFilterRequest;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Http\Resources\PartResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarResource::collection(Car::latest()->paginate(20));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $car = Car::create($request->validated());

        if ($request->has('parts')) {
            foreach ($request->input('parts') as $part) {
                $car->parts()->create($part);
            }
        }
        return new CarResource($car);

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return new CarResource($car->load('parts'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        $car->update($request->validated());
        return new CarResource($car);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->noContent();

    }

    public function getCarParts(Car $car, CarPartsFilterRequest $request)
    {
        $filter = $request->query('filter', 'latest');

        $query = $car->parts();

        $query = $this->getFilteredPartsQuery($filter, $query);


        return PartResource::collection($query->paginate(20));
    }

    public function filter(CarFilterRequest $request)
    {
        $filter = $request->query('filter', CarFilterEnum::LATEST->value);
        $query = Car::query();


        $query = $this->getFilteredCarsQuery($filter, $query);

        return CarResource::collection($query->paginate(20));
    }

    private function getFilteredCarsQuery($filter, $query)
    {
        return match ($filter) {
            CarFilterEnum::LATEST->value => $query->latest(),
            CarFilterEnum::OLDEST->value => $query->oldest(),
            CarFilterEnum::REGISTERED->value => $query->where('is_registered', true),
            default => $query,
        };
    }


    private function getFilteredPartsQuery($filter, $query){
        return match ($filter) {
            CarPartsFilterEnum::LATEST->value => $query->latest(),
            CarPartsFilterEnum::OLDEST->value => $query->oldest(),
            CarPartsFilterEnum::NAME_ASC->value => $query->orderBy('name', 'asc'),
            CarPartsFilterEnum::NAME_DESC->value => $query->orderBy('name', 'desc'),
            CarPartsFilterEnum::SERIAL_ASC->value => $query->orderBy('serial_number', 'asc'),
            CarPartsFilterEnum::SERIAL_DESC->value => $query->orderBy('serial_number', 'desc'),
            default => null
        };
    }

}
