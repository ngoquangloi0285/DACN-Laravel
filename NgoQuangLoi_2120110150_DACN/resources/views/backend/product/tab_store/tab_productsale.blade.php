<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price_sale" class="form-label">Giá khuyến mãi</label>
            <input type="number" name="price_sale" class="form-control" value="{{ old('price_sale') }}"
                id="price_sale" aria-describedby="emailHelp" placeholder="Nhập giá khuyến mãi">
            @if ($errors->has('price_sale'))
                <div class="text-danger">{{ $errors->first('price_sale') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="date_begin" class="form-label">Ngày bắt đầu</label>
            <input type="date" name="date_begin" class="form-control" value="{{ old('date_begin') }}"
                id="date_begin" aria-describedby="emailHelp" placeholder="Nhập ngày bắt đầu">
            @if ($errors->has('date_begin'))
                <div class="text-danger">{{ $errors->first('date_begin') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="date_end" class="form-label">Ngày kết thúc</label>
            <input type="date" name="date_end" class="form-control" value="{{ old('date_end') }}"
                id="namecategory" aria-describedby="emailHelp" placeholder="Nhập ngày kết thúc">
            @if ($errors->has('date_end'))
                <div class="text-danger">{{ $errors->first('date_end') }}</div>
            @endif
        </div>
    </div>
</div>