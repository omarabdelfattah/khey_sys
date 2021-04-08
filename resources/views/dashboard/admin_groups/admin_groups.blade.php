@extends('dashboard.main_datatable')

@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="">
        {{ "إدارة مجموعات المشرفين" }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="#">إدارة مجموعات المشرفين</a></li>
    </ol>
    
</section>

@stop



@section('box-title','بيانات مجموعات المشرفين')

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
<table id="admin_groups" class="table table-bordered table-hover dataTable text-center"
                                                role="grid" aria-describedby="admin_groups_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th >إسم المجموعة</th>
                                                        <th>إدارة</th>                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
</table>

@stop

@section('user_scripts')
<script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
         var table = $('#admin_groups').DataTable({
            "scrollX": true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('get_admin_groups') }}",
            columns: [
                {
                    data: 'admin_group_name',
                    name: 'admin_group_name',
                    orderable: false,
                 },
                {
                    data: 'action', 
                    name: 'action',
                    orderable: false,
                      "render": function (data, type, row) {
                          
                        var btn_edit = '<a class="btn btn-success"  id="edit" ><i class="fa fa-edit"></i> تعديل</a>';
                        var btn_delete = '<form method="POST" style="display:inline;"  action="" id="delete_form" >  {{ method_field("DELETE") }} {{ csrf_field() }}  <button  type="submit" class="btn btn-danger delete_admin_group"  ><i class="fa fa-trash"></i> حذف</button> </form>';
                           
                        return btn_edit +
                         btn_delete ;
                    }
                },
            ]
            ,"rowCallback": function(row, data, index) {
                        
                        
                        

                        $('td:eq(1)', row).find("a#edit").attr("href","{{ url('admin/edit_admin_group') }}/"+data.id);
                        $('td:eq(1)', row).find("form#delete_form").attr("action","{{ url('admin/delete_admin_group') }}/"+data.id);
                        $('td:eq(1)', row).find("button.delete_admin_group").attr("data-name",data.name);

                    }});
    $(document).on('click','.delete_admin_group',function(e){
        e.preventDefault();
        var name = $(this).data('name');
        var form = $(this).parents('form');

        Swal.fire({
            type: 'warning',
            title: "هل فعلاً تريد مسح مجموعة "+name,
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