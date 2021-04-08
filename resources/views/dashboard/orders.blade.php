@extends('dashboard.main_datatable')



@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="">
        {{ "إدارة الطلبات" }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="#">إدارة الطلبات</a></li>
    </ol>
    
</section>

@stop

@section('box-title','بيانات طلبات المساجد')


@section('main_content')


<table id="mosques" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="mosques_info">
    <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="mosques" rowspan="1" colspan="1" aria-sort="ascending">إسم المسجد</th>
            <th class="sorting" tabindex="0" aria-controls="mosques" rowspan="1" colspan="1">تاريخ الطلب</th>
            <th class="sorting" tabindex="0" aria-controls="mosques" rowspan="1" colspan="1">هل تم الموافقة علي الطلب؟</th>
            <th tabindex="0" rowspan="1" colspan="1">إدارة</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div class="modal fade in" id="order_modal" tabindex="-1" role="dialog" aria-labelledby="order_modal" aria-hidden="false" style="padding-right: 17px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <a class="close" data-dismiss="modal">×</a>
                <h3 >الطلب الشهري لمسجد <span class="mosq_name"></span></h3>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="order_details">
                    <thead>
                        <tr>
                            <th>المادة</th>
                            <th>المطلوب</th>
                            <th>المخزون</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="row">
                </div>                                                                               
                <br>
                <div class="row">
                    </div>
                <!-- End of order table -->
            </div>
            <div class="modal-footer">
                <div class="col-sm-6 text-center float-left">
                    <button class="btn btn-danger"  id="declined">رفض</button>
                </div>
                <div class="col-sm-6 text-center float-right">
                    <button class="btn btn-success" id="approved">تأكيد</button>
                </div>
            </div>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        </div>
    </div>
</div>
@stop
@section('user_scripts')
<script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
         var table = $('#mosques').DataTable({
            processing: true,
            "scrollX": true,
            serverSide: true,
            ajax: "{{ route('get_orders') }}",
            columns: [
                {
                    data: 'mosque_name',
                    name: 'mosque_name',
                    orderable: true,
                 },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: true,
                 },
                {
                    data: 'order_status',
                    name: 'status',
                     "render": function (data, type, row) {
                        var val = "ليس بعد";
                        if(data == 2){
                            val = "نعم"; 
                        }else if(data == 1){
                            val = "مرفوض"; 
                        }
                          return val;
                    }
                },
                {
                    data: 'action', 
                    name: 'action',
                      "render": function (data, type, row) {
                         var btn_edit = '<a data-toggle="modal" href="#order_modal" id="modal_open" class="btn btn-primary btn-large "><i class="fa fa-edit"></i> عرض التفاصيل</a>';
                        var btn_delete = '<form method="POST" style="display:inline;"  action="" id="delete_form" >  {{ method_field("DELETE") }} {{ csrf_field() }}  <button  type="submit" class="btn btn-danger delete_order"  ><i class="fa fa-trash"></i> حذف</button> </form>';
                           
                        return btn_edit +
                         btn_delete ;
                    }
                },
            ]
            ,"rowCallback": function(row, data, index) {
                        
                        
                        $('td', row).addClass("text-center");

                         var cellClass = "btn-warning"; 
                         if(data.order_status == 2){
                             cellClass = "btn-success"; 
                        }else if(data.order_status == 1){
                             cellClass = "btn-danger"; 
                        }
                        $('td:eq(2)', row).addClass(cellClass);
                        
                        $('td:eq(3)', row).find("a.btn").attr("order_id",data.id);
                        $('td:eq(3)', row).find("a.btn").attr("mosq_name",data.mosque_name);
                        $('td:eq(3)', row).find("a.btn").attr("status",data.order_status);

                        $('td:eq(3)', row).find("form#delete_form").attr("action","{{ url('admin/delete_order') }}/"+data.id);
                        $('td:eq(3)', row).find("button.delete_order").attr("data-name",data.name);

                    }});
</script>

<script type="text/javascript">
    var order_id;
    var mosque_name;
    var status;
$(document).ready( function () {
   // When user click on view order details
    $(document).on ("click", "#modal_open", function(){
        
        $("#order_details").dataTable().fnDestroy()

        order_id    = $(this).attr('order_id');
        mosque_name = $(this).attr('mosq_name');
        status      = parseInt($(this).attr('status'));
        $('.mosq_name').text(mosque_name)

        var  table = $('#order_details').DataTable({
            processing: true,
            "scrollX": true,
            serverSide: true,
            ajax:{ 
               "url": "{{ route('get_orders_details') }}",
               "data": {
                    "order_id": order_id
                }
               },
            columns: [
                {
                    data: 'resource_name',
                    name: 'resource_name',
                    orderable: true

                },
                {
                    data: 'monthly_quantity',
                    name: 'monthly_quantity',
                    orderable: true

                },
                {
                    data: 'stock_quantity',
                    name: 'stock_quantity',
                    orderable: true

                }
            ],
            retrieve: true,
            paging: false 
        });
    });
});

$('#approved').click(function(){
    if(order_id && status < 2){
         $.ajax({
            url : "{{ Route('order_approve') }}",
            method : "POST",
            data : { "id"       : order_id,
                    "_token"   : CSRF_TOKEN 
                    },
            datatype: 'application/json',
            success : function(response){
                 if(response.status == 200){
                    if(response.st){
                        Swal.fire({
                            title: 'تم قبول الطلب ',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'حسناً'
                        }).then(function(){
                            location.reload();
                        });
                    }
                }
            }
        });
    }
});

$('#declined').click(function(){
    if(order_id &&  ( status == 0 || status == 2) ){
        $.ajax({
            url : "{{ Route('order_decline') }}",
            method : "POST",
            data : { "id"       : order_id,
                    "_token"   : CSRF_TOKEN 
                    },        
            datatype: 'application/json',
            success : function(response){
                if(response.status == 200){
                    if(response.st){
                        Swal.fire({
                            title: 'تم رفض الطلب ',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'حسناً'
                        }).then(function(){
                            location.reload();
                        });                    
                    }
                }
            }
        });
    }
    
});
$(document).on('click','.delete_order',function(e){
        e.preventDefault();
        var name = $(this).data('mosq_name');
        var form = $(this).parents('form');

        Swal.fire({
            type: 'warning',
            title: "هل فعلاً تريد مسح  هذا الطلب ",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "نعم",
            cancelButtonText: "لا",
            showCancelButton: true,
            closeOnConfirm : false
        }).then((result) => {
            if(result.isConfirmed){
                form.submit();
            }
        });
    });
</script>
@stop