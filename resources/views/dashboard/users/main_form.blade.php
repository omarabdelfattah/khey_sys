@include('dashboard.layout.header')

          @include('dashboard.layout.sidebar')
                        <div class="content-wrapper" style="min-height: 921px;">
                        
                        @yield('content-header')
                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box box-success ">
                                            <div class="box-header">
                                                <!-- <h3 class="box-title">@yield('box-title',' ')</h3> -->
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                                            @yield('main_content')
                                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-success">إرسال</button>
                                            </div>
                                            </div><!-- /.box-body -->
                                          
                                        </div><!-- /.box -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </section><!-- /.content -->
                            <!-- /.box -->
                        </div>


@include('dashboard.layout.footer')
