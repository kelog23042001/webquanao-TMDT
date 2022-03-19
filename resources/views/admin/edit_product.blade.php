@extends('admin_layout')
@section('admin_contend')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhập sản phẩm
                        </header>
                        <div class="panel-body">
                        <?php
                            use Illuminate\Support\Facades\Session;

                            $message = Session::get('message');
                            if($message){
                                echo $message;
                                Session::put('message',null);
                            }
                        ?>
                            <div class="position-center">
                                @foreach($edit_product as $key => $pro)
                                    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{ $pro->product_name }}">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                        <input  type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                        @if(isset($pro))
                                            <img width="20%" src="{{asset('public/uploads/product/'.$pro->product_image)  }}">
                                        @endif <br>
                                       <!-- <img width="100px" src="{{URL::to('public/uploads/product/'.$pro->product_image) }}"> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                                        <input  value="{{ $pro->product_name }}" type="text" name="product_price" class="form-control" id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                        <textarea style="resize:none" name="product_desc" rows="5"  class="form-control" id="exampleInputPassword1" >
                                            {{ $pro->product_desc }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                        <textarea style="resize:none" name="product_content" rows="5"  class="form-control" id="exampleInputPassword1" >
                                          {{ $pro->product_content }}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hiển thị</label>
                                        <select name="product_status" class="form-control input-sm m-bot15">
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiển thị</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                        <select name="product_cate" class="form-control input-sm m-bot15">
                                            @foreach($cate_product as $key => $cate)
                                                @if($cate->category_id == $pro->category_id)
                                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @else
                                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Thương hiệu</label>
                                        <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                                @if($brand->brand_id == $pro->brand_id)
                                                    <option seslected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                                @else
                                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                                @endif

                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Màu sắc</label>
                                        <select name="product_color" class="form-control input-sm m-bot15">
                                        @foreach($color_product as $key => $color)
                                                @if($color->color_id == $pro->color_id)
                                                    <option seslected value="{{$color->color_id}}">{{$color->color_name}}</option>
                                                @else
                                                    <option value="{{$color->color_id}}">{{$color->color_name}}</option>
                                                @endif
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Size</label>
                                        <select name="product_size" class="form-control input-sm m-bot15">
                                        @foreach($size_product as $key => $size)
                                                @if($size->size_id == $pro->size_id)
                                                    <option seslected value="{{$size->size_id}}">{{$size->size_name}}</option>
                                                @else
                                                    <option value="{{$size->size_id}}">{{$size->size_name}}</option>
                                                @endif
                                        @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" name="add_category_product" class="btn btn-info">Cập nhập sản phẩm</button>
                                </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection
