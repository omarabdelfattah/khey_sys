    <div class="form-group">
        <label for="mosq_name" class=" control-label">إسم المورد</label>
            <input type="text" class="form-control" id="mosq_name" name="name" placeholder="ليف سلك" value="{{ isset($resource->name) ?  $resource->name  : old('name') }}">
    </div>
    <div class="form-group">
        <label for="monthly_quantity" class=" control-label">الكمية الشهرية</label>
            <input type="number" class="form-control" id="monthly_quantity" name="monthly_quantity" placeholder="6" value="{{ isset($resource->monthly_quantity) ?  $resource->monthly_quantity  : old('monthly_quantity') }}">
    </div>
    <div class="form-group">
        <label for="stock_quantity" class=" control-label">المخزون</label>
            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="29292" value="{{ isset($resource->stock_quantity) ?  $resource->stock_quantity  : old('stock_quantity') }}">
    </div>
