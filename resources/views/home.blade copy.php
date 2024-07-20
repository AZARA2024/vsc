@extends('layout')

@section('content')
    <main>
        <div class="bg_img">

            <div class="container main_content">

                <div>
                    <img src="/car.png" alt="">
                </div>

                <div>
                    <h2 class="first_header"> خدمة الفحص الفني الدوري </h2>

                    <p class="second_text">
                        يمكنك حجز موعد جديد أو تعديل أو إلغاء موعدك
                    </p>

                    <div class="btn_container">
                        <button>
                            حجز موعد
                        </button>
                        <button>
                            تعديل موعد
                        </button>
                        <button>
                            إلغاء موعد
                        </button>
                    </div>

                </div>

            </div>
        </div>


        <div class="main_banner_container">
            <div class="container">
                <div class="main_banner">
                    <div>
                        <p class="first_text">
                            يمكنك تحميل التطبيق الأن
                        </p>

                        <p class="second_text">
                            يمكنك حجز موعد الفحص عن طريق التطبيق سلامة المركبات
                        </p>
                    </div>
                    <div>

                        <img src="/google.png" alt="">
                        <img src="/apple.png" alt="">
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
