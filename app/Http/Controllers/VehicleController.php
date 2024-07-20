<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('admin.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plateNumber' => 'required',
            'vehicleNumber' => 'required|unique:vehicles',
            'manufacturer' => 'required',
            'carType' => 'required',
            'inspectionDate' => 'required|date',
            'inspectionCompany' => 'required',
            'serviceType' => 'required',
            'dateOfEnd' => 'required|date',
            'serialNumber' => 'required|unique:vehicles',
            'status' => 'required|in:valid,expired',
        ]);
    
        // Format the dates and merge into request data
        $request->merge([
            'inspectionDate' => Carbon::parse($request->input('inspectionDate'))->toDateString(),
            'dateOfEnd' => Carbon::parse($request->input('dateOfEnd'))->toDateString(),
        ]);

        dd($request);
    
        // Create the vehicle with all request data
        Vehicle::create($request->all());
    
        return redirect()->route('home')->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('admin.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plateNumber' => 'required',
            'vehicleNumber' => 'required|unique:vehicles,vehicleNumber,' . $id,
            'manufacturer' => 'required',
            'carType' => 'required',
            'inspectionDate' => 'required|date',
            'inspectionCompany' => 'required',
            'serviceType' => 'required',
            'dateOfEnd' => 'required|date',
            'serialNumber' => 'required|unique:vehicles,serialNumber,' . $id,
            'status' => 'required|in:valid,expired',
        ]);

        $request->merge([
            'inspectionDate' => Carbon::parse($request->input('inspectionDate'))->format('Y-m-d'),
            'dateOfEnd' => Carbon::parse($request->input('dateOfEnd'))->format('Y-m-d'),
        ]);
    
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()->route('home')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('home')->with('success', 'Vehicle deleted successfully.');
    }

    public function search(Request $request)
    {
        $request->validate([
            'serialNumber' => 'required',
            'vehicleNumber' => 'required',
        ]);

        $vehicle = Vehicle::where('serialNumber', $request->serialNumber)
                          ->where('vehicleNumber', $request->vehicleNumber)
                          ->first();

        if ($vehicle) {
            return view('inspection', compact('vehicle'));
        } else {
            return view('inspection', ['error' => 'لا توجد بيانات لهذه المركبة']);
        }
    }
}
