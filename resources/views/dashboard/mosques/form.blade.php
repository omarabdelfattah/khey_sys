    <div class="form-group">
        <label for="mosq_name" class=" control-label">إسم المسجد</label>
            <input type="text" class="form-control" id="mosq_name" name="name" placeholder="الإيمان" value="{{ isset($mosque->name) ?  $mosque->name  : old('name') }}">
    </div>

    <div class="form-group">
        <label for="username" class=" control-label">إسم المستخدم</label>
            <input type="text" class="form-control" id="username"  name="username"  placeholder="aleman53" value="{{ isset($mosque->username)  ?  $mosque->username  : old('username')  }}">
    </div>

    <div class="form-group">
        <label for="password" class=" control-label">كلمة المرور</label>
            <input type="password" class="form-control" id="password"  name="password" placeholder="" value="">
    </div>

    <div class="form-group">
        <label for="area" class=" control-label">المنطقة</label>
            <input type="text" class="form-control" id="area"  name="area" placeholder="خيطان .." value="{{ isset($mosque->area) ?  $mosque->area  : old('area')  }}">
    </div>
        
    <div class="form-group">
        <label for="emam" class=" control-label">الإمام</label>
            <input type="text" class="form-control" id="emam"   name="emam"  placeholder="محمد أحمد .." value="{{ isset($mosque->emam) ?  $mosque->emam  : old('emam')  }}">
    </div>

    <div class="form-group">
        <label for="moazen" class=" control-label">المؤذن</label>
            <input type="text" class="form-control" id="moazen" name="moazen" placeholder="محمد أحمد .." value="{{ isset($mosque->moazen) ?  $mosque->moazen  : old('moazen')  }}">
    </div>