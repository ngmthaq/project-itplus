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
                <div id="map" class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8996500727862!2d105.77282945042474!3d21.036700885925303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b6163c392f%3A0x1ebf64facbb56d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBUaMawxqFuZyBt4bqhaQ!5e0!3m2!1svi!2s!4v1632567239807!5m2!1svi!2s"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
