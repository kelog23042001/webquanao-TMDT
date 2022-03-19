<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class SizeController extends Controller
{
    public function add_size_product(){
        return view('admin.add_size_product');
    }
    public function all_size_product(){

        $all_size_product =DB::table('tbl_size_product')->get();
        $manager_size = view('admin.all_size_product')->with('all_size', $all_size_product);
        return view('admin.all_size_product', compact('all_size_product'));
    }
    public function save_size_product(Request $request){
        $data = array();
        $data['size_name'] = $request->size_product_name;
        $data['size_desc'] = $request->size_product_desc;
        $data['size_status'] = $request->size_product_status;

        DB::table('tbl_size_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');

        return Redirect::to('/add-size-product');
    }
    public function unactive_size_product($sizeproduct_id){
        DB::table('tbl_size_product')->where('size_id',$sizeproduct_id)->update(['size_status' => 1]);
        Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('/all-size-product');
    }

    public function active_size_product($sizeproduct_id){
        DB::table('tbl_size_product')->where('size_id',$sizeproduct_id)->update(['size_status' => 0]);
        Session::put('message', 'Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('/all-size-product');
    }

    public function edit_size_product($sizeproduct_id){
        $edit_size_product = DB::table('tbl_size_product')->where('size_id', $sizeproduct_id)->get();
        return view('admin.edit_size_product', compact('edit_size_product'));
    }

    public function delete_size_product($sizeproduct_id){
        DB::table('tbl_size_product')->where('size_id',$sizeproduct_id)->delete();
        Session::put('message', 'Xoá danh mục sản phẩm thành công');
        return Redirect::to('/all-size-product');
    }

    public function update_size_product(Request $request,$sizeproduct_id){
        $data = array();
        $data['size_name'] = $request->size_product_name;
        $data['size_desc'] = $request->size_product_desc;

        DB::table('tbl_size_product')->where('size_id',$sizeproduct_id)->update($data);
        Session::put('message', 'Cập nhập thành công');
        return Redirect::to('/all-size-product');
    }
}
