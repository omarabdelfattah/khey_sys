@include('front.header')

<!-- Start of navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">الخير</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    مسجد {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ Route('logout') }}">تسجيل الخروج</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- End of navbar -->




 <!-- End of header -->
<div class="content h-100">
    <div class="container">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="form-box col-sm-8 h-100">
                    <div class="row text-ceneter">
                        <h4 class="col-sm-12 text-center">شهر {{ now()->month}} / {{now()->year }} </h4>
                    </div>
                    <br><br><br>
                    @if($status == 0)
                        <h3 class="text-center">{{ "تم إرسال الطلب وجاري المراجعة" }}</h3>
                    @elseif($status == 2)
                        <h3 class="text-center">{{ "تم إرسال الطلب وتم الموافقة عليه" }}</h3>
                    @else
                        <h3 class="text-center">{{ "تم إرسال الطلب لكن تم رفضه" }}</h3>
                        <h4 class="text-center">{{ "يرجي التواصل مع الإدارة" }}</h4>
                    @endif

                </div>

            
            </div>  
    </div>
</div>
@include('front.footer')
 