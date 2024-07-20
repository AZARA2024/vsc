<div class='mobile_nav'>
    <div class="menu-toggle" id="menuToggle">
        <div class="hamburger"></div>
    </div>
    <nav id="sidebar" class="sidebar">
        <ul>
            <li><a href="/">الرئيسية</a></li>
            <li><a href="#">حجز موعد</a></li>
            <li><a href="#">تعديل موعد</a></li>
            <li><a href="#">إلغاء موعد</a></li>
            <li><a href="/ar/inspection-status">التحقق من حالة الفحص</a></li>
            <li><a href="#">إتصل بنا</a></li>
        </ul>
    </nav>
</div>
<nav class='desktop_nav'>

    <div class="container">
        <div class="wrapper">
            <div>
                <a href="/" class="{{ isset($page) && $page === 'home' ? 'active' : ' ' }}">
                    <x-entypo-home class="home_icon" />
                    الرئيسية
                </a>
            </div>
            <div>
                <a href="/">
                    حجز موعد
                </a>
            </div>
            <div>
                <a href="/">
                    تعديل موعد
                </a>
            </div>
            <div>
                <a href="/">
                    إلغاء موعد
                </a>
            </div>
            <div>
                <a href="/ar/inspection-status" class="{{ isset($page) && $page === 'inspection' ? 'active' : ' ' }}">
                    التحقق من حالة الفحص
                </a>
            </div>
            <div>
                <a href="/">
                    إتصل بنا
                </a>
            </div>
        </div>
    </div>
</nav>
