@extends('dashboard.main_datatable')

@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="">
        {{ "إدارة المساجد" }}
     </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="#">إدارة المساجد</a></li>
    </ol>
    
</section>

@stop



@section('box-title','بيانات المساجد')

@section('main_content')

@if(session('success'))
<script>
    Swal.fire({
    title: 'تم حذف المسجد ',
    text: '{{ session()->get('success') }}',
    icon: 'success',
    confirmButtonText: 'حسناً'
})
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
    title: 'حدث خطأ!',
    text: '{{ session()->get('error') }}',
    icon: 'error',
    confirmButtonText: 'حسناً'
})
</script>
@endif
<table id="mosques" class="table table-bordered table-hover dataTable"
                                                role="grid" aria-describedby="mosques_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="mosques"
                                                            rowspan="1" colspan="1" aria-sort="ascending">
                                                            إسم المسجد</th>
                                                        <th class="sorting" tabindex="0" aria-controls="mosques"
                                                            rowspan="1" colspan="1">
                                                            إسم المستخدم</th>
                                                        <th class="sorting" tabindex="0" aria-controls="mosques"
                                                            rowspan="1" colspan="1">
                                                            تاريخ التسجيل</th>
                                                            <th class="sorting" tabindex="0" aria-controls="mosques"
                                                            rowspan="1" colspan="1">
                                                            هل تم تحديث الطلبات هذا الشهر ؟</th>
                                                            <th class="sorting" tabindex="0" aria-controls="mosques"
                                                            rowspan="1" colspan="1">
                                                            المنطقة</th>
                                                            <th class="sorting" tabindex="0" aria-controls="mosques"
                                                            rowspan="1" colspan="1">
                                                            الإمام</th>
                                                            <th class="sorting" tabindex="0" aria-controls="mosques"
                                                            rowspan="1" colspan="1">
                                                            المؤذن</th>
                                                            <th  tabindex="0" rowspan="1" colspan="1">
                                                                إدارة</th>                                                    
                                                            </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
</table>

@stop

@section('user_scripts')
<script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
         var table = $('#mosques').DataTable({
            "scrollX": true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('get_mosques') }}",
            columns: [
                {
                    data: 'mosque_name',
                    name: 'mosque_name',
                    orderable: true,
                 },
                {
                    data: 'username',
                    name: 'username',
                    orderable: true,
                 },
                 {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: true,
                 },
                 {
                    data: 'monthly_order',
                    name: 'monthly_order',
                    orderable: true,
                    "render": function (data, type, row) {
                        if(data == 1){
                            val = "نعم"; 
                        }else if(data == 0){
                            val = "لا"; 
                        }
                          return val;
                    }
                 },
                 {
                    data: 'area',
                    name: 'area',
                    orderable: true,
                 },
                 {
                    data: 'emam',
                    name: 'emam',
                    orderable: true,
                 },
                 {
                    data: 'moazen',
                    name: 'moazen',
                    orderable: true,
                 },
                {
                    data: 'action', 
                    name: 'action',
                      "render": function (data, type, row) {
                          
                        var btn_edit = '<a class="btn btn-success"  id="edit" ><i class="fa fa-edit"></i> تعديل</a>';
                        var btn_delete = '<form method="POST" style="display:inline;"  action="" id="delete_form" >  {{ method_field("DELETE") }} {{ csrf_field() }}  <button  type="submit" class="btn btn-danger delete_mosque"  ><i class="fa fa-trash"></i> حذف</button> </form>';
                           
                        return btn_edit +
                         btn_delete ;
                    }
                },
            ]
            ,"rowCallback": function(row, data, index) {
                        
                        
                        $('td', row).addClass("text-center");

                         var cellClass = "btn-danger"; 
                         if(data.monthly_order == 1){
                             cellClass = "btn-success"; 
                        }else if(data.monthly_order == 0){
                             cellClass = "btn-danger"; 
                        }
                        $('td:eq(3)', row).addClass(cellClass);
                        
                        $('td:eq(3)', row).find("a.btn").attr("order_id",data.id);

                        $('td:eq(7)', row).find("a#edit").attr("href","{{ url('admin/edit_mosq') }}/"+data.id);
                        $('td:eq(7)', row).find("form#delete_form").attr("action","{{ url('admin/delete_mosque') }}/"+data.id);
                        $('td:eq(7)', row).find("button.delete_mosque").attr("data-name",data.name);

                    }});
    $(document).on('click','.delete_mosque',function(e){
        e.preventDefault();
        var name = $(this).data('name');
        var form = $(this).parents('form');

        Swal.fire({
            type: 'warning',
            title: "هل فعلاً تريد مسح مسجد "+name,
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