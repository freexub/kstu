<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\widgets\MultiLang\MultiLang;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#212121"/>
    <meta name="msapplication-navbutton-color" content="#212121"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#212121"/>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100 triger-anime">
<!-- Navigation
    ================================================== -->
<div class="animsition">
    <div class="navigation-wrap cbp-af-header header-dark">
        <div class="section d-none d-xl-block nav-border-bottom-light">
            <div class="section-1400">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-auto align-self-center">
                            <p class="mb-0 size-13 text-center-v color-gray-light"><i class="uil uil-calling size-18 mr-2 color-white"></i> +28 (273) 283 293</p>
                        </div>
                        <div class="col-auto align-self-center">
                            <p class="mb-0 size-13 text-center-v color-gray-light"><i class="uil uil-envelope-check size-18 mr-2 color-white"></i> hello@kstu.kz</p>
                        </div>
                        <div class="col-auto align-self-center">
                            <p class="mb-0 size-13 text-center-v color-gray-light"><i class="uil uil-map-marker-plus size-18 mr-2 color-white"></i> Караганда, пр. Нурсултана Назарбаева 56</p>
                        </div>
                        <div class="col align-self-center pr-5 text-right">
                            <!--a href="login-1.html" class="link link-gray size-14 animsition-link" data-hover="Login">Login</a>
                            <a href="register-1.html" class="link link-gray size-14 ml-2 animsition-link" data-hover="Register">Register</a>
                            <a href="faq-1.html" class="link link-gray size-14 ml-2 animsition-link" data-hover="FAQ">FAQ</a>
                            <a href="careers.html" class="link link-gray size-14 ml-2 animsition-link" data-hover="Careers">Careers</a>
                            <a href="contact-1.html" class="link link-gray size-14 ml-2 animsition-link" data-hover="Contact">Contact</a-->
                        </div>
                        <div class="col-auto align-self-center text-right">
                            <a href="#" class="link link-primary size-14" data-hover="Facebook">Facebook</a>
                            <a href="#" class="link link-primary size-14 ml-2" data-hover="Instagram">Instagram</a>
                            <a href="#" class="link link-primary size-14 ml-2" data-hover="Twitter">Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="padding-on-scroll">
            <div class="section-1400">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-expand-xl navbar-light">

                                <a class="navbar-brand animsition-link" href="index.html"><img src="img/logo-.png" alt="logo"></a>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ml-auto pt-4 pt-xl-0 mr-xl-4">
                                        <li class="nav-item dropdown mega-menu-dropdown-link">
                                            <a class="nav-link active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Главная</a>
                                        </li>
                                        <li class="nav-item dropdown mega-menu-dropdown-link">
                                            <a class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Университет</a>
                                            <div class="dropdown-menu mega-menu-dropdown mega-menu-background-1">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">О КарТУ</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-mixed.html">Миссия университета</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-2.html">История университета</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-3.html">Структура</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-4.html">Стратегическии важны </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-5.html">Видеоинструкция для регистрации на грант</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-6.html">Классификатор соответствий</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Магистратура</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-1.html">1 column</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-5.html">5 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-6.html">6 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Докторантура</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-left-sidebar.html">Left sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-right-sidebar.html">Right sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-both-sidebars.html">Both sidebars</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-width.html">100% width</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-slice-revealer.html">Slice revealer</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-screen.html">Full-screen</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Колледж</h6>
                                                            <ul class="p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-1.html">Project page v1</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-2.html">Project page v2</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-3.html">Project page v3</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-4.html">Project page v4</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-5.html">Project page v5</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-6.html">Project page v6</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown mega-menu-dropdown-link">
                                            <a class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Абитуриенту</a>
                                            <div class="dropdown-menu mega-menu-dropdown">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Бакалавриат</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-mixed.html">Образовательные программы</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-2.html">Положение о творческом экзамене</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-3.html">Подготовительные курсы ЕНТ</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-4.html">Перечень документов для зачисления</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-5.html">Видеоинструкция для регистрации на грант</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-6.html">Классификатор соответствий</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Магистратура</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-1.html">1 column</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-5.html">5 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-6.html">6 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Докторантура</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-left-sidebar.html">Left sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-right-sidebar.html">Right sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-both-sidebars.html">Both sidebars</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-width.html">100% width</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-slice-revealer.html">Slice revealer</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-screen.html">Full-screen</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Колледж</h6>
                                                            <ul class="p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-1.html">Project page v1</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-2.html">Project page v2</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-3.html">Project page v3</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-4.html">Project page v4</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-5.html">Project page v5</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-6.html">Project page v6</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown mega-menu-dropdown-link">
                                            <a class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Первокурснику</a>
                                            <div class="dropdown-menu mega-menu-dropdown">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Masonry</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-mixed.html">Mixed columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-5.html">5 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-6.html">6 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Grid</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-1.html">1 column</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-5.html">5 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-6.html">6 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Layouts</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-left-sidebar.html">Left sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-right-sidebar.html">Right sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-both-sidebars.html">Both sidebars</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-width.html">100% width</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-slice-revealer.html">Slice revealer</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-screen.html">Full-screen</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Single project</h6>
                                                            <ul class="p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-1.html">Project page v1</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-2.html">Project page v2</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-3.html">Project page v3</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-4.html">Project page v4</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-5.html">Project page v5</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-6.html">Project page v6</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown mega-menu-dropdown-link">
                                            <a class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Студенту</a>
                                            <div class="dropdown-menu mega-menu-dropdown">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Masonry</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-mixed.html">Mixed columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-5.html">5 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-6.html">6 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Grid</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-1.html">1 column</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-5.html">5 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-6.html">6 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Layouts</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-left-sidebar.html">Left sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-right-sidebar.html">Right sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-both-sidebars.html">Both sidebars</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-width.html">100% width</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-slice-revealer.html">Slice revealer</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-screen.html">Full-screen</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Single project</h6>
                                                            <ul class="p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-1.html">Project page v1</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-2.html">Project page v2</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-3.html">Project page v3</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-4.html">Project page v4</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-5.html">Project page v5</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-6.html">Project page v6</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown mega-menu-dropdown-link">
                                            <a class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Сотруднику</a>
                                            <div class="dropdown-menu mega-menu-dropdown">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Masonry</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-mixed.html">Mixed columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-5.html">5 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-masonry-6.html">6 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Grid</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-1.html">1 column</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-5.html">5 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-grid-6.html">6 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Layouts</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-left-sidebar.html">Left sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-right-sidebar.html">Right sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-both-sidebars.html">Both sidebars</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-width.html">100% width</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-slice-revealer.html">Slice revealer</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="portfolio-full-screen.html">Full-screen</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Single project</h6>
                                                            <ul class="p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-1.html">Project page v1</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-2.html">Project page v2</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-3.html">Project page v3</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-4.html">Project page v4</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-5.html">Project page v5</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="project-6.html">Project page v6</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown mega-menu-dropdown-link">
                                            <a class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Блоги</a>
                                            <div class="dropdown-menu mega-menu-dropdown">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Masonry</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-mixed.html">Mixed columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-masonry-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-masonry-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-masonry-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-masonry-5.html">5 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Grid</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-grid-1.html">1 column</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-grid-2.html">2 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-grid-3.html">3 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-grid-4.html">4 columns</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-grid-5.html">5 columns</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Post page</h6>
                                                            <ul class="pb-2 p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="post-1.html">Post page v1</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="post-2.html">Post page v2</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="post-3.html">Post page v3</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="post-4.html">Post page v4</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="post-5.html">Post page v5</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3">
                                                            <h6 class="mb-0 my-2 pl-xl-3 color-secondary">Layouts</h6>
                                                            <ul class="p-0 m-0">
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-left-sidebar.html">Left sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-right-sidebar.html">Right sidebar</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-both-sidebars.html">Both sidebars</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-full-width.html">100% width</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="dropdown-item animsition-link" href="blog-slice-revealer.html">Slice revealer</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="pb-3 pb-xl-0"></div>
                                </div>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->beginBody() ?>

