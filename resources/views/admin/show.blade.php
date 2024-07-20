@extends('layouts.app')

@section('content')
    <div class="logo_container">
        <img src="/salamah-logo.svg" alt="">
    </div>
    <div class="container mt-5">
        <div
            class="inspection_card {{ $vehicle ? 'valid_border' : 'unknown_border' }} 
        {{ isset($vehicle->status) && $vehicle->status == 'expired' ? 'expired_border' : '' }}">


            @if ($vehicle)
                @if ($vehicle->status == 'expired')
                    <div class="inspection_header expired">
                        <x-bi-exclamation-circle-fill />
                        <div>
                            منتهي الصلاحية
                        </div>
                    </div>
                @else
                    <div class="inspection_header valid">
                        <img src="/valid.svg" alt="">
                        <div>
                            صالح وساري
                        </div>
                    </div>
                @endif
            @else
                <div class="inspection_header unknown">
                    <img src="/unknown.svg" alt="">
                    <div>
                        غير معروف
                    </div>
                </div>
            @endif

            <div class="card-body">
                <div>
                    <div scope="row">رقم اللوحة:</div>
                    <div>{{ $vehicle ? $vehicle->plateNumber : 'غير معروف ' }}</div>
                </div>
                <div>
                    <div scope="row">رقم الهيكل:</div>
                    <div>{{ $vehicle ? $vehicle->vehicleNumber : 'غير معروف ' }}</div>
                </div>
                <div>
                    <div scope="row">الشركة الصانعة:</div>
                    <div>{{ $vehicle ? $vehicle->manufacturer : 'غير معروف ' }}</div>
                </div>
                <div>
                    <div scope="row">نوع السيارة:</div>
                    <div>{{ $vehicle ? $vehicle->carType : 'غير معروف ' }}</div>
                </div>
                <div>
                    <div scope="row">تاريخ الفحص:</div>
                    <div>{{ $vehicle ? \Carbon\Carbon::parse($vehicle->inspectionDate)->format('d/m/Y') : 'غير معروف ' }}
                    </div>
                </div>
                <div>
                    <div scope="row">مركز الفحص:</div>
                    <div>{{ $vehicle ? $vehicle->inspectionCompany : ' ' }}</div>
                </div>
                <div>
                    <div scope="row">نوع الخدمة:</div>
                    <div>{{ $vehicle ? $vehicle->serviceType : 'غير معروف ' }}</div>
                </div>
                <div>
                    <div scope="row">تاريخ انتهاء
                        <br />صلاحية الفحص:
                    </div>
                    <div>{{ $vehicle ? \Carbon\Carbon::parse($vehicle->dateOfEnd)->format('d/m/Y') : 'غير معروف ' }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="logos_container">
        <img src="/saudi.svg" alt="">
        <img src="/2030.svg" alt="">
    </div>
@endsection
