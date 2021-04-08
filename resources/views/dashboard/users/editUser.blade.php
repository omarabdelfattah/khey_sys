@if(!isset($user))
 <script>
    window.location.href = "{{route('add_user')}}";
</script>
@endif  

@extends('dashboard.users.addUser')



@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="">
        {{ "تعديل بيانات مستخدم" }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{Route('users')}}">إدارة المستخدمين</a></li>
        <li><a href="">تعديل بيانات مستخدم</a></li>
    </ol>
    
</section>

@stop

@section('box-title','تعديل بيانات مستخدم')

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
<form action="{{ Route('update_user', ['id' => $user->id]) }}" method="POST" >

    {{ method_field("PATCH") }}

    {{ csrf_field() }}
    @include('dashboard.users.form')
</div>
@stop