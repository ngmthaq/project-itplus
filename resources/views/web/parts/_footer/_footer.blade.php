<footer class="bg-dark pt-5">
    <div class="container">
        <div class="row pb-4">
            <div class="col-lg-3">
                <h5 class="text-main">GIỚI THIỆU</h5>
                <p class="text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit beatae quidem
                    harum obcaecati
                    perferendis nobis ipsa ducimus quae quaerat, animi fugit, quos voluptatem odio quia ea atque libero
                    explicabo tempore!</p>
            </div>
            <div class="col-lg-2">
                <h5 class="text-main">DANH MỤC</h5>
                <ul>
                    @foreach ($categories as $category)
                        <li><a href="#" class="text-white">{{ $category->name_vi }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-2">
                <h5></h5>
                <ul>
                    <li><a class="text-white" href="#">Track &amp; Field</a></li>
                    <li><a class="text-white" href="#">MembershipContact us</a></li>
                    <li><a class="text-white" href="#">Newsletter Alerts</a></li>
                    <li><a class="text-white" href="#">Podcast</a></li>
                    <li><a class="text-white" href="#">Blog</a></li>
                    <li><a class="text-white" href="#">SMS Subscription</a></li>
                    <li><a class="text-white" href="#">Advertisement Policy</a></li>
                    <li><a class="text-white" href="#">Jobs</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5></h5>
                <ul class="nav navbar-nav ">
                    <li><a class="text-white" href="#">Report technical issue</a></li>
                    <li><a class="text-white" href="#">Complaints &amp; Corrections</a></li>
                    <li><a class="text-white" href="#">Terms &amp; Conditions</a></li>
                    <li><a class="text-white" href="#">Privacy Policy</a></li>
                    <li><a class="text-white" href="#">Cookie Policy</a></li>
                    <li><a class="text-white" href="#">Securedrop</a></li>
                    <li><a class="text-white" href="#">Archives</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <div id="map" class="map"></div>
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
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                        <li><a href="#"><i class="far fa-envelope"></i></a></li>
                        <li><a href="#"><i class="fas fa-phone"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
