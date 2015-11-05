<!DOCTYPE HTML>
<!--
    Retrospect by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>Adventure Time</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <base href="/" >
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/stylesheets/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/stylesheets/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/stylesheets/ie9.css" /><![endif]-->
    </head>
    <body >

        <!-- Header -->
            <header id="header" >
                <h1><a href="home">AdventureTime</a></h1>
                <a href="#nav">Menu</a>
            </header>

        <!-- Nav -->
            <nav id="nav">
                <ul class="links">
                    <li><a href="home">Home</a></li>
                    <!--Add here some usefull links (generated by php ) -->
                    <li><a href="error">Error</a></li>
                </ul>
                <?php 
                    if(isset($_SESSION['logged'])){
                        require $_SESSION['role'].'-menu.php';
                    }
                    else require 'user-menu.html'; 
            ?>
            </nav>

        <!-- Banner -->
            <section id="banner">
                <i class="icon fa-diamond"></i>
                <h2>This is our Blog website</h2>
                <p>Just wait for it, it's gonna be legen...DARY</p>
                <ul class="actions">
                    <li><a  class="button big special">Pointless Button</a></li>
                </ul>
            </section>

