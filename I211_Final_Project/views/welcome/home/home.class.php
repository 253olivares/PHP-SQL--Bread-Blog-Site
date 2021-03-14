<?php
/**
 * Author: Izzy Lopez
 * Date: 4/19/2020
 * File: home.class.php
 * Description: This class defines the method "display" that displays the home page.
 */

class Home extends IndexView {
    public function display() {
        //display page header
        parent::displayHeader("CI Home Page");
        ?>

        <div align="center"><div id="main-header" style="text-align: center">Welcome to Clout Intelligence!</div></div>
        <hr>
        <br>
        <!--Izzy add your html code here!-->
        <div class="wel">
            <div class="block">

                <div style="color: #2d33a1; margin: 12px; font-size: 20px; text-align: center;"><b>Our Mission</b></div>

                <p class="textbox">  Our website consists of a list of 50 famous people
                    such as television personnel, political leaders,
                    and singers. Data from each one of these celebrities is taken and put through a filter, it is then
                    categorized to determine the frequency for the
                    five personality dimensions for each celebrity.<br> <br><br> The five personality dimensions being Extraversion,
                    Agreeableness, Conscientiousness, Neuroticism, Openness.</p>
            </div>

            <div class="block2" style="height: 1420px;">

                <h1 class="title" style="font-size: 20px; text-align: center;"> &nbsp;&nbsp;Research Details</h1>
                <p id="text">
                    Our website is part of the research being carried out Professor Louie , Ran and Fawzi’s current research titled
                    “Enhancing the Informatics curriculum by bridging signature assignments and assessing learning outcomes
                    of three required core courses”.<br> <br>


                    We will be carrying out this research by using data that was collected and mined by students in I421 and
                    applying what we learned in I202 to bridge together the courses through signature final projects.
                    The goal of our project is to create a way to visualize the data, that was mined and create an
                    interactive way to display it. We hope our participation in this research brings clarity and insight for
                    students coming behind us, so our professor can provide the very best education for future scholars.
                </p>
                <div >
                    <img id= "gif" src='<?= BASE_URL ?>/www/img/celebrities/Zendaya.gif'>
                    <p class="textbox"> This is another famous celebrity found on our website!  </p>
                </div>
            </div>

            <!--this is a block -->
            <div>
                <div style="color: #2d33a1; font-family: Courier New, Courier, monospace; margin: 12px; font-size: 20px;"><b>&nbsp;&nbsp;&nbsp;&nbsp; Click on a Personality Dimensions and Learn More!</b></div>

                <div style="width: 500px; margin-left: 110px;">
                    <button style="width: 100%;float: left; margin: 2px; padding-left: 5px;" class="open-button" onclick="openBox()">Neuroticism</button>

                    <div class="form-popup" id="myBox">
                        <form class="form-container">
                            <h3> Neuroticism Description/Keywords</h3>
                            <h4> Keywords: I, me, myself; mine, my, damn you, f word, so, I am the best, sad, happy, hate, hater </h4>
                            <p> <h4> Description: </h4> Indicates the emotional stability degree. People who have low degree of neuroticism are calm, secure and confident whereas the opposite anxious, insecure and moody </p>
                            <button type="button" class="btn cancel" onclick="closeBox()">Go to another!</button>
                        </form>
                    </div>
                </div>

                <div style="width: 500px; margin-left: 110px;">
                    <button style="width: 100%; float: left; margin: 2px; " class="open-button" onclick="openBox1()">Openness</button>

                    <div class="form-popup" id="myBox1">
                        <form class="form-container">
                            <h3> Openness Description/Keywords</h3>
                            <h4> Keywords:  Culture, creative, open, intellectual, appreciate </h4>
                            <p> <h4> Description: </h4> Related with creative, cultural and intellectual interest </p>
                            <button type="button" class="btn cancel" onclick="closeBox1()">Go to another!</button>
                        </form>
                    </div>
                </div>
                <div style="width: 500px; margin-left: 110px;">

                    <button style="width: 100%; float: left; margin: 2px; " class="open-button" onclick="openBox2()">Conscientiousness</button>

                    <div class="form-popup" id="myBox2">
                        <form class="form-container">
                            <h3> Conscientiousness Description/Keywords</h3>
                            <h4>   Keywords: I am aware, proud, achieve, accomplish, success, know </h4>
                            <p> <h4> Description: </h4> Refers to the degree of achievement orientation. Being hardworking, organize and reliable is linked with high score </p>
                            <button type="button" class="btn cancel" onclick="closeBox2()">Go to another!</button>
                        </form>
                    </div>

                </div>
                <div style="width: 500px; margin-left: 110px;">

                    <button style="width: 100%; float: left; margin: 2px;  " class="open-button" onclick="openBox3()">Agreeableness</button>

                    <div class="form-popup" id="myBox3">
                        <form class="form-container">
                            <h3> Agreeableness Description/Keywords</h3>
                            <h4>  Keywords: Thank you, love, kind, nice, cooperate, together</h4>
                            <p><h4> Description: </h4>  Personality traits such as cooperativeness, kindness and trust </p>

                            <button type="button" class="btn cancel" onclick="closeBox3()">Go to another!</button>
                        </form>
                    </div>

                </div>
                <div style="width: 500px; margin: 110px;">

                    <button style="width: 100%; margin: 2px; float: left; padding-top:15px;" class="open-button" onclick="openBox4()"> Extraversion</button>

                    <div class="form-popup" id="myBox4">
                        <form class="form-container">
                            <h3> Extraversion Description/Keywords</h3>
                            <h4> Keywords: # of posts and length of posts </h4>
                            <p> <h4> Description: </h4> Degree of activeness, sociability, and talkativeness </p>
                            <button type="button" class="btn cancel" onclick="closeBox4()">Go to another!</button>
                        </form>
                    </div>



                </div>
            </div>

            <div class="block3">
                <div id="bernie">
                    <h3 class=" titles"> Bernie Sanders </h3>
                    <img class="photo " src='<?= BASE_URL ?>/www/img/celebrities/OldManBernie.png'
                         style="width: 200px;  height: 205px; padding-left: 70px;">

                    <p style="text-align: center;">
                        <a href="https://www.instagram.com/berniesanders/" class="fa fa-instagram"></a>
                        <a href="https://twitter.com/BernieSanders" class="fa fa-twitter"></a>

                    </p>
                </div>

                <div id="trump">
                    <h3 class=" titles"> Donald Trump </h3>
                    <img id="trumpphoto" src='<?= BASE_URL ?>/www/img/celebrities/trump.png'">
                    <p style="text-align: center;"> <a href="https://www.facebook.com/donaldtrump/" class="fa fa-facebook"></a>
                        <a href=" https://www.twitter.com/realDonaldTrump" class="fa fa-twitter"></a>

                    </p>
                </div>
            </div>

            <div class="block4">
                <div id="obama">
                    <h3 class=" titles"> Barack Obama </h3>
                    <img class="photo " src='<?= BASE_URL ?>/www/img/celebrities/Obama.png'
                         style="width: 200px;  height: 205px; padding-left: 70px;">
                    <p style="text-align: center;">
                        <a href="https://twitter.com/barackobama" class="fa fa-twitter"></a>
                    </p>
                </div>

                <div id="ryan">
                    <h3 class=" titles"> Ryan Reynolds </h3>
                    <img class="photo " src='<?= BASE_URL ?>/www/img/celebrities/RyanR.png'
                         style="width: 200px;  height: 205px; padding-left: 72px;">
                    <p style="text-align: center;">
                        <a href="https://twitter.com/vancityreynolds" class="fa fa-twitter"></a>
                    </p>
                    <br>
                </div>
                <br>
            </div>
            <br>

                <script>
                    function openBox() {
                        document.getElementById("myBox").style.display = "block";
                    }

                    function closeBox() {
                        document.getElementById("myBox").style.display = "none";
                    }

                    function openBox1() {
                        document.getElementById("myBox1").style.display = "block";
                    }

                    function closeBox1() {
                        document.getElementById("myBox1").style.display = "none";
                    }

                    function openBox2() {
                        document.getElementById("myBox2").style.display = "block";
                    }

                    function closeBox2() {
                        document.getElementById("myBox2").style.display = "none";
                    }

                    function openBox3() {
                        document.getElementById("myBox3").style.display = "block";
                    }

                    function closeBox3() {
                        document.getElementById("myBox3").style.display = "none";
                    }

                    function openBox4() {
                        document.getElementById("myBox4").style.display = "block";
                    }

                    function closeBox4() {
                        document.getElementById("myBox4").style.display = "none";
                    }
                </script>

            </div>
            <br><br>
        </div><br>

        <?php
        //display page footer
        parent::displayFooter();
    }
}