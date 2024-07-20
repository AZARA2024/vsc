@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>اضف بحث</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="plateNumber">رقم اللوحة:</label>
                <input type="text" name="plateNumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="vehicleNumber">رقم الهيكل:</label>
                <input type="text" name="vehicleNumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="manufacturer">الشركة الصانعة:</label>
                <input type="text" name="manufacturer" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="carType">نوع السيارة:</label>
                <input type="text" name="carType" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="inspectionDate">تاريخ الفحص:</label>
                <input type="date" name="inspectionDate" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="inspectionCompany">مركز الفحص:</label>
                <input type="text" name="inspectionCompany" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="serviceType">نوع الخدمة:</label>
                <input type="text" name="serviceType" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dateOfEnd">تاريخ انتهاء صلاحية الفحص</label>
                <input type="date" name="dateOfEnd" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="serialNumber">رقم التسلسل</label>
                <input type="text" name="serialNumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">الحالة</label>
                <select name="status" class="form-control" required>
                    <option value="valid">ساري</option>
                    <option value="expired">منتهي</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">اضف اللوحة</button>
        </form>
    </div>
@endsection
