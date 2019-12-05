<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="<?=URL?>"/>
    <title>باشگاه علیزاده</title>
    <base href="<?=URL?>">
    <link rel="icon" href="<?=URL?>/public/img/icon.png">
    <link rel="stylesheet" href="<?=URL?>public/css/bootstrap.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="public/library/fontAwsome/css/all.css">
    <link rel="stylesheet" href="<?=URL?>public/css/all.css">
    <link rel="stylesheet" href="<?=URL?>public/css/iranyekan.css">
    <link rel="stylesheet" href="<?=URL?>public/css/costomstyle.css">
    <link rel="stylesheet" href="<?=URL?>public/css/stylePersian.css">
    <link rel="stylesheet" href="public/css/fontAwesome/css/all.css">
    <script src="<?=URL?>public/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?=URL?>public/js/popper.min.js"></script>
    <script src="<?=URL?>public/js/bootstrap.min.js"></script>
    <script src="<?=URL?>public/js/k.js"></script>
    <link href="<?=URL?>public/css/jquery.md.bootstrap.datetimepicker.style.css" rel="stylesheet">
    <script src="<?=URL?>public/js/jquery.md.bootstrap.datetimepicker.js" type="text/javascript"></script>

</head>
<body>

<div style="background: url(public/img/sibscribe_bg.png)">
    <div class="container-fluid mt-3 user_panel">
        <div class="row">
            <div id="dashboard_content" class="col-12">
                <div id="circles">
                    <ul class="text-center">
                        <li id="request">
                            <a href="<?= URL ?>dashboard/index" class="text-center position-relative">
                                <i class="fas fa-desktop fa-2x text-danger"></i>
                                <span class="font12 d-block">داشبورد</span>
                                <span class="font13 bg-white text-danger counter_span"></span>
                            </a>
                        </li>
                        <li id="request">
                            <a href="<?= URL ?>addMember/index" class="text-center position-relative">
                                <i class="fas fa-user-plus fa-2x text-danger"></i>
                                <span class="font12 d-block">افزودن اعضا</span>
                                <span class="font13 bg-white text-danger counter_span"></span>
                            </a>
                        </li>
                        <li id="request">
                            <a href="<?= URL ?>Member/index" class="text-center position-relative">
                                <i class="fas fa-users fa-2x text-danger"></i>
                                <span class="font12 d-block">اعضای باشگاه</span>
                                <span class="font13 bg-white text-danger counter_span"></span>
                            </a>
                        </li>
                        <li id="request">
                            <a href="<?= URL ?>Debtors/index" class="text-center position-relative">
                                <i class="fas fa-dollar-sign fa-2x text-danger"></i>
                                <span class="font12 d-block">شهریه</span>
                                <span class="font13 bg-white text-danger counter_span"></span>
                            </a>
                        </li>
                        <li id="request">
                            <a href="<?= URL ?>message/index" class="text-center position-relative">
                                <i class="fas fa-paper-plane fa-2x text-danger"></i>
                                <span class="font12 d-block">ارسال پیام</span>
                                <span class="font13 bg-white text-danger counter_span"></span>
                            </a>
                        </li>
                        <li id="request">
                            <a href="<?= URL ?>option/index" class="text-center position-relative">
                                <i class="fas fa-cog fa-2x text-danger"></i>
                                <span class="font12 d-block">تنظیمات</span>
                                <span class="font13 bg-white text-danger counter_span"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 mt-3 text-left col-md-4 " style="direction: ltr !important;">
            </div>
        </div>
    </div>
</div>
