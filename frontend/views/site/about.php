<!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
        <div class="container">

            <div class="banner-info">


            </div>
    </section><!-- #intro -->
<!--==========================
      About Us Section
    ============================-->
    <section id="about">
        <div class="container">

            <header class="section-header">
                <h3>About Us</h3>
                <p></p>
            </header>

            <div class="row about-container">

                <div class="col-lg-12 content order-lg-1 order-2">
                    <?php 
                        echo (isset($model[0]['description'])) ? $model[0]['description'] : "";
                    ?>

                    <div class="icon-box wow fadeInUp">
                        <div class="icon"><i class="fa fa-eye"></i></div>
                        <h4 class="title"><a href="">Vision</a></h4>
                        <p class="description">
                        
                        <?= (isset($tagline[0]['description'])) ? strip_tags($tagline[0]['description']) : "";
                        ?>
                        </p>
                    </div>

                </div>

                <!-- <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
                    <img src="img/ab-1.jpg" class="img-fluid float-right" alt="" style="max-width: 90%">
                </div> -->
            </div>


        </div>
    </section><!-- #about -->