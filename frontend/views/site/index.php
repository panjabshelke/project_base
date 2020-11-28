 <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
        <div class="container">

            <div class="banner-info">

                <div class="banner-text text-center">
                    <h1 class="white">Welcome to project_base</h1>
                    <?php
                    if (isset($aboutUsDetails[0]['description']) && !empty($aboutUsDetails[0]['description']))
                        echo $aboutUsDetails[0]['description'];
                    else 
                        echo "<p>To engage with corporations and individuals to help them enhance efficiency, <br>find joy, purpose
                        and well being.</p>";
                    ?>
                    <div class="intro-info">
                        <div>
                            <a href="/project_base/site/about" class="btn-services scrollto">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="overlay-detail text-center">
                    <a href="#service"><i class="fa fa-angle-down"></i></a>

                </div>
            </div>
    </section><!-- #intro -->
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
        <div class="container">

            <header class="section-header">
                <h3>About Us</h3>

                <p class="description">
                <?php
                    if (isset($aboutUsDetails[0]['description']) && !empty($aboutUsDetails[0]['description']))
                        echo strip_tags($aboutUsDetails[0]['description']);
                    else 
                        echo "To engage with corporations and individuals to help them enhance
                        efficiency, find joy, purpose and well being.";
                ?>
                </p>

            </header>

                <?php if ( !empty($homeDetails)) { 
                        echo $homeDetails;
                ?>
                <?php } else { ?>
            <div class="row about-container">

                <div class="col-lg-6 content order-lg-1 order-2">
                    <p> TEST TEST TEST TEST TEST TEST TEST TEST TEST
                        At project_base, the emphasis of our work is on not just telling people WHAT to do but to impart
                        specific tools and methods about HOW to do it, in order to achieve results. We strongly believe
                        that knowledge has to be channeled into the application to day-to-day life to create new
                        possibilities. In our experiential workshops, we use a blend of theatre based learning,
                        neuroscience, and mindfulness.
                    </p>

                </div>

                <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp" style="text-align: center;">
                    <img src="img/ab-1.jpg" class="img-fluid" alt="" style="max-width: 90%">
                </div>
            </div>
                <?php } ?>
            


        </div>
    </section><!-- #about -->

    <!--==========================
     Courses Section
    ============================-->

    <div class="suscribe-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                    <div class="suscribe-text text-center">
                        <h3>Check Out All The Courses</h3>
                        <a class="sus-btn" href="#">Get Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Suscrive Area -->

    <!--==========================
    Services Section
  ============================-->

  <section id="services" class="section-bg">
        <div class="container">
            <header class="section-header">
                <h3>Courses</h3>

            </header>
            <div class="row">
                <div class="col-lg-6 mb-4 wow bounceInUp">
                    <div class="box">
                        <div class="icon">01</div>
                        <div class="content">
                            <h3>Executive Coaching</h3>
                            <p>

                            </p>
                            <a href="/project_base/courses/executive-coaching">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 wow bounceInUp">
                    <div class="box">
                        <div class="icon">02</div>
                        <div class="content">
                            <h3>Sales Training</h3>
                            <p>

                            </p>
                            <a href="/project_base/courses/sales-training">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 mb-4 wow bounceInUp">
                    <div class="box">
                        <div class="icon">01</div>
                        <div class="content">
                            <h3>service name</h3>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content
                            </p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4 wow bounceInUp">
                    <div class="box">
                        <div class="icon">03</div>
                        <div class="content">
                            <h3>Mindfullness Training</h3>
                            <p>

                            </p>
                            <a href="/project_base/courses/mindfulness-for-teachers">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 wow bounceInUp">
                    <div class="box">
                        <div class="icon">04</div>
                        <div class="content">
                            <h3>Theater Based Communication Training</h3>
                            <p>

                            </p>
                            <a href="/project_base/courses/theatre-based-communication-training">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 mb-4 wow bounceInUp">
                    <div class="box">
                        <div class="icon">01</div>
                        <div class="content">
                            <h3>service name</h3>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content
                            </p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>