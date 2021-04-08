@include('dashboard.layout.header')

    @include('dashboard.layout.sidebar')    


                        <div class="content-wrapper" style="min-height: 921px;">
                        
                        @yield('content-header')

                            
                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">@yield('box-title',' ')</h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                                <div id="mosques_wrapper" class="dataTables_wrapper form-inline dt-bootstrap ">
                                                    <div class="row">
                                                        <div class="col-sm-6"></div>
                                                        <div class="col-sm-6"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            @yield('main_content')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </section><!-- /.content -->



                            <!-- /.box -->

                        </div>


@include('dashboard.layout.footer')
