@include('dashboard.layout.header')

    @include('dashboard.layout.sidebar')    


                        <div class="content-wrapper" style="min-height: 921px;">

                        @if(session('success'))
<script>
    Swal.fire({
    title: 'تم التعديل ',
    text: '{{session('success')}}',
    icon: 'success',
    confirmButtonText: 'حسناً'
})
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
    title: 'حدث خطأ!',
    text: '{{session('error')}}',
    icon: 'error',
    confirmButtonText: 'حسناً'
})
</script>
@endif
                        @yield('content-header')

                            
                            <!-- Main content -->
                            <section class="content">
                                <!-- Small boxes (Stat box) -->
                                <div class="row">

                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-green">
                                            <div class="inner">
                                                <h3>{{ $mosques_count }}</h3>
                                                <p>عدد المساجد</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></a>
                                        </div>
                                    </div><!-- ./col -->

                              

                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner">
                                                <h3>{{ $mosques_orderd }}</h3>
                                                <p>عدد المساجد التي طلبت هذا الشهر</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-ios-cart"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></a>
                                        </div>
                                    </div><!-- ./col -->

                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h3>{{ $no_order }}</h3>
                                                <p>عدد المساجد التي لم تطلب هذا الشهر</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion-ios-cart-outline"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></a>
                                        </div>
                                    </div><!-- ./col -->

                                    
                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-blue">
                                            <div class="inner">
                                                <h3>{{ $mosques_orderd }}</h3>
                                                <p>عدد الطلبات</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion-stats-bars"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></a>
                                        </div>
                                    </div><!-- ./col -->

                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-green">
                                            <div class="inner">
                                                <h3>{{ $orderd_accepted }}</h3>
                                                <p>عدد الطلبات الموافق عليها</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-checkmark-round"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></a>
                                        </div>
                                    </div><!-- ./col -->

                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-red">
                                            <div class="inner">
                                                <h3>{{ $orderd_declined }}</h3>
                                                <p>عدد الطلبات المرفوضة</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-close-round"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></a>
                                        </div>
                                    </div><!-- ./col -->

                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-blue">
                                            <div class="inner">
                                                <h3>{{ $orderd_waiting}}</h3>
                                                <p>عدد الطلبات المنتظر معالجتها</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-load-d"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></a>
                                        </div>
                                    </div><!-- ./col -->

                                    <div class="col-lg-3 col-xs-12">
                                        <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner">
                                                <h3>{{ $admin_count}}</h3>
                                                <p>عدد المشرفين</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-stalker"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></a>
                                        </div>
                                    </div><!-- ./col -->

                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-12 pull-right">
                                        <div class="box">
                                            <div class="box-header with-border">
                                            <i class="fa fa-bar-chart-o " style="color:Dodgerblue"></i>                                                
                                            <h4 class="box-title">نسبة المساجد التي قدمت طلب هذا الشهر  </h4> 
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                               @include('dashboard.landing.donut_chart')
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                    </div><!-- /.col -->

                                    <div class="col-md-6 col-xs-12 pull-right">
                                        <div class="box">
                                            <div class="box-header with-border">
                                            <i class="fa fa-bar-chart-o " style="color:Dodgerblue"></i>                                                
                                            <h4 class="box-title">نسبة قبول الطلبات  </h4> 
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                               @include('dashboard.landing.donut_chart2')
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </section><!-- /.content -->



                            <!-- /.box -->

                        </div>


@include('dashboard.layout.footer')
@section('user_scripts')
<script>

 
        /*
         * DONUT CHART
         * -----------
         */

        var donutData1 = [
          @foreach( $donut_parts1 as $donut_part )
            {label: "{{ $donut_part['name'] }}" , data: {{ $donut_part['size'] }}, color: "{{ $donut_part['color'] }}" },
          @endforeach 
        ];
        $.plot("#donut-chart1", donutData1, {
          series: {
            pie: {
              show: true,
              radius: 1,
              innerRadius: 0.5,
              label: {
                show: true,
                radius: 2 / 3,
                formatter: labelFormatter,
                threshold: 0.1
              }

            }
          },
          legend: {
            show: false
          }
        });

        var donutData2 = [
          @foreach( $donut_parts2 as $donut_part )
            {label: "{{ $donut_part['name'] }}" , data: {{ $donut_part['size'] }}, color: "{{ $donut_part['color'] }}" },
          @endforeach 
        ];
        $.plot("#donut-chart2", donutData2, {
          series: {
            pie: {
              show: true,
              radius: 1,
              innerRadius: 0.5,
              label: {
                show: true,
                radius: 2 / 3,
                formatter: labelFormatter,
                threshold: 0.1
              }

            }
          },
          legend: {
            show: false
          }
        });
        /*
         * END DONUT CHART
         */

      /*
       * Custom Label formatter
       * ----------------------
       */
      function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + "<br>"
                + Math.round(series.percent) + "%</div>";
      }

</script>
@end