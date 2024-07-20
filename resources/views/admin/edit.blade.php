@php
    use Carbon\Carbon;
@endphp


@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Vehicle</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="plateNumber">رقم اللوحة</label>
                <input type="text" name="plateNumber" class="form-control" value="{{ $vehicle->plateNumber }}" required>
            </div>
            <div class="form-group">
                <label for="vehicleNumber">رقم الهيكل</label>
                <input type="text" name="vehicleNumber" class="form-control" value="{{ $vehicle->vehicleNumber }}"
                    required>
            </div>
            <div class="form-group">
                <label for="manufacturer">الشركة الصانعة</label>
                <input type="text" name="manufacturer" class="form-control" value="{{ $vehicle->manufacturer }}"
                    required>
            </div>
            <div class="form-group">
                <label for="carType">نوع السيارة</label>
                <input type="text" name="carType" class="form-control" value="{{ $vehicle->carType }}" required>
            </div>
            <div class="form-group">
                <label for="inspectionDate">تاريخ الفحص</label>
                <input type="date" name="inspectionDate" class="form-control"
                    value="{{ $vehicle->inspectionDate ? Carbon::parse($vehicle->inspectionDate)->format('Y-m-d') : '' }}"
                    required>
            </div>
            <div class="form-group">
                <label for="inspectionCompany">مركز الفحص</label>
                <input type="text" name="inspectionCompany" class="form-control"
                    value="{{ $vehicle->inspectionCompany }}" required>
            </div>
            <div class="form-group">
                <label for="serviceType">نوع الخدمة</label>
                <input type="text" name="serviceType" class="form-control" value="{{ $vehicle->serviceType }}" required>
            </div>
            <div class="form-group">
                <label for="dateOfEnd">تاريخ انتهاء صلاحية الفحص</label>
                <input type="date" name="dateOfEnd" class="form-control"
                    value="{{ $vehicle->dateOfEnd ? Carbon::parse($vehicle->dateOfEnd)->format('Y-m-d') : '' }}" required>
            </div>
            <div class="form-group">
                <label for="serialNumber">الرقم التسلسلي</label>
                <input type="text" name="serialNumber" class="form-control" value="{{ $vehicle->serialNumber }}"
                    required>
            </div>
            <div class="form-group">
                <label for="status">الحالة</label>
                <select name="status" class="form-control" required>
                    <option value="valid" {{ $vehicle->status == 'valid' ? 'selected' : '' }}>ساري</option>
                    <option value="expired" {{ $vehicle->status == 'expired' ? 'selected' : '' }}>منتهي</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">تحديث الفحص</button>
        </form>
    </div>
@endsection
