<div class="row">
    <div class="col-md-5">
        <div class="mb-3">
            <label for="nameattribute" class="form-label">Tên thuộc tính</label>
            <input type="text" name="nameattribute" class="form-control" value="{{ old('nameattribute') }}"
                id="nameattribute" aria-describedby="emailHelp" placeholder="Nhập vào tên sản phẩm">
            @if ($errors->has('nameattribute'))
                <div class="text-danger">{{ $errors->first('nameattribute') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="des" class="form-label">Mô tả</label>
            <textarea name="des" id="des" class="form-control" placeholder="Nhập thông tin sản phẩm">{{ old('des') }}</textarea>
            @if ($errors->has('des'))
                <div class="text-danger">{{ $errors->first('des') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label for="attribute" class="form-label">Giá trị</label>
            <input type="text" name="attribute" class="form-control" value="{{ old('attribute') }}"
                id="attribute" aria-describedby="emailHelp" placeholder="Nhập vào tên sản phẩm">
            @if ($errors->has('attribute'))
                <div class="text-danger">{{ $errors->first('attribute') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="sort" class="form-label">Thứ tự</label>
            <textarea name="sort" id="sort" class="form-control" placeholder="Nhập thông tin sản phẩm">{{ old('sort') }}</textarea>
            @if ($errors->has('sort'))
                <div class="text-danger">{{ $errors->first('sort') }}</div>
            @endif
        </div>
    </div>
</div>