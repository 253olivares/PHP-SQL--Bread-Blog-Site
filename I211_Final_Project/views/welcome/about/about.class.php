<?php
/**
 * Author: Izzy Lopez
 * Date: 4/19/2020
 * File: about.class.php
 * Description: This class defines the method "display" that displays the about page.
 */

class About extends IndexView {
    public function display() {
        //display page header
        parent::displayHeader("CI About Page");
        ?>

        <div align="center"><div id="main-header" style="align-content: center">Introducing the Professors!</div></div>
        <hr>
        <br>
        <!--Izzy add your html code here!-->
        <div class="wel">
            <div class="div">
                <div id="Ran">
                    <h3 class="title" style=" padding-top: 30px;"> Ran Chang </h3>
                    <p class="title" style="padding-left: 30px;"> Ran Chang is a Professor at the School of Informatics and Computing at
                        IUPUI. Ran teaches a total of 5 different courses at IUPUI.
                        Chang has two masters degree from two different University, both pertaining to Electrical Engineering.
                        In 2014 he received his Doctorate in computer science. That allows him to use both of his background to
                        able to work in the research and development of driverless, electric vehicles, as well as be able to
                        work with large databases. A fun fact about Chang, being that he is a published book author. </p>
                </div>
                <img id= "prof" src='<?= BASE_URL ?>/www/img/teachers/RanChang.jpg'">
            </div>
            <br>

            <div class="div" >
                <div id="Louie">
                    <h3 class="title1"> Louie Zhu</h3>
                    <p style="height: 40px;" class="title1">
                        Liugen Zhu, also known as Louie Zhu,    is a professor at the School of Informatics and Computing at IUPUI.
                        Louie received his master’s in the computer science from the University of Illinois.
                        Louie’s accomplishments also include a doctorates degree from University of Illinois in Urbana-Champaign.
                        Louie is a big believe in innovation, especially when it comes to teaching. He has created a variety of tools
                        to help student engage in their learning. An example of this is being Louie’s Code Lab, a website created for
                        the purpose to help student learn. Along with these tools he is also on the leadership team for the LiFt scholars’
                        program. A program aimed to bring diversity and encourage student to purse a career in information science.
                        A fun fact about Louie is that he received the Indiana
                        University trustees teaching award for all the amazing and positive impact he brings to students.
                    </p>
                </div>
                <img id= "prof2" src='<?= BASE_URL ?>/www/img/teachers/LouieZhu.jpg'">
            </div>
            <br>

            <div class="div">
                <div id="Fawzi">
                    <h3 class="title" style="padding-top: 10px;"> Fawzi Ben-Messaoud  </h3>
                    <p class="title" style=" padding-left: 20px;">
                        Fawzi Ben-Messaoud is a professor at the School of Informatics and Computing at IUPUI.
                        Fawzi’s background is information technology, receiving a masters form the university
                        of Mary Hardin- Baylor, and his doctorate from the Capella University. Fawzi has a long
                        list of accomplishment, a couple steming from work he has done in the FBI as a special
                        agent. Along with his work at the FBI he was also able to create a security system to that
                        was able to meet NSA stands, being able to receive national security system approval in 2007.
                        Fawzi makes an impact on students everyday with the classes and research is conducts, some of
                        his research even bring on current students. He teaches three core classes in the Informatics
                        degree at SOIC and research areas include, data transformation and AI intelligence.
                    </p>

                </div>
                <img id= "prof3" src='<?= BASE_URL ?>/www/img/teachers/Fawzi.jpg'">
            </div>


            <img id= "gif2" src='<?= BASE_URL ?>/www/img/teachers/AboutThem.gif'">
        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }
}