<footer class="bg-dark pt-5">
    <div class="container">
        <div class="row pb-4">
            <div class="col-lg-4">
                <h5 class="text-main">GIỚI THIỆU</h5>
                <p class="text-white">
                    The Vietnam Newspaper là một dự án trang báo chia sẻ thông tin, tin tức
                    được lập ra nhằm mục đích cung cấp các thông tin chính xác đã được
                    xác thực đến đọc giả, giúp đọc giả dễ dàng tiếp cận thông tin hơn cũng
                    như tránh được các thông tin sai sự thật.
                </p>
                @include('web.parts.fb._page')
            </div>
            <div class="col-lg-2">
                <h5 class="text-main">DANH MỤC</h5>
                <ul>
                    <li><a href="/" class="text-white">Trang chủ</a></li>
                    @foreach ($categories as $category)
                        <li><a href="{{ route('category.showPosts', ['category' => $category->id]) }}" class="text-white">{{ $category->name_vi }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-2">
                <h5></h5>
                <ul>
                    <li><a class="text-white" href="{{ route('policy') }}">Chính sách</a></li>
                    <li><a class="text-white" href="{{ route('terms') }}">Điều khoản sử dụng</a></li>
                    <li><a class="text-white text-secondary" title="Chức năng đang xây dựng"
                            href="javascript:void(0)">Newsletter Alerts</a></li>
                    <li><a class="text-white text-secondary" title="Chức năng đang xây dựng"
                            href="javascript:void(0)">Podcast</a></li>
                    <li><a class="text-white text-secondary" title="Chức năng đang xây dựng"
                            href="javascript:void(0)">Blog</a></li>
                    <li><a class="text-white text-secondary" title="Chức năng đang xây dựng"
                            href="javascript:void(0)">SMS Subscription</a></li>
                    <li><a class="text-white text-secondary" title="Chức năng đang xây dựng"
                            href="javascript:void(0)">Advertisement Policy</a></li>
                    <li><a class="text-white text-secondary" title="Chức năng đang xây dựng"
                            href="javascript:void(0)">Jobs</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div id="map" class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8996500727862!2d105.77282945042474!3d21.036700885925303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b6163c392f%3A0x1ebf64facbb56d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBUaMawxqFuZyBt4bqhaQ!5e0!3m2!1svi!2s!4v1632567239807!5m2!1svi!2s"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="bottom-footer">
            <div class="row">
                <div class="col-lg-4 text-light">
                    © COPYRIGHT 2021 - {{ date('Y') }}
                </div>
                <div class="col-lg-4 text-light text-center">
                    THE VIETNAM NEWSPAPER - ngmthaq
                </div>
                <div class="col-lg-4">
                    <ul class="social">
                        <li><a target="_blank" href="https://facebook.com/thevietnamnewspaper"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="https://youtube.com"><i class="fab fa-youtube"></i></a></li>
                        <li><a target="_blank" href="https://tiktok.com"><i class="fab fa-tiktok"></i></a></li>
                        <li><a href="mailto:ngmthaq12@gmail"><i class="far fa-envelope"></i></a></li>
                        <li><a href="tel:0522676941"><i class="fas fa-phone"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
