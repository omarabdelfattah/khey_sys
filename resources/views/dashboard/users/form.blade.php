<div class="form-group">
    <label for="name">الإسم</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="أدخل الإسم" value="{{ isset($user->name) ?  $user->name  : old('name') }}">
</div>
<div class="form-group">
    <label for="username">إسم المستخدم</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="أدخل إسم المستخدم" value="{{ isset($user->username) ?  $user->username  : old('username') }}">
</div>
<div class="form-group">
    <label for="password"> كلمة المرور</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="أدخل كلمة المرور" >
</div>
<div class="form-group">
    <label for="role">نوع الحساب</label>
    <select name="role" class="form-control">
        @foreach( $groups as $group )
            <option value="{{ $group->id }}" {{ isset($user->role) && ($group->id == $user->role) ?  "selected"  : "" }} >{{ $group->name }}</option>
        @endforeach
    </select>
</div>