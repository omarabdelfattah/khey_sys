@include('front.header')

<div class="container container d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-sm-6 code-form text-center">
                <h5>تسجيل الدخول</h5>
                <br>
                <form method="POST" action="{{Route('login')}}">
                {{ csrf_field() }}
                  <div class="form-group row">
                    <div class="col-sm-4">
                    <label for="code">اسم المستخدم </label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="username">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="code">كلمة المرور </label>
                    </div>	
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password">
                      </div>
                  </div>		  
                  <button name="submit" type="submit" class="btn btn-primary submit">دخول</button>
                </form>
            </div>
        </div>

@include('front.footer')