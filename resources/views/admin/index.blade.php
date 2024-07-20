@php
    use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>الفحوصات</h1>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary">اضف فحص</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <tr>
                <th>ID</th>
                <th>رقم اللوحة</th>
                <th>رقم الهيكل</th>
                <th>الشركة الصانعة</th>
                <th>نوع السيارة</th>
                <th>تاريخ الفحص</th>
                <th>مركز الفحص</th>
                <th>نوع الخدمة</th>
                <th>تاريخ انتهاء صلاحية الفحص</th>
                <th>الرقم التسلسلي</th>
                <th>الحالة</th>
                <th>Actions</th>
            </tr>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->plateNumber }}</td>
                    <td>{{ $vehicle->vehicleNumber }}</td>
                    <td>{{ $vehicle->manufacturer }}</td>
                    <td>{{ $vehicle->carType }}</td>
                    <td>{{ $vehicle->inspectionDate ? Carbon::parse($vehicle->inspectionDate)->format('d-m-Y') : '' }}</td>
                    <td>{{ $vehicle->inspectionCompany }}</td>
                    <td>{{ $vehicle->serviceType }}</td>
                    <td>{{ $vehicle->dateOfEnd ? Carbon::parse($vehicle->dateOfEnd)->format('d-m-Y') : '' }}</td>
                    <td>{{ $vehicle->serialNumber }}</td>
                    <td>{{ $vehicle->status }}</td>
                    <td>
                        <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
