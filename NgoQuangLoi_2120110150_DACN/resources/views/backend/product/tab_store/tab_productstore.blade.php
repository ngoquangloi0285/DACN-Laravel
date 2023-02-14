<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price" class="form-label">Giá nhập</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}"
                id="price" aria-describedby="emailHelp" placeholder="Nhập giá sản phẩm">
            @if ($errors->has('price'))
                <div class="text-danger">{{ $errors->first('price') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">Số lượng</label>
            <input type="number" name="qty" id="qty" class="form-control" placeholder="Nhập số lượng">{{ old('qty') }}</input>
            @if ($errors->has('qty'))
                <div class="text-danger">{{ $errors->first('qty') }}</div>
            @endif
        </div>
    </div>
</div>