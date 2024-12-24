@extends('main')
@section('content')
    <div class="container p-t-80">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html"
               class="stext-109 cl8 hov-cl1 trans-04">
                {{ $product->menu->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				{{ $title }}
			</span>
        </div>
    </div>

    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
        <div class="product-box">
            <div class="row">
                <!-- Phần nội dung và form -->
                <div class="col-md-6 col-lg-5 p-b-30 order-lg-1 product-card">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        @include('admin.alert')

                        <h4 class="mtext-105 cl2 js-name-detail p-b-14 product-title">
                            {{ $title }}
                        </h4>

                        <span class="mtext-106 cl2 product-price">
							{!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}
						</span>
                        <p class="stext-102 cl3 p-t-23 product-description">
                                                    Made in: {{ $product->Made_in }}
                                                </p>
                        <p class="stext-102 cl3 p-t-23 product-description">
                           Mô tả: {{ $product->description }}
                        </p>
                        
<div class="p-t-33">
    <form action="/add-cart" method="post">

        @if ($product->price !== null)

                <div id="size-quantity" class="mt-2" style="display: none;"> Số lượng: <span id="quantity-value">0</span></div>

            <!-- Hiển thị các size -->
            <div class="flex-w p-b-10">
                <label class="form-label w-100">Chọn kích thước:</label>
                <div class="btn-group flex-wrap" role="group" aria-label="Size options">
                    @foreach ($product->sizes as $size)
                        @if ($size->pivot->quantity > 0)
                            <button type="button" 
                                    class="btn btn-outline-secondary size-button" 
                                    data-size-id="{{ $size->id }}"
                                    data-quantity="{{ $size->pivot->quantity }}">
                                {{ $size->name }}
                            </button>
                        @endif
                    @endforeach
                </div>
                
                <input type="hidden" name="size_id" id="selected-size" required>
<input type="hidden" name="size_name" id="selected-size-name">


<input type="hidden" name="size_quantity" id="selected-quantity" required>
            </div>

            <!-- Số lượng -->
            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                    <i class="fs-16 zmdi zmdi-minus"></i>
                </div>
                <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1" min="1">
                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                    <i class="fs-16 zmdi zmdi-plus"></i>
                </div>
            </div>

            <!-- Nút thêm vào giỏ hàng -->
            <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                THÊM GIỎ HÀNG
            </button>

            <input type="hidden" name="product_id" value="{{ $product->id }}">
            @csrf
        @endif
    </form>
</div>

                        {{-- @else
                        <p style="color: red;">Sản phẩm đã bán hết</p>
                        @endif --}}
                    </div>
                </div>

                <!-- Phần ảnh -->
                <div class="col-md-6 col-lg-7 p-b-30 order-lg-2 product-card">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" style="" role="tablist">

                                </ul>
                            </div>
                            <!-- <div class="wrap-slick3-arrows flex-sb-m flex-w">
                                <button class="arrow-slick3 prev-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-left" aria-hidden="true"></i></button>
                                <button class="arrow-slick3 next-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </div> -->

                            <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1539px;">
                                        <div class="item-slick3 slick-slide slick-current slick-active"
                                             data-thumb="images/product-detail-01.jpg" data-slick-index="0"
                                             aria-hidden="false"
                                             style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                                             tabindex="0" role="tabpanel" id="slick-slide10"
                                             aria-describedby="slick-slide-control10">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">

                                                <!-- <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                   href="images/product-detail-01.jpg" tabindex="0">
                                                    <i class="fa fa-expand"></i>
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-detail-description">
    <h4>Mô tả chi tiết</h4>
    {!! $product->content !!}
</div>
 <div class="reviews">
            <h4>Viết câu hỏi của bạn về sản phẩm</h4>
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <textarea name="comment" placeholder="Nhập câu hỏi của bạn" maxlength="255" rows="2"style="width: 100%; margin-bottom: 10px;"required></textarea>
                <button type="submit"
                    style="padding: 8px 16px; background-color: #28a745; color: white; border: none; cursor: pointer;">
                    Gửi câu hỏi
                </button>
            </form>

            <h4>Thắc mắc về sản phẩm</h4>
            <div class="user-reviews">
                @if($product->reviews->isEmpty())
                <p>Chưa có câu hỏi nào cho sản phẩm này.</p>
                @else
                @foreach($product->reviews as $review)
                <div class="review" style="border-bottom: 1px solid #ddd; padding: 10px 0;">
                    <strong>{{ $review->user ? $review->user->name : 'Người dùng không xác định' }} 
                        
                    </strong>
                    <p>{{ $review->comment }}</p>
                    <small style="color: #999;">{{ $review->created_at->format('d/m/Y H:i') }}</small>

                    <!-- Nút trả lời -->
                    <button class="btn-reply"
                        style="background: none; border: none; color: #007bff; cursor: pointer; margin-left: 10px;"
                        onclick="toggleReplyForm({{ $review->id }})">
                        Trả lời
                    </button>

                    <!-- Form trả lời ẩn -->
                    <form action="{{ route('reviews.reply', $review->id) }}" method="POST"
                        style="display: none; margin-top: 10px;" id="reply-form-{{ $review->id }}">
                        @csrf
                        <textarea name="reply" required placeholder="Nhập câu trả lời của bạn" rows="2"
                            style="width: 100%; margin-bottom: 10px;"></textarea>
                        <button type="submit"
                            style="padding: 8px 16px; background-color: #007bff; color: white; border: none; cursor: pointer;">
                            Gửi câu trả lời
                        </button>
                    </form>

                    <!-- Hiển thị tất cả các câu trả lời -->
                    @foreach($review->replies as $reply)
                    <div class="reply" style="margin-top: 10px; border-left: 2px solid #007bff; padding-left: 10px;">
                        <strong>
    {{ $reply->user ? $reply->user->name . ($reply->user->role_id !== 2 ? ' (admin)' : '') : 'Người dùng không xác định' }}
</strong>
                        <p>{{ $reply->reply }}</p>
                        <small style="color: #999;">{{ $reply->created_at->format('d/m/Y H:i') }}</small>
                        <!-- Thêm dòng này -->
                    </div>
                    @endforeach
                </div>
                @endforeach
                @endif
            </div>
        </div>
        </div> 
    </section>
@endsection
<link rel="stylesheet" href="{{ asset('css/contentproduct.css') }}">
<script src="{{ asset('template/js/main2.js') }}"></script>
<script>
function toggleReplyForm(reviewId) {
    var form = document.getElementById('reply-form-' + reviewId);
    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}
</script>