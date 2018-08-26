@extends('layouts.master')

@section('hero')
    @component('partials.hero')
        @slot('title')
            Hi, I'm Mikey.
        @endslot

        @slot('description')
            <p>I'm a {{ date('Y') - 1991 }} year old web developer from Nottingham in the UK.</p> 
            <p>I specialise in <a href="https://laravel.com" target="_blank">Laravel</a>, but I am also proficient in <a href="#languages" class="scrolly">many other programming languages</a>.</p> 
            <p>I have been developing for the web for {{ date('Y') - 2004 }} years, and have been doing so commercially for {{ date('Y') - 2010 }} years.</p>
            <p>I'm currently the Lead Developer at <a href="https://fifteen.co.uk" target="_blank">Fifteen</a>, and <a href="#contact" class="scrolly">available for freelance work.</a></p>
            <br>
        @endslot
    @endcomponent
@endsection

@section('content')
<div class="inner">
    <!-- Intro -->
    <section id="languages" class="special">
        <header class="major">
            <h2>What I do</h2>
            <p>I consider myself a Full Stack Developer and DevOps Engineer. Though the definition changes on a day to day basis, what it essentially boils down to is being able to read and comprehend code written in many different styles and languages, on many different platforms.</p>
            <p>My daily driver is Laravel for my server side application logic and VueJS as my front-end datalayer. I also recognise that not all projects do not have to be as bespoke, and as such I also work with WordPress.</p>
            <p>I have previously worked with multiple frameworks for PHP, including Zend Framework, CakePHP, CodeIgniter and Symfony. I am proficient with what I consider the basics of the web also, these being HTML5, CSS3, and the various ECMAScripts.</p>
            <p>I am also proficient in server side technologies such as; Nginx, Apache, MySQL, MariaDB, as well as Amazon's various offerings.</p>
        </header>
        <ul class="icons large series">
            <li title="Laravel" class="icon fab fa-laravel"></li>
            <li title="VueJS" class="icon fab fa-vuejs"></li>
            <li title="PHP7" class="icon fab fa-php"></li>
            <li title="HTML5" class="icon fab fa-html5"></li>
            <li title="CSS3" class="icon fab fa-css3-alt"></li>
            <li title="ECMAScript" class="icon fab fa-js"></li>
            <li title="NodeJS" class="icon fab fa-node-js"></li>
            <li title="Python3" class="icon fab fa-python"></li>
            <li title="MySQL, MariaDB Databases" class="icon fas fa-database"></li>
            <li title="DevOps" class="icon fas fa-server"></li>
            <li title="WordPress" class="icon fab fa-wordpress-simple"></li>
        </ul>
    </section>
    
    <!-- Portfolio -->
    <section class="special">
        <header class="major">
            <h2>Previous Projects</h2>
            <p>I'm always immensely proud of my work, as I put my heart and soul into it.</p>
            <p>However, with over 100 websites to my name, listing them all is always going to be a challenge. Please find below a small selection of the work which I am most proud of.</p>
        </header>
    </section>
    <section class="highlights">
        <section>
            <a class="image" href="https://www.gamefront.com" target="_blank">
                <img src="images/gamefront-fullpage.jpg" data-position="center center" alt="GameFront">
            </a>
            <div class="content">
                <header class="major">
                    <h2>GameFront</h2>
                    <p>Gaming Mods, News and Community Forums. Previously in the North American top 100 websites, holding over 1,000,000 gaming files with a network of over 80 gaming sites.</p>
                </header>
                <p>Overseeing the rebirth what was once a web giant was always going to be tricky, and GameFront was no exception. With over 6 million records to deal with, this has been the most challenging project of my career. It has also been the most rewarding. I learnt so much writing GameFront from the ground up, and continue learning to this day.</p>
                <ul class="actions">
                    <li><a href="https://www.gamefront.com" target="_blank" class="button">Visit GameFront</a></li>
                </ul>
            </div>
        </section>
        <section>
            <a class="image" href="https://mytrackr.app" target="_blank">
                <img src="images/mytrackr-fullpage.png" data-position="center center" alt="mytrackr">
            </a>
            <div class="content">
                <header class="major">
                    <h2>mytrackr</h2>
                    <p>Time Tracking Application built over the course of a weekend for <a href="https://larahack.com" target="_blank" rel="nofollow">Larahack</a>.</p>
                </header>
                <p>Built over the course of a weekend for Larahack, eventually winning the contest, mytrackr is a time management application aimed at freelancers wanting to be able to manage their time more effectively.</p>
                <ul class="actions">
                    <li><a href="https://mytrackr.app" target="_blank" class="button">Visit mytrackr</a></li>
                </ul>
            </div>
        </section>
        <section>
            <a class="image" href="https://laravelphp.uk" target="_blank">
                <img src="images/laraveluk-fullpage.png" data-position="center center" alt="LaravelUK">
            </a>
            <div class="content">
                <header class="major">
                    <h2>LaravelUK</h2>
                    <p>Working as a part of a team to build a website for our Slack Community</p>
                </header>
                <p>Working with a team of artisans over the weekend of the first Larahack, the aim was to create a functional website using new technologies which were then unfamiliar to me, such as Vue Router, VueX and Tailwind CSS. The result came out great, and it's nice that our little Slack Community has a place to call home.</p>
                <ul class="actions">
                    <li><a href="https://laravelphp.uk" target="_blank" class="button">Visit LaravelUK</a></li>
                </ul>
            </div>
        </section>
    </section>

    <!-- Blog -->
    <section id="blog-intro" class="special">
        <header class="major">
            <h2>Blog</h2>
            <p>Occasionally I'll write about industry news, my thoughts and opinions, package releases, etc. You can see my latest blog posts below.</p>
        </header>
        <footer class="major">
            <ul class="actions special">
                <li><a href="{{route('posts.index')}}" class="button">View All</a></li>
            </ul>
        </footer>
    </section>

    <section id="blog" class="spotlights special">
        <section>
            <header class="major">
                <h3>Neque donec lorem</h3>
            </header>
            <div class="image fit">
                <img src="images/pic04.jpg" alt="" >
            </div>
            <p>Aliquet nisl, ac commodo neque est et dolor. Donec sed amet ornare, justo non pulvinar interdum, neque justo auctor lectus, facilisis imperdiet diam tempus lorem ipsum dolor.</p>
            <ul class="actions special">
                <li><a href="#" class="button">Learn More</a></li>
            </ul>
        </section>
        <section>
            <header class="major">
                <h3>Magna tempus nisl</h3>
            </header>
            <div class="image fit">
                <img src="images/pic05.jpg" alt="" >
            </div>
            <p>Aliquet nisl, ac commodo neque est et dolor. Donec sed amet ornare, justo non pulvinar interdum, neque justo auctor lectus, facilisis imperdiet diam tempus lorem ipsum dolor.</p>
            <ul class="actions special">
                <li><a href="#" class="button">Learn More</a></li>
            </ul>
        </section>
        <section>
            <header class="major">
                <h3>Diam sed interdum</h3>
            </header>
            <div class="image fit">
                <img src="images/pic06.jpg" alt="" >
            </div>
            <p>Aliquet nisl, ac commodo neque est et dolor. Donec sed amet ornare, justo non pulvinar interdum, neque justo auctor lectus, facilisis imperdiet diam tempus lorem ipsum dolor.</p>
            <ul class="actions special">
                <li><a href="#" class="button">Learn More</a></li>
            </ul>
        </section>
        <section>
            <header class="major">
                <h3>Justo aliquet magna</h3>
            </header>
            <div class="image fit">
                <img src="images/pic07.jpg" alt="" >
            </div>
            <p>Aliquet nisl, ac commodo neque est et dolor. Donec sed amet ornare, justo non pulvinar interdum, neque justo auctor lectus, facilisis imperdiet diam tempus lorem ipsum dolor.</p>
            <ul class="actions special">
                <li><a href="#" class="button">Learn More</a></li>
            </ul>
        </section>
    </section>
</div>
@endsection
