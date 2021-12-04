@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    @foreach($danhmuc_ten as $key => $danhmuc)
    <h2 class="title text-center">{{$danhmuc->category_name}}</h2>
    @endforeach

    <div class="row">
        <div class="col-md-4">
            <label for="amount">Sắp xếp theo</label>
            <form>
                @csrf
                <select name="sort" id="sort" class="form-control" style="text-align: center;">
                    <option value="{{Request::url()}}?sort_by=none">------------Lọc Theo------------</option>
                    <option value="{{Request::url()}}?sort_by=tang_dan">-----------Giá tăng dần-----------</option>
                    <option value="{{Request::url()}}?sort_by=giam_dan">------------Giá giảm dần------------</option>
                    <option value="{{Request::url()}}?sort_by=kytu_az">--------Lọc theo tên từ A đến Z--------</option>
                    <option value="{{Request::url()}}?sort_by=kytu_za">--------Lọc theo tên từ Z đến A--------</option>
                </select>
            </form>
        </div>
    </div><br>

    @foreach($danhmuc_theo_id as $key => $sanpham)                   
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <form>
                            @csrf
                            <input type="hidden" value="{{$sanpham->product_id}}" class="cart_product_id_{{$sanpham->product_id}}">
                            <input type="hidden" id="wishlist_productname{{$sanpham->product_id}}" value="{{$sanpham->product_name}}" class="cart_product_name_{{$sanpham->product_id}}">
                            <input type="hidden" value="{{$sanpham->product_quantity}}" class="cart_product_quantity_{{$sanpham->product_id}}">
                            <input type="hidden" value="{{$sanpham->product_image}}" class="cart_product_image_{{$sanpham->product_id}}">
                            <input type="hidden" id="wishlist_productprice{{$sanpham->product_id}}" value="{{$sanpham->product_price}}" class="cart_product_price_{{$sanpham->product_id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$sanpham->product_id}}">

                            <a id="wishlist_producturl{{$sanpham->product_id}}" href="{{URL::to('/chi-tiet-san-pham/'.$sanpham->product_id)}}">
                                <img id="wishlist_productimage{{$sanpham->product_id}}" src="{{URL::to('public/uploads/product/'.$sanpham->product_image)}}" alt="" />
                                <h2>{{number_format($sanpham->product_price).' '.'đ'}}</h2>
                                <p>{{($sanpham->product_name)}}</p>
                            </a> 
                            <style type="text/css">
                                .xemnhanh{
                                    background: #F5F5ED;
                                    border: 0 none;
                                    border-radius: 0;
                                    color: #696763;
                                    font-family: 'Roboto', sans-serif;
                                    font-size: 15px;
                                    margin-bottom: 25px;
                                }
                            </style>
                            <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_sanpham="{{$sanpham->product_id}}" name="them-gio-hang">

                            <input type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh" class="btn btn-default xemnhanh" data-id_sanpham="{{$sanpham->product_id}}" name="them-gio-hang">
                        </form>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <style type="text/css">
                            ul.nav-pills.nav-justified li{
                                text-align: center;
                                font-size: 13px;
                            }
                            .button_wishlist{
                                border: none;
                                background: #ffff;
                                color: #B3AFAB;
                            }
                            ul.nav.nav-pills.nav-justified i{
                                color: #B3AFAB;
                            }
                            .button_wishlist span:hover{
                                color: #66b3ff;
                            }
                            .button_wishlist:focus{
                                border: none;
                                outline: none;
                            }
                        </style>
                        <li>
                            <i class="fa fa-plus-square"></i><button class="button_wishlist" id="{{$sanpham->product_id}}" onclick="add_wishlist(this.id);"><span>Yêu Thích</span></button>
                        </li>
                        <li>
                            <a style="cursor: pointer;" onclick="them_sosanh({{$sanpham->product_id}})"><i class="fa fa-plus-square"></i>So Sánh</a>
                        </li>
                        {{-- model so sanh --}}
                        <div class="container">                      
                            <!-- Modal -->
                            <div class="modal fade" id="sosanh" role="dialog">
                            <div class="modal-dialog">  
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><span id="title-compare"></span></h4>
                                    </div>
                                <div class="modal-body">
                                    {{-- <div id="row_compare"></div> --}}
                                    <table class="table table-hover" id="row_compare">
                                        <thead>
                                          <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Xem sản phẩm</th>
                                            <th>Chức năng</th>
                                          </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>     
                            </div>
                            </div>
                        </div>
                        {{-- model so sanh --}}
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div><!--features_items -->  
<!-- Modal -->
<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title product_quickview_title" id="">
            <span id="product_quickview_title"></span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <style type="text/css">
            @media screen and (min-width: 768px){
                .modal-dialog{
                    width: 700px;
                }
                .modal-sm{
                    width: 350px;
                }
            }
            @media screen and (min-width: 992px){
                .modal-lg{
                    width: 1200px;
                }
            }
        </style>
        <div class="row">
            <div class="col-md-5">
                <span id="product_quickview_image"></span>
                {{-- <span id="product_quickview_gallery"></span> --}}
            </div>
            <form>
                @csrf
                <div id="product_quickview_value"></div>
                <div class="col-md-7">
                    <h2><span id="product_quickview_title"></span></h2>
                    <p>Mã ID:<span id="product_quickview_id"></span></p>
                    <p style="font-size: 20px; color: brown; font-weight: bold;">Giá sản phẩm: <span id="product_quickview_price"></span></p>
                    <label>Số lượng:</label>
                    <input name="so_luong" type="number" min="1" value="1" class="cart_product_qty_" /><hr>
                    <h4 style="font-size: 20px; color: brown; font-weight: bold;">Mô tả sản phẩm</h4>
                    <span id="product_quickview_desc"></span>
                    {{-- <p><span id="product_quickview_content"></span></p> --}}
                    <div id="product_quickview_button"></div>               
                    <div id="beforesend_quickview"></div>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-default redirect-cart">Đi tới giỏ hàng</button>
      </div>
    </div>
  </div>
</div>
@endsection