<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSale;
use App\Models\ProductStore;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class ProductController extends Controller
{

    public function index()
    {
        $list_product = Product::join('nql_product_image', 'nql_product.id', '=', 'nql_product_image.product_id')
            ->where('nql_product.status', '!=', 0)->orderBy('nql_product.created_at', 'desc')->get();
        $count = Product::query()->where('status', '=', '0')->count();
        // dd($list_product);
        return view('backend.product.index', compact('list_product', 'count'));
    }

    public function trash()
    {
        $product = Product::join('nql_product_image', 'nql_product.id', '=', 'nql_product_image.product_id')
            ->where('nql_product.status', '=', 0)->orderBy('nql_product.created_at', 'desc')->get();
        $count = Product::query()->where('status', '=', '0')->count();
        return view('backend.product.trash', compact('product', 'count'));
    }

    public function create()
    {
        $list_category = Category::get();
        $list_brand = Brand::get();
        $list_html_Category = '';
        $list_html_Brand = '';
        foreach ($list_category as $item) {
            $list_html_Category .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        foreach ($list_brand as $item) {
            $list_html_Brand .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.product.create', compact('list_html_Category', 'list_html_Brand'));
    }

    public function store(ProductStoreRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->price_buy = $request->price_buy;
        $product->sale = $request->sale;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->status = $request->status;
        if ($product->save() == 1) {
            // Luu hinh
            // upload file
            if ($request->has('image')) {
                $path_dir = "images/product/";
                $i = 1;
                $arrfile = $request->file('image');
                foreach ($arrfile as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $product->slug . '-' . $i . '.' . $extension;
                    $file->move($path_dir, $fileName);
                    $product_image = new ProductImage();
                    $product_image->product_id = $product->id;
                    $product_image->image = $fileName;
                    $product_image->save();
                    $i++;
                }
            }
            // Khuyến mãi
            if (strlen($request->price_sale) && strlen($request->date_begin) && strlen($request->date_end)) {
                $product_sale = new ProductSale();
                $product_sale->product_id = $product->id;
                $product_sale->price_sale = $request->price_sale;
                $product_sale->date_begin = $request->date_begin;
                $product_sale->date_end = $request->date_end;
                $product_sale->save();
            }
            // Nhập giá kho
            if (strlen($request->price) && strlen($request->qty)) {
                $product_store = new ProductStore();
                $product_store->product_id = $product->id;
                $product_store->price = $request->price;
                $product_store->quantity = $request->qty;
                $product_store->save();
            }
        }
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Thêm dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function show($id)
    {
        $show_product = Product::find($id);
        if ($show_product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        } else {
            return view('backend.product.show', compact('show_product'));
        }
    }

    public function edit($id)
    {
        $product_img = ProductImage::find($id);
        $product = Product::get();
        $list_category = Category::get();
        $list_brand = Brand::get();
        $list_html_Category = '';
        $list_html_Brand = '';
        foreach ($list_category as $item) {
            $list_html_Category .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        foreach ($list_brand as $item) {
            $list_html_Brand .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.product.edit', compact('product_img', 'product_img', 'list_html_Category', 'list_html_Brand'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->price_buy = $request->price_buy;
        $product->sale = $request->sale;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->status = $request->status;
        if ($product->save() == 1) {
            // Luu hinh
            // upload file
            if ($request->has('image')) {
                $path_dir = "images/product/";
                if (File::exists(public_path($path_dir . $product->image))) {
                    File::delete(public_path($path_dir . $product->image));
                }
                $i = 1;
                $arrfile = $request->file('image');
                foreach ($arrfile as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $product->slug . '-' . $i . '.' . $extension;
                    $file->move($path_dir, $fileName);
                    $product_image = new ProductImage();
                    $product_image->product_id = $product->id;
                    $product_image->images = $fileName;
                    $product_image->save();
                    $i++;
                }
            }
            // Khuyến mãi
            if (strlen($request->price_sale) && strlen($request->date_begin) && strlen($request->date_end)) {
                $product_sale = ProductSale::find($id);
                $product_sale->product_id = $product->id;
                $product_sale->price_sale = $request->price_sale;
                $product_sale->date_begin = $request->date_begin;
                $product_sale->date_end = $request->date_end;
                $product_sale->save();
            }
            // Nhập giá kho
            if (strlen($request->price) && strlen($request->qty)) {
                $product_store = ProductStore::find($id);
                $product_store->product_id = $product->id;
                $product_store->price = $request->price;
                $product_store->quantity = $request->qty;
                $product_store->save();
            }
        }
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật dữ liệu thành công!', 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function status($id)
    {
        $status_category = Product::find($id);
        if ($status_category == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
        } else {
            $status_category->status = ($status_category->status == 1) ? 0 : 1;
            $status_category->updated_at = date('Y-m-d H:i:s');
            // $status_category->updated_by = 1;
            $status_category->save();
            return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
    }
    public function delete($id)
    {
        $status_product = ProductImage::find($id);
        $product = Product::get();
        $id_pr = null;
        foreach ($product as $product) {
            $id_pr = $product->id;
        }
        if ($id_pr == $status_product->product_id) {
            if ($product && $status_product == null) {
                return redirect()->route('product.index')
                    ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
            } else {
                $product->status = 0;
                $product->save();
                return redirect()->route('product.index')
                    ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!', 'created_at' => date('Y-m-d H:i:s')]);
            }
        }
    }
    public function destroy($id)
    {
        $status_product = ProductImage::find($id);
        $product = Product::get();
        $id_pr = null;
        $id_sale = null;
        $id_store = null;
        $path_dir = "images/product/";
        $path_img_delete = public_path($path_dir . $status_product->image);

        foreach ($product as $product) {
            $id_pr = $product->id;
        }


        if ($id_pr == $status_product->product_id) {
            if ($product && $status_product == null) {
                return redirect()->route('product.index')
                    ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
            } else {
                if ($id_pr == $status_product->product_id) {
                    if ($product->delete()) {
                        if (File::exists($path_dir)) {
                            File::delete($path_img_delete);
                            $status_product->delete();
//                            $sale_product->delete();
//                            $store_product->delete();
                            return redirect()->route('product.product_trash')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu đã được xóa vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
                        }
                    }
                }
            }
        }
    }
    public function restore($id)
    {
        $status_product = ProductImage::find($id);
        $product = Product::get();
        $id_pr = null;
        foreach ($product as $product) {
            $id_pr = $product->id;
        }
        if ($id_pr == $status_product->product_id) {
            if ($product && $status_product == null) {
                return redirect()->route('product.index')
                    ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
            } else {
                $product->status = 1;
                $product->save();
                return redirect()->route('product.index')
                    ->with('message', ['type' => 'success', 'msg' => 'Đã khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
            }
        }
    }
    public function product_des_del_res_all(Request $request)
    {
        if (isset($request->desall)) {
            $list_del = $request->del;
            foreach ($list_del as $item) {
                $status_product = ProductImage::find($item);
                $product = Product::get();
                $id_pr = null;
                foreach ($product as $product) {
                    $id_pr = $product->id;
                }
                if ($id_pr == $status_product->product_id) {
                    if ($product && $status_product == null) {
                        return redirect()->route('product.index')
                            ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
                    } else {
                        $product->status = 0;
                        $product->save();
//                        dd($product);
                        return redirect()->route('product.index')
                            ->with('message', ['type' => 'success', 'msg' => 'Xóa và chuyển vào thùng rác thành công!', 'created_at' => date('Y-m-d H:i:s')]);
                    }
                }
            }
            return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu được xoá thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if (isset($request->resall)) {
            $list_del = $request->del;
            foreach ($list_del as $item) {
                $status_product = ProductImage::find($item);
                $product = Product::get();
                $id_pr = null;
                foreach ($product as $product) {
                    $id_pr = $product->id;
                }
                if ($id_pr == $status_product->product_id) {
                    if ($product && $status_product == null) {
                        return redirect()->route('product.index')
                            ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
                    } else {
                        $product->status = 1;
                        $product->save();
                        return redirect()->route('product.index')
                            ->with('message', ['type' => 'success', 'msg' => 'Đã khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
                    }
                }
            }
            return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu được khôi phục thành công!', 'created_at' => date('Y-m-d H:i:s')]);
        }
        if (isset($request->deleteall)) {
            $path_dir = "images/product/";
            $list_del = $request->del;
            foreach ($list_del as $item) {
                $status_product = ProductImage::find($item);
                $product = Product::get();
                $id_pr = null;
                $path_dir = "images/product/";
                $path_img_delete = public_path($path_dir . $status_product->image);

                foreach ($product as $product) {
                    $id_pr = $product->id;
                }
                if ($id_pr == $status_product->product_id) {
                    if ($product && $status_product == null) {
                        return redirect()->route('product.index')
                            ->with('message', ['type' => 'danger', 'msg' => 'Dữ liệu không tồn tại!', 'created_at' => date('Y-m-d H:i:s')]);
                    } else {
                        if ($id_pr == $status_product->product_id) {
                            if ($product->delete()) {
                                if (File::exists($path_dir)) {
                                    File::delete($path_img_delete);
                                    $status_product->delete();
                                    return redirect()->route('product.product_trash')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu đã được xóa vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
                                }
                            }
                        }
                    }
                }
            }
            return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Dữ liệu được xoá vĩnh viễn!', 'created_at' => date('Y-m-d H:i:s')]);
        }
    }
}
