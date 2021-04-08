@if(!isset($mosque))
 <script>
    window.location.href = "{{route('add_mosque')}}";
</script>
@endif  

@extends('dashboard.mosques.addMosque')



@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="">
        {{ "تعديل بيانات مسجد" }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{Route('mosques')}}">إدارة الموارد</a></li>
        <li><a href="">تعديل بيانات مسجد</a></li>
    </ol>
    
</section>

@stop

@section('box-title','تعديل بيانات مسجد')

@section('main_content')


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
<form action="{{ Route('update_mosque', ['id' => $mosque->id]) }}" method="POST" >

    {{ method_field("PATCH") }}

    {{ csrf_field() }}
    @include('dashboard.mosques.form')
</div>
@stop