<header>
    <?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
//        ],
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav'],
//        'items' => [
//            ['label' => Yii::t('app', 'Главная'), 'url' => ['/site/index']],
//            [
//                'label' => Yii::t('app', 'Университет'),
//                'items' => [
//                    ['label' => Yii::t('app', 'Миссия университета'), 'url' => '#'],
//                    ['label' => Yii::t('app', 'История Университета'), 'url' => '#'],
//                    ['label' => Yii::t('app', 'Структура'), 'url' => '#'],
//               ],
//            ],
//            ['label' => Yii::t('app', 'Контакты'), 'url' => ['/site/contact']],
//            ['label' => Yii::t('app', 'Post'), 'url' => ['/post/index']],
//            Yii::$app->user->isGuest ? (
//                ['label' => Yii::t('app', 'Вход'), 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            ),
//            [
//                'label' => 'RBAC',
//                'url' => ['/rbac'],
//                'visible' => !Yii::$app->user->isGuest,
//            ],
//        ],
//    ]);
//    echo MultiLang::widget(['cssClass'=>'float-right']);
//    NavBar::end();
    ?>
</header>

    <div class="section over-hide">
        <main role="main" class="flex-shrink-0">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
        </main>

        <div class="section over-hide padding-top-80 pb-4 bg-light section-background-3" id="footer">
            <div class="section-1400">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 mb-5 mb-md-0 text-center text-lg-left">
                            <h5 class="mb-4 color-dark-blue">Быстрые ссылки</h5>
                            <a href="about-us-creative.html" class="link size-18 mb-1 animsition-link" data-hover="Новости">Новости</a>
                            <div class="clearfix w-100"></div>
                            <a href="contact-1.html" class="link size-18 mb-1 animsition-link" data-hover="Даты и факты об университете">Даты и факты об университете</a>
                            <div class="clearfix w-100"></div>
                            <a href="blog-mixed.html" class="link size-18 mb-1 animsition-link" data-hover="Объекты кампуса">Объекты кампуса</a>
                            <div class="clearfix w-100"></div>
                            <a href="services-creative.html" class="link size-18 mb-1 animsition-link" data-hover="Посетить университет">Посетить университет</a>
                            <div class="clearfix w-100"></div>
                            <a href="portfolio-mixed.html" class="link size-18 animsition-link" data-hover="Соискатель ученых званий">Соискатель ученых званий</a>
                            <div class="clearfix w-100"></div>
                            <a href="portfolio-mixed.html" class="link size-18 animsition-link" data-hover="Версия для слабовидящих">Версия для слабовидящих</a>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-5 mb-md-0 text-center text-lg-left">
                            <h5 class="mb-4 color-dark-blue">Полезные ссылки</h5>
                            <a href="" class="link size-18 mb-1" data-hover="Академическая политика">Академическая политика</a>
                            <div class="clearfix w-100"></div>
                            <a href="" class="link size-18 mb-1" data-hover="Дипломы собственного образца 2021 года">Дипломы собственного образца 2021 года</a>
                            <div class="clearfix w-100"></div>
                            <a href="" class="link size-18 mb-1" data-hover="Мы против коррупции!">Мы против коррупции!</a>
                            <div class="clearfix w-100"></div>
                            <a href="" class="link size-18 mb-1" data-hover="Научная библиотека">Научная библиотека</a>
                            <div class="clearfix w-100"></div>
                            <a href="" class="link size-18" data-hover="Госзакупки">Госзакупки</a>
                        </div>
                        <div class="col-md-6 col-lg-3 text-center text-lg-left">
                            <h5 class="mb-4 color-dark-blue">Популярные ссылки</h5>
                            <a href="" class="link size-18 mb-1" data-hover="Исследовательские центры и лаборатории">Исследовательские центры и лаборатории</a>
                            <div class="clearfix w-100"></div>
                            <a href="" class="link size-18 mb-1" data-hover="Образовательные программы">Образовательные программы</a>
                            <div class="clearfix w-100"></div>
                            <a href="" class="link size-18  mb-1" data-hover="Вакансии сотрудников">Вакансии сотрудников</a>
                            <div class="clearfix w-100"></div>
                            <a href="" class="link size-18  mb-1" data-hover="Вакантные гранты для обучающихся">Вакантные гранты для обучающихся</a>
                            <div class="clearfix w-100"></div>
                            <a href="" class="link size-18  mb-1" data-hover="Оплата за обучение">Оплата за обучение</a>
                        </div>
                        <div class="col-lg-3 mb-3 mb-lg-0 text-center text-lg-left">
                            <h5 class="mb-4 color-dark-blue">Мы в социальных сетях</h5>
                            <a href="" class="link link-primary mb-1 mr-2" data-hover="Facebook">Facebook</a>
                            <a href="" class="link link-primary mb-1 mr-2" data-hover="Youtube">Youtube</a>
                            <a href="" class="link link-primary mb-1" data-hover="Instagram">Instagram</a>
                        </div>
                        <div class="col-12 mt-5 mb-4">
                            <div class="section divider divider"></div>
                        </div>
                    </div>
                    <div class="row text-center text-md-left">
                        <div class="col-md-auto">
                            <a href="sitemap.html" class="link link-normal text-center-v animsition-link">Sitemap <i class="uil uil-arrow-right size-20 ml-1"></i></a>
                        </div>
                        <div class="col-md order-md-first">
                            <p class="mb-0 size-14 color-gray-dark mt-1 font-weight-500">© 2021 Карагандинский технический университет.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
            </svg>
        </div>
    </div>

    <?php $this->endBody() ?>
</div>
</body>
</html>
<?php $this->endPage() ?>
