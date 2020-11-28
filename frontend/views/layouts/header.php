<?php
use yii\helpers\Url;
?>
<header id="header" class="fixed-top">
        <div class="container-fluid top-header">
            <div class="logo float-left">
                <h1 class="text-light"><a href="#header"><img src="/project_base/img/Transvivo Logo.png"></a></h1>
                <!-- <h1 class="text-light"> <img src="img/project_base Logo.png"></h1> -->
            </div>
            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li class=""><a href="/project_base">Home</a></li>
                    
                    <li class="<?=(strpos(Url::current(), 'executive-coaching'))? 'active' : '' ?>"><a href="/project_base/courses/executive-coaching">Executive Coaching</a></li>
                    <li class=""><a href="/project_base/courses/sales-training">Sales Training</a></li>
                    <li class="drop-down"><a href="">Mindfulness Training</a>
                        <ul>
                            <li><a href="/project_base/courses/mindfulness-for-teachers">Teachers</a></li>
                            <li><a href="/project_base/courses/motivational-training">Motivational Training</a></li>
                            <li><a href="/project_base/courses/mindfulness-for-students">Students</a></li>
                            <li><a href="/project_base/courses/mindfulness-for-sportspersons">Sports People</a></li>
                            <li><a href="/project_base/courses/mindfulness-for-well-being-and-leadership">Mindfulness for Well Being and leadership</a></li>

                        </ul>
                    </li>
                    <li class=""><a href="/project_base/courses/theatre-based-communication-training">Theater Based Communinication Training</a></li>

                    <li><a href="/project_base/site/contact">Contact Us</a></li>
                </ul>
            </nav><!-- .main-nav -->
        </div>
    </header><!-- #header -->

   