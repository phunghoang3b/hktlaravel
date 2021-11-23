<?php

use Illuminate\Support\Facades\Route;

//frontend
Route::get('/', 'HomeController@intro_shop');
Route::get('/Trang-chu', 'HomeController@index');
Route::get('/Gioi-thieu', 'HomeController@Gioithieu');
Route::get('/Lien-he', 'HomeController@Contact_us');
Route::get('/Trang-chu/404', 'HomeController@trang_error');
Route::post('/Tim-kiem', 'HomeController@tim_kiem');
Route::post('/timkiem-autocomplete', 'HomeController@timkiem_autocomplete');

//danh mục sản phẩm - index
Route::get('/danh-muc-sp/{danhmuc_id}', 'CategoryProduct@Hienthi_Danhmuc_index');
Route::get('/thuong-hieu-sp/{thuonghieu_id}', 'BrandProduct@Hienthi_Thuonghieu_index');
Route::get('/chi-tiet-san-pham/{sanpham_id}', 'ProductController@Chi_tiet_san_pham');

//backend
Route::get('/admin', 'AdminController@index');
Route::get('/Trangadmin', 'AdminController@Trangadmin');
Route::get('/dangxuat', 'AdminController@Dangxuat');
Route::post('/admin-trangchu', 'AdminController@AdminTrangchu');

//Danh mục sản phẩm
Route::get('/themdanhmucsanpham', 'CategoryProduct@them_danhmuc_sanpham');
Route::get('/suadanhmucsanpham/{danhmuc_id}', 'CategoryProduct@sua_danhmuc_sanpham');
Route::get('/xoadanhmucsanpham/{danhmuc_id}', 'CategoryProduct@xoa_danhmuc_sanpham');
Route::get('/danhsachdanhmucsanpham', 'CategoryProduct@danhsach_danhmuc_sanpham');

Route::get('/unactive-danhmuc/{danhmuc_id}', 'CategoryProduct@unactive_danhmuc');
Route::get('/active-danhmuc/{danhmuc_id}', 'CategoryProduct@active_danhmuc');

Route::post('/luudanhmucsanpham', 'CategoryProduct@luu_danhmuc_sanpham');
Route::post('/suadanhmucsanpham/{danhmuc_id}', 'CategoryProduct@capnhat_DM_sanpham');

Route::post('/import-file','CategoryProduct@import_file');
Route::post('/export-file','CategoryProduct@export_file');

//Thương hiệu sản phẩm
Route::get('/themthuonghieu', 'BrandProduct@them_thuonghieu_sanpham');
Route::get('/suathuonghieu/{thuonghieu_id}', 'BrandProduct@sua_thuonghieu_sanpham');
Route::get('/xoathuonghieu/{thuonghieu_id}', 'BrandProduct@xoa_thuonghieu_sanpham');
Route::get('/danhsachthuonghieu', 'BrandProduct@danhsach_thuonghieu_sanpham');

Route::get('/unactive-thuonghieu/{thuonghieu_id}', 'BrandProduct@unactive_thuonghieu');
Route::get('/active-thuonghieu/{thuonghieu_id}', 'BrandProduct@active_thuonghieu');

Route::post('/luuthuonghieusanpham', 'BrandProduct@luu_thuonghieu_sanpham');
Route::post('/suathuonghieu/{thuonghieu_id}', 'BrandProduct@capnhat_TH_sanpham');

//Sản phẩm 
Route::group(['middleware' => 'admin.roles'], function(){
	Route::get('/themsanpham', 'ProductController@them_sanpham');
	Route::get('/suasanpham/{sanpham_id}', 'ProductController@sua_sanpham');
});
Route::get('/xoasanpham/{sanpham_id}', 'ProductController@xoa_sanpham');
Route::get('/danhsachsanpham', 'ProductController@danhsach_sanpham');

