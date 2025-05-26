        {{-- footer begin --}}
        <footer class="section-footer">
            <div class="container relative pb-md-5 z-2">
                <div class="row gx-5">
                    <div class="col-lg-4 col-sm-6">
                        <img src="{{ asset('assets/images/logo-white.webp') }}" class="w-150px" alt="" >
                        <div class="spacer-20"></div>
                        <p>Transform your outdoor space with our expert garden services! From design to maintenance, we create beautiful, thriving gardens tailored to your vision. Let us bring your dream garden to life—professional, reliable, and passionate about nature.</p>

                        <div class="social-icons mb-sm-30">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="widget">
                                    <h5>Pages</h5>
                                    <ul>                      
                                        <li><a href="{{ url('rooms-villa') }}">Rooms & Villa</a></li>
                                        <li><a href="{{ url('facilities') }}">Facilities</a></li>
                                        <li><a href="{{ url('galleries') }}">Gallery</a></li>
                                        <li><a href="{{ url('posts') }}">Posts</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="widget">
                                    <h5>Information</h5>
                                    <ul>                                        
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="widget">
                                    <h5>Social Media</h5>
                                    <ul>                                        
                                        <li><a href="#">Instagram</a></li>
                                        <li><a href="#">X</a></li>
                                        <li><a href="#">Facecook</a></li>
                                        <li><a href="#">Tiktok</a></li>
                                    </ul>
                                </div>
                            </div>
                        
                            <div class="subfooter m-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        Copyright &copy; {{ date('Y') }} {{ $seosetting->title }}. All Right Reserved. By <a href="https://www.instagram.com/yudiwinata164._">Yudi Winata & DY-Team</a>.                          
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                </div>
            </div>
        </footer>