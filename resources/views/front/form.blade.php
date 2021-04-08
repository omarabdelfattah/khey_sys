@include('front.header')

    <!-- Start of navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">الخير</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

    <!-- Start of header -->
    <div class=" header justify-content-center text-center">
        <div class="container">
            <h3 class="">مرحبا بك مسؤول مسجد {{ Auth::user()->name }}</h3>
            <p class="lead">يمكنك هنا إضافة وتسجيل متطلبات المسجد كل شهر</p>
        </div>
    </div>


    <!-- End of header -->
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="form-box col-sm-8 h-100">
                <div class="row text-ceneter">
                    <h4 class="col-sm-12 text-center">شهر {{ now()->month}} / {{now()->year }}  </h4>
                </div>
                <form class="form-wrapper" action="{{Route('save_order')}}" method="POST">
                {{ method_field("PUT") }}
                    {{ csrf_field() }}
                    
                    <div class="container">
                        
                        <div class="form-group row">
                            <label for="inputmosq_manager_name" class="col-sm-4 col-form-label">إسم مقدم الطلب</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="inputmosq_manager_name"
                                    id="inputmosq_manager_name" placeholder="محمد علي">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputmosq_manager_phone" class="col-sm-4 col-form-label">رقم الهاتف</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="inputmosq_manager_phone"
                                    id="inputmosq_manager_phone" placeholder="0123456789100">

                            </div>
                        </div>

                        <div class=" row">
                            <div class="form-group ">
                                <label class="col-form-label col"><span>-</span> المسجد يحتاج مواد نظافة هذا الشهر ؟</label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12 col-md-12">
                                <div class=" custom-control custom-radio custom-control">
                                    <input type="radio" id="stat1" name="input_monthly_needs"
                                        class="custom-control-input"  value="0" onchange="no_need()">
                                    <label class="custom-control-label" for="stat1">لا يحتاج مواد نظافة</label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <div class=" custom-control custom-radio custom-control">
                                    <input type="radio" id="stat2" name="input_monthly_needs"
                                        class="custom-control-input" value="1"  onchange="no_need()">
                                    <label class="custom-control-label" for="stat2">يحتاج مواد النظافة كامة</label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <div class="custom-control custom-radio custom-control">
                                    <input type="radio" id="stat3" name="input_monthly_needs"
                                        class="custom-control-input" value="2"  onchange="need()">
                                    <label class="custom-control-label" for="stat3"> يحتاج الي مواد نظافة ولا يحتاج
                                        للأخرى</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group ">
                                <label class="col-form-label col"><span>-</span> حدد المواد المطلوبة</label>
                            </div>
                        </div>
                    
                    @foreach($resources as  $resource )

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12 col-md-12">
                                <div class=" custom-control custom-checkbox custom-control">
                                    <input type="checkbox" id="mat_{{ $resource->id }}" name="order_items[]"
                                        class="custom-control-input mat " value="{{$resource->id}}" disabled >
                                        <label class="custom-control-label" for="mat_{{ $resource->id }}">{{ $resource->name }}</label>
                                    </div>
                            </div>
                        </div>
                    @endforeach            
                    <div class="col-sm-12 form-group  text-center">
                        <button type="submit" class="btn btn-primary mb-2">إرسال</button>
                    </div>
                </div>
                </form>
            </div>
           
        </div>  
        </div>
    </div>
    @include('front.footer')
