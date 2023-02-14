<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name"
                aria-describedby="emailHelp" placeholder="Nhập vào tên sản phẩm">
            @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="detail" class="form-label">Thông tin sản phẩm</label>
            <textarea name="detail" id="detail" class="form-control" placeholder="Nhập thông tin sản phẩm">{{ old('detail') }}</textarea>
            @if ($errors->has('detail'))
                <div class="text-danger">{{ $errors->first('detail') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="metakey" class="form-label">Từ khóa</label>
            <textarea name="metakey" id="metakey" class="form-control" placeholder="Nhập vào từ khóa tìm kiếm">{{ old('metakey') }}</textarea>
            @if ($errors->has('metakey'))
                <div class="text-danger">{{ $errors->first('metakey') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="metadesc" class="form-label">Mô tả</label>
            <textarea name="metadesc" id="metadesc" class="form-control" placeholder="Nhập vào mô tả">{{ old('metadesc') }}</textarea>
            @if ($errors->has('metadesc'))
                <div class="text-danger">{{ $errors->first('metadesc') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="brand_id" class="form-label">Thương hiệu</label>
            <select class="form-control" name="brand_id" id="brand_id">
                <option value="">Thương hiệu</option>
                {!! $list_html_Brand !!}
            </select>
            @if ($errors->has('brand_id'))
                <div class="text-danger">{{ $errors->first('brand_id') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="sale" class="form-label">Sản phẩm có giảm không?</label>
            <select class="form-control" name="sale" id="sale">
                <option value="0">Sản phẩm có giảm không?</option>
                <option value="1">Có</option>
                <option value="0">Không</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">Danh mục sản phẩm</option>
                {!! $list_html_Category !!}
            </select>
            @if ($errors->has('category_id'))
                <div class="text-danger">{{ $errors->first('category_id') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="price_buy" class="form-label">Giá bán</label>
            <input type="number" name="price_buy" class="form-control" value="{{ old('price_buy') }}" id="namecategory"
                aria-describedby="emailHelp" placeholder="Nhập giá bán">
            @if ($errors->has('price_buy'))
                <div class="text-danger">{{ $errors->first('price_buy') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái </label>
            <select class="form-control" name="status" id="status">
                <option value="1">Hiện</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
    </div>
</div>
