@extends('dashboard.main_datatable')

@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="">
        {{ "إدارة الموارد" }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="#">إدارة الموارد</a></li>
    </ol>
    
</section>

@stop



@section('box-title','بيانات الموارد')

@section('main_content')

@if(session('success'))
<script>
    Swal.fire({
    title: 'تم حذف  المورد ',
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
<table id="resources" class="table table-bordered table-hover dataTable"
                                                role="grid" aria-describedby="resources_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="resources"
                                                            rowspan="1" colspan="1" aria-sort="ascending">
                                                            إسم المورد</th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="resources"
                                                            rowspan="1" colspan="1" aria-sort="ascending">
                                                            الكمية الشهرية</th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="resources"
                                                            rowspan="1" colspan="1" aria-sort="ascending">
                                                            المخزون</th>
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
         var table = $('#resources').DataTable({
            processing: true,
            serverSide: true,
            "scrollX": true,

             ajax: "{{ route('get_resources') }}",
            columns: [
                {
                    data: 'resource_name',
                    name: 'resource_name',
                    orderable: true,
                 },
                {
                    data: 'monthly_quantity',
                    name: 'monthly_quantity',
                    orderable: true,
                 },
                 {
                    data: 'stock_quantity',
                    name: 'stock_quantity',
                    orderable: true,
                 },
                {
                    data: 'action', 
                    name: 'action',
                      "render": function (data, type, row) {
                          
                        var btn_edit = '<a class="btn btn-success"  id="edit" ><i class="fa fa-edit"></i> تعديل</a>';
                        var btn_delete = '<form method="POST" style="display:inline;"  action="" id="delete_form" >  {{ method_field("DELETE") }} {{ csrf_field() }}  <button  type="submit" class="btn btn-danger delete_resource"  ><i class="fa fa-trash"></i> حذف</button> </form>';
                           
                        return btn_edit +
                         btn_delete ;
                    }
                },
            ]
            ,"rowCallback": function(row, data, index) {
                        
                        
                        $('td', row).addClass("text-center");
 
                        
 
                        $('td:eq(3)', row).find("a#edit").attr("href","{{ url('admin/edit_resource') }}/"+data.id);
                        $('td:eq(3)', row).find("form#delete_form").attr("action","{{ url('admin/delete_resource') }}/"+data.id);
                        $('td:eq(3)', row).find("button.delete_resource").attr("data-name",data.name);

                    }});
    $(document).on('click','.delete_resource',function(e){
        e.preventDefault();
        var name = $(this).data('name');
        var form = $(this).parents('form');

        Swal.fire({
            type: 'warning',
            title: "هل فعلاً تريد مسح المورد  ' "+name+" '",
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