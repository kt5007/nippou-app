<!-- fixed-bottomだと固定されて動かない -->
<footer class="mainfooter " id="footer" role="contentinfo">
    <div class="footer-middle ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Site Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('articles.index') }}">Articles</a></li>
                            <li><a href="/motivation">Motivation Graph</a></li>
                            <li><a href="{{ route('user.index') }}">Profile</a></li>
                            <!-- <li><a href="#">Payment Center</a></li> -->
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <h4>Follow Us</h4>
                    <ul class="social-network social-circle">
                        <li><a href="https://www.facebook.com/KentoTakanash1" target="_blank" class="icoFacebook"
                                title="Facebook"><i class="fa fa-facebook" rel=”noopener noreferrer”></i></a></li>
                        <li><a href="https://www.linkedin.com/in/%E8%B3%A2%E4%BA%BA-%E9%AB%98%E6%A2%A8-0786101a0/"
                                target="_blank" class="icoLinkedin" title="Linkedin" rel=”noopener noreferrer”><i
                                    class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy">
                    <p class="text-center">&copy; Copyright - Kenjin. All rights reserved.</p>
                </div>
            </div>

        </div>
    </div>
</footer>