Route::get('/unactive-sanpham/{sanpham_id}', 'ProductController@unactive_sanpham');
Route::get('/active-sanpham/{sanpham_id}', 'ProductController@active_sanpham');

Route::post('/luusanpham', 'ProductController@luu_sanpham');
Route::post('/capnhatsanpham/{sanpham_id}', 'ProductController@capnhat_sanpham');

Route::post('/import-file-product','ProductController@import_file_product');
Route::post('/export-file-product','ProductController@export_file_product');

Route::post('/quickview','ProductController@quickview');

//Giỏ hàng
// Route::post('/luu-giohang', 'CartController@luu_giohang');
// Route::post('/capnhat-sl-giohang', 'CartController@capnhat_sl_giohang');
// Route::get('/hienthi-giohang', 'CartController@hienthi_giohang');
// Route::get('/xoa-giohang/{rowId}', 'CartController@xoa_giohang');

//Giỏ hàng Ajax
Route::post('/themgiohang-ajax', 'CartController@themgiohang_ajax');
Route::get('/giohang-ajax', 'CartController@giohang_ajax');
Route::post('/capnhat-giohang-ajax', 'CartController@capnhat_giohang_ajax');
Route::get('/xoasp-ajax/{session_id}', 'CartController@xoasp_ajax');
Route::get('/xoatatca-giohang', 'CartController@xoatatca_giohang');

//Mã giảm giá
Route::post('/kiemtra-giamgia', 'CartController@kiemtra_giamgia');
Route::get('/them-magiamgia', 'CouponController@them_magiamgia');
Route::post('/luumagiamgia', 'CouponController@luumagiamgia');
Route::get('/danhsachmagiamgia', 'CouponController@danhsachmagiamgia');
Route::get('/xoamagiamgia/{coupon_id}', 'CouponController@xoamagiamgia');
Route::get('/xoagiamgia-giohang', 'CouponController@xoagiamgia_giohang');

//Tính phí vận chuyển
Route::get('/van-chuyen', 'DeliveryController@vanchuyen');
Route::post('/chon-vanchuyen', 'DeliveryController@chon_vanchuyen');
Route::post('/them-vanchuyen', 'DeliveryController@them_vanchuyen');
Route::post('/chon-feeship', 'DeliveryController@chon_feeship');
Route::post('/capnhatgia-vanchuyen', 'DeliveryController@capnhatgia_vanchuyen');

//Thanh toán giỏ hàng
Route::get('/dangnhap-thanhtoan', 'CheckoutController@dangnhap_thanhtoan');
Route::get('/dangxuat-thanhtoan', 'CheckoutController@dangxuat_thanhtoan');
Route::post('/them-khachhang', 'CheckoutController@them_khachhang');
Route::post('/dangnhap-khachhang', 'CheckoutController@dangnhap_khachhang');
Route::get('/thanhtoan', 'CheckoutController@thanhtoan');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/luu-thanhtoan-khachhang', 'CheckoutController@luu_thanhtoan_khachhang');
Route::post('/hinhthuc-thanhtoan', 'CheckoutController@hinhthuc_thanhtoan');
Route::post('/chon-vanchuyen-giohang', 'CheckoutController@chon_vanchuyen_giohang');
Route::post('/tinhtoanphi-giohang', 'CheckoutController@tinhtoanphi_giohang');
Route::get('/xoaphi-giohang', 'CheckoutController@xoaphi_giohang');
Route::post('/xacnhan-donhang', 'CheckoutController@xacnhan_donhang');

//quản lý đơn hàng admin
Route::get('/quanly-donhang', 'OrderController@quanly_donhang');
Route::get('/xem-donhang/{order_code}', 'OrderController@xem_donhang');
Route::get('/in-donhang/{checkout_code}', 'OrderController@in_donhang');
Route::post('/capnhat-sldh', 'OrderController@capnhat_sldh');
Route::post('/capnhat-btn-sldh', 'OrderController@capnhat_btn_sldh');


//gửi mail
Route::get('/gui-mail', 'HomeController@gui_mail');

//đăng nhập bằng google
Route::get('/login-google','AdminController@login_google');
Route::get('/google/callback','AdminController@callback_google');

// Slide banner
Route::get('/danhsachbanner','SliderController@danhsach_banner');
Route::get('/thembanner','SliderController@them_banner');
Route::post('/luu-slider','SliderController@luu_slider');
Route::get('/unactive-slide/{slide_id}', 'SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}', 'SliderController@active_slide');

// Phân quyền admin
// 1) đăng kí vs đăng nhập admin
Route::get('/Dangky-admin','AuthController@Dangky_admin');
Route::post('/dangky','AuthController@dangky');
Route::get('/Dangnhap-admin','AuthController@Dangnhap_admin');
Route::post('/dangnhap','AuthController@dangnhap');
Route::get('/dangxuat-admin','AuthController@dangxuat_admin');

// 2) phân quyền cho admin
Route::get('/users','UserController@index')->middleware('admin.roles');
Route::get('/them-taikhoan','UserController@them_taikhoan')->middleware('admin.roles');
Route::post('/phanquyen-vaitro','UserController@phanquyen_vaitro')->middleware('admin.roles');
Route::get('/xoaquyen-user/{admin_id}','UserController@xoaquyen_user')->middleware('admin.roles');
Route::post('/luu-taikhoan','UserController@luu_taikhoan')->middleware('admin.roles');
Route::get('/chuyenquyen-user/{admin_id}','UserController@chuyenquyen_user');
Route::get('/huy-chuyenquyen','UserController@huy_chuyenquyen');

//quản lý bài viết
// 1) quản lý danh mục bài viết
Route::get('/them-danhmuc-baiviet','CategoryPost@them_danhmuc_baiviet');
Route::post('/luudanhmuc-baiviet','CategoryPost@luudanhmuc_baiviet');
Route::get('/danhsach-DM-baiviet','CategoryPost@danhsach_DM_baiviet');
Route::get('/sua-DMPost/{cate_post_id}','CategoryPost@sua_DMPost');
Route::post('/capnhat-danhmuc-baiviet/{cate_id}','CategoryPost@capnhat_danhmuc_baiviet');
Route::get('/xoa-DMPost/{cate_id}','CategoryPost@xoa_DMPost');

// 2) quản lý bài viết
Route::get('/them-baiviet','PostController@them_baiviet');
Route::post('/luu-baiviet','PostController@luu_baiviet');
Route::get('/danhsach-baiviet','PostController@danhsach_baiviet');
Route::get('/xoa-baiviet/{post_id}','PostController@xoa_baiviet');
Route::get('/sua-baiviet/{post_id}','PostController@sua_baiviet');
Route::post('/capnhat-baiviet/{post_id}','PostController@capnhat_baiviet');

//quản lý bài viết - index
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');

// Quản lý thư viện ảnh Gallery
Route::get('/them-gallery/{product_id}','GalleryController@them_gallery');
Route::post('/chon-gallery','GalleryController@chon_gallery');
Route::post('/insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('/capnhat-gallery-name','GalleryController@capnhat_gallery_name');
Route::post('/xoa-gallery','GalleryController@xoa_gallery');
Route::post('/capnhat-image-gallery','GalleryController@capnhat_image_gallery');

// Quản lý video
Route::get('/them-video','VideoController@video');
Route::get('/Video-gymstore','VideoController@video_gymstore');
Route::post('/chon-video','VideoController@chon_video');
Route::post('/insert-video','VideoController@insert_video');
Route::post('/capnhat-video','VideoController@capnhat_video');
Route::post('/xoa-video','VideoController@xoa_video');
Route::post('/capnhat-image-video','VideoController@capnhat_image_video');
Route::post('/Xem-video','VideoController@Xem_video');