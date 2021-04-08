<div class="form-group">
                                    <label for="name" class=" control-label">إسم المجموعة</label>
                                      <input type="text" class="form-control" id="name"  name="name" placeholder=" "  value="{{ isset($admin_group->name)  ?  $admin_group->name  : old('name','')  }}">
                                </div>   
                                <div id="mosques_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">                                           
                                            <table class="table table-striped table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>الصلاحية</th>
                                                        <th>عرض</th>
                                                        <th>إضافة</th>
                                                        <th>تعديل</th>
                                                        <th>حذف</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>المساجد</td>
                                                            <td> <input type="checkbox" name="mosques_show"     value="1" {{ isset($admin_group->mosques_show) && ($admin_group->mosques_show)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="mosques_add"       value="1" {{  isset($admin_group->mosques_add) && ($admin_group->mosques_add)  ? "checked"  :  "" }} > </td>
                                                            <td> <input type="checkbox" name="mosques_edit"      value="1" {{ ( isset($admin_group->mosques_edit) && $admin_group->mosques_edit)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="mosques_delete"    value="1" {{  isset($admin_group->mosques_delete) && ($admin_group->mosques_delete)  ? "checked"  :  ""  }} > </td>
                                                        </tr>
                                                        <tr>
                                                            <td>الطلبات</td>
                                                            <td> <input type="checkbox" name="orders_show"     value="1" {{ isset($admin_group->orders_show) && ($admin_group->orders_show)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="orders_add"      value="1" {{ isset($admin_group->orders_add) && ($admin_group->orders_add)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="orders_edit"     value="1" {{ isset($admin_group->orders_edit) && ($admin_group->orders_edit)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="orders_delete"   value="1" {{ isset($admin_group->orders_delete) && ($admin_group->orders_delete)  ? "checked"  :  ""  }} > </td>
                                                        </tr>
                                                        <tr>
                                                            <td>الموارد</td>
                                                            <td> <input type="checkbox" name="resources_show"     value="1" {{ isset($admin_group->resources_show) && ($admin_group->resources_show)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="resources_add"      value="1" {{ isset($admin_group->resources_add) && ($admin_group->resources_add)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="resources_edit"     value="1" {{ isset($admin_group->resources_edit) && ($admin_group->resources_edit)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="resources_delete"   value="1" {{ isset($admin_group->resources_delete) && ($admin_group->resources_delete)  ? "checked"  :  ""  }} > </td>
                                                        </tr>
                                                        <tr>
                                                            <td>مجموعات المشرفين</td>
                                                            <td> <input type="checkbox" name="admin_groups_show"     value="1" {{ isset($admin_group->admin_groups_show) && ($admin_group->admin_groups_show)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="admin_groups_add"      value="1" {{ isset($admin_group->admin_groups_add) && ($admin_group->admin_groups_add)  ? "checked"  :  "" }} > </td>
                                                            <td> <input type="checkbox" name="admin_groups_edit"     value="1" {{ isset($admin_group->admin_groups_edit) && ($admin_group->admin_groups_edit)  ? "checked"  :  "" }} > </td>
                                                            <td> <input type="checkbox" name="admin_groups_delete"   value="1" {{ isset($admin_group->admin_groups_delete) && ($admin_group->admin_groups_delete)  ? "checked"  :  ""  }} > </td>
                                                        </tr>
                                                        <tr>
                                                            <td>المستخدمين</td>
                                                            <td> <input type="checkbox" name="users_show"     value="1" {{ isset($admin_group->users_show) && ($admin_group->users_show)  ? "checked"  :  ""  }} > </td>
                                                            <td> <input type="checkbox" name="users_add"      value="1" {{ isset($admin_group->users_add) && ($admin_group->users_add)  ? "checked"  : ""  }} > </td>
                                                            <td> <input type="checkbox" name="users_edit"     value="1" {{ isset($admin_group->users_edit) && ($admin_group->users_edit)  ? "checked"  : ""  }} > </td>
                                                            <td> <input type="checkbox" name="users_delete"   value="1" {{ isset($admin_group->users_delete) && ($admin_group->users_delete)  ? "checked"  : ""  }} > </td>
                                                        </tr>
                                                 </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>