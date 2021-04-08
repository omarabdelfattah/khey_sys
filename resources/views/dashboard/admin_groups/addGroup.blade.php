@extends('dashboard.mosques.main_form')




@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="">
        {{ "إضافة مجموعة مشرفين" }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="#">إضافة مجموعة مشرفين</a></li>
    </ol>
    
</section>

@stop


@section('main_content')


@if(session('success'))
<script>
    Swal.fire({
    title: 'نجحت الإضافة',
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

@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>من فضلك حاول مجدداً</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<form action="{{ Route('store_admin_groups') }}" method="POST" >

    {{ method_field("PUT") }}

    {{ csrf_field() }}
    @include('dashboard.admin_groups.form')
</div>
@stop