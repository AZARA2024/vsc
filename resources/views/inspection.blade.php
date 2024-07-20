@extends('layout')

@section('content')
    <div class="container">
        <div class="inspection">
            @if (isset($error))
                <div class="alert_container">
                    {{ $error }}
                </div>
            @endif

            <h1 class="first_header">
                التحقق من حالة الفحص
            </h1>

            @if (isset($vehicle))
                <div
                    class="inspection_card 
        {{ isset($vehicle->status) && $vehicle->status == 'expired' ? 'expired_border' : 'valid_border' }}">

                    @if ($vehicle->status == 'expired')
                        <div class="inspection_header expired">
                            <x-bi-exclamation-circle-fill />
                            <div>
                                منتهي الصلاحية
                            </div>
                        </div>
                    @else
                        <div class="inspection_header valid">
                            <x-akar-circle-check />
                            <div>
                                صالح وساري
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <div>
                            <div scope="row">رقم اللوحة:</div>
                            <div>{{ $vehicle->plateNumber }}</div>
                        </div>
                        <div>
                            <div scope="row">رقم الهيكل:</div>
                            <div>{{ $vehicle->vehicleNumber }}</div>
                        </div>
                        <div>
                            <div scope="row">الشركة الصانعة:</div>
                            <div>{{ $vehicle->manufacturer }}</div>
                        </div>
                        <div>
                            <div scope="row">نوع السيارة:</div>
                            <div>{{ $vehicle->carType }}</div>
                        </div>
                        <div>
                            <div scope="row">تاريخ الفحص:</div>
                            <div>
                                {{ \Carbon\Carbon::parse($vehicle->inspectionDate)->format('d/m/Y') }}
                            </div>
                        </div>
                        <div>
                            <div scope="row">مركز الفحص:</div>
                            <div>{{ $vehicle->inspectionCompany }}</div>
                        </div>
                        <div>
                            <div scope="row">نوع الخدمة:</div>
                            <div>{{ $vehicle->serviceType }}</div>
                        </div>
                        <div>
                            <div scope="row">تاريخ انتهاء
                                صلاحية الفحص:
                            </div>
                            <div>{{ \Carbon\Carbon::parse($vehicle->dateOfEnd)->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="choose"> اختر حالة المركبة </p>

                <div class="options">
                    <div>
                        <button class="btn_green">
                            تحمل إستمارة
                        </button>
                    </div>
                    <div>
                        <button>
                            تحمل بطاقة جمركية
                        </button>
                    </div>
                    <div>
                        <button>
                            مركبة غير سعودية
                        </button>
                    </div>
                </div>

                <form action="{{ route('vehicles.search') }}" method="POST">
                    @csrf
                    <input type="text" name="vehicleNumber" id="vehicleNumber" class="form-control"
                        placeholder="ادخل رقم الهيكل" required value="{{ old('vehicleNumber') }}">
                    @if ($errors->has('vehicleNumber'))
                        <span class="text-danger">{{ $errors->first('vehicleNumber') }}</span>
                    @endif
                    <input type="text" name="serialNumber" id="serialNumber" class="form-control"
                        placeholder="ادخل الرقم التسلسلي" required value="{{ old('serialNumber') }}">
                    @if ($errors->has('serialNumber'))
                        <span class="text-danger">{{ $errors->first('serialNumber') }}</span>
                    @endif

                    <button type="submit">بحث</button>
                </form>
            @endif
        </div>
    </div>
@endsection
