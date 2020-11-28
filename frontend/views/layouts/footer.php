<?php

use backend\models\PagesDetail;
use backend\models\Teams;
use backend\models\Testimonial;
use yii\helpers\Url;

?>  
    <!--==========================
      Clients Section  style="clip-path: none;padding-top: 80px;" site/contact
    ============================-->
    <section id="testimonials" class="section-bg" <?= (strpos(Url::current(), 'contact'))? 'style="clip-path: none;padding-top: 80px;"' : '' ?>>
        <div class="container">

            <header class="section-header">
                <h3>Testimonials</h3>
            </header>

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="owl-carousel testimonials-carousel wow fadeInUp">
                        <?php 
                        $testimonialDetails = [];
                        $testimonialDetails = Testimonial::getTestimonialDetails();   
                        if(!empty($testimonialDetails)) {
                            foreach($testimonialDetails as $testimonialDetail) {
                                echo '<div class="testimonial-item">';
                                echo '<h3>'.$testimonialDetail['name'].'</h3>'.$testimonialDetail['description'];
                                echo '</div>';
                            }
                        } else {
                        ?>
                        <div class="testimonial-item">
                            <!-- <img src="img/testimonial-1.jpg" class="testimonial-img" alt=""> -->
                            <h3>Sankha Majumdar</h3>
                            <!-- <h4>Ceo &amp; Founder</h4> -->
                            <p>
                                Dear sir,<br>
                                The training was a quantum leap in motivation for all.

                                Now coming to self I was not very vocal during the training. The reason was
                                &ldquo;dropping the stories&rdquo; as most of the stories was with me and the stories
                                are like self-imposed taboos about which I was thinking and even now thinking. I always
                                have biased and illogical confidence in my brain power and not on the body. Now I have
                                come across the issues of the self, the body, and its synchronization. Small changes I
                                am working out and hoping for a changed self.
                            </p>
                        </div>

                        <div class="testimonial-item">
                            <!-- <img src="img/testimonial-2.jpg" class="testimonial-img" alt=""> -->
                            <h3>Venket. S. R</h3>
                            <!-- <h4>Designer</h4> -->
                            <p>
                                Dear Sir/Madam,<br>
                                It was a wonderful experience. The 4 days were, really, a learning curve. It was really
                                sort of renewal ,as taught in the training, of Physical, Social, Mental and Emotional.
                                In the last 17 years, of my experience , I’ve attended around 8 training programmes .
                                After the training, when someone asks, I would explain it theoretically or rather unable
                                to share. The Module of this Program has been conceptualised in an exemplary way. The
                                execution was too good. Mr.Nitten was exceptional.<br>
                                Earlier paragraph, I had said,” I was unable to share the earlier training programmes
                                experiences with my friends, colleague or relatives”. I am so happy that I have started
                                sharing this little knowledge, gained ,with my Friends and Family. I had met 2 of my
                                Friends, through my IIM class,on Friday . I was sharing this experience of, 6 needs,
                                Daily renewals , Scramble pattern and Anchoring with them. They were astounded and said,
                                ”It sounds good and realistic”. Yesterday, it was with my wife and neighbours in my
                                Flat. They were all surprised to see a change in my body language and conversation.<br>
                                Moreover, during the Training we did this exercise of dropping the stories. I had done
                                this with my sister. I reached home yesterday night. I was sharing the happenings of
                                training program with my wife. During the course she said, ”Your sister called me daily
                                in the last 4 days. This has really worked for me. Thank you Nitten. You know what-
                                Today, I got up and then my son woke up. Along with him I shouted,” This is going to be
                                a great day”.<br>
                                This made me realise how Contribution and Growth can Change not only other’s lives ,but,
                                ours as well. It also made me realise the fact, that,” Language represents Internal
                                Experience”, one of the NLP Pre-suppositions is true.
                                <br>
                                I believe in the statement of ADI SANKARA—“What we know is 1/6th the size of our palm”.
                                I also understand, with the smattering knowledge one has, we can do wonders if we know
                                how to leverage it. This program has emphasized it.
                            </p>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>


        </div>
    </section><!-- #testimonials -->


    <!--==========================
      Team Section
    ============================-->
    <section id="team">
        <div class="container">
            <div class="section-header">
                <h3>Team</h3>
                <p></p>
            </div>

            <div class="row">

                <?php
                $teamDetails = Teams::getTeamDetails();
                if(!empty($teamDetails)) {
                    $tempCnt = 0;
                    foreach($teamDetails as $teamDetail) {
                ?>
                        <div class="col-lg-3 col-md-6 wow fadeInUp team-display<?=($tempCnt==0)?"":"-two"?>" data-wow-delay="0.1s">
                            <div class="member">
                                <img src="<?=$teamDetail['image']?>" class="img-fluid" alt="">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4><?=$teamDetail['name']?></h4>
                                        <div class="social">
                                            <a href="/project_base/team/<?=$teamDetail['id']?>"><i class="">View Profile</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        $tempCnt++;
                        if ($tempCnt == 3)
                            $tempCnt = 0;
                    }
                }
                ?>

            </div>

        </div>
    </section><!-- #team -->



    <!--==========================
      Potfolio Section
    ============================-->

    <!-- partners -->
    <section class="partners py-5" id="partners">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="tittle text-center font-weight-bold">Our Clients</h3>
            <p class="sub-tittle text-center mt-3 mb-sm-5 mb-4"></p>
            
                <?php
                $ourClientsDetails = PagesDetail::getPagesDetail(PagesDetail::OUR_CLIENTS_PAGES_ID, true);
                if(!empty($ourClientsDetails)) {
                    $tempCnt = 0;
                    foreach($ourClientsDetails as $ourClientsDetail) {
                        if ($tempCnt == 0)
                            echo '<div class="row grid-part text-center pt-4">';
                ?>
                        <div class="col-md-2 col-4">
                            <div class="parts-w3ls">
                                <a href="#"><img src="<?=$ourClientsDetail['page_image']?>" class="img-fluid client-details"></a>
                                <h4><?=strip_tags($ourClientsDetail['description'])?></h4>
                            </div>
                        </div>
                <?php
                        $tempCnt++;
                        if($tempCnt == 6) {
                            $tempCnt = 0;
                            echo '</div>';
                        }
                    }
                    if ($tempCnt != 0)
                        echo '</div>';
                }
                ?>
        </div>
    </section>
    <!-- //partners -->
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <img src="/project_base/img/Symbol.png">
                </div>
                <div class="row">

                    <div class="col-lg-1 col-md-6 footer-links ">
                        <!--  -->
                    </div>
                    <div class="col-lg-4 col-md-6 footer-info ">

                        <h3>Test</h3>
                        <p>At Te, tsthe emphasis of our work is on not just telling people WHAT to do but to impart
                            specific tools and methods about HOW to do it, in order to achieve results.We strongly
                            believe that knowledge has to be channeled into the application to day-to-day life to create
                            new possibilities.</p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links ">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="/project_base">Home</a></li>
                            <li><a href="/project_base/site/about">About us</a></li>
                            <li><a href="/project_base/site/contact">Contact Us</a></li>
                            <!-- <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Privacy policy</a></li> -->
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-contact ">
                        <h4>Contact Us</h4>
                        <p>
                        project base Consultants<br>
                            A2-302, Atharav Ganga,<br>
                            Opp. State Bank Nagar,<br>
                            Sus Road, Pashan, Pune-411021<br>
                            <strong>Phone:</strong> +91 +91 9619487431<br>
                            <strong>Email:</strong> info@project_base.co.in<br>
                        </p>

                        <div class="social-links">
                            <a href="https://twitter.com/mahadik_nitten" target="_blank" class="twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com/Nitten-V-Mahadik-3351351534890941/?modal=admin_todo_tour"
                                target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UCHbTCH2FgwDVGLweeXC1OZg" target="_blank"
                                class="google-plus"><i class="fa fa-youtube"></i></i></a>
                            <a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>project base</strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="http://www.techefforts.com/" target="_blank">Tech Efforts</a>
            </div>
        </div>
    </footer><!-- #footer -->
    <?php
    if (class_exists('yii\debug\Module')) {
      $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
  }
    ?>