<?php
require 'views/adminPanel.php';
?>
    <style>
        @media (max-width: 768px) {
            .sex {
                margin-top: 11px
            }

        }
        .custom_input {
            border-color:#28a745!important;
            padding-right: calc( .75rem)!important;
            background-image: none!important;

        }
        .must_input {
            border-color:#ff3f3f!important;
            padding-right: calc( .75rem)!important;
            background-image: none!important;

        }
    </style>
    <div class="container">
        <div class="mt-2 mb-3">
            <h2 class="text-xlarge alert alert-info">
                فرم مشخصات
            </h2>
        </div>
        <?php
        if (isset($_GET['error'])) {
            ?>
            <div style="padding: .75rem .25rem;text-align: center" class="alert alert-danger">
                <?php
                echo $_GET['error']
                ?>
            </div>
        <?php } ?>
        <?php
        if (isset($_GET['success'])) {
            ?>
            <div style="padding: .75rem .25rem;text-align: center" class="alert alert-success">
                <?php
                echo $_GET['success']
                ?>
            </div>
        <?php } ?>
        <?php
        if(!isset($data['info'])){
        ?>
        <form class="form-inline was-validated mb-3" action="<?= URL ?>addmember/insert" method="post" enctype="multipart/form-data">
            <?php
            }else{
            ?>
            <form class="form-inline was-validated mb-3" action="<?= URL ?>addmember/update/<?=$data['info']['userid']?>" method="post" enctype="multipart/form-data">
                <?php
                }
                ?>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">نام</label>
                <input type="text" class="form-control must_input" id="name" placeholder="اجباری" name="name" value="<?=@$data['info']['name']?>">

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">نام خانوادگی</label>
                <input type="text" class="form-control must_input" id="family" placeholder="اجباری " name="family" value="<?=@$data['info']['family']?>">
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">کدملی</label>
                <input type="text" class="form-control custom_input" id="code_meli" name="code_meli" maxlength="10" value="<?=@$data['info']['code_meli']?>">
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">نام پدر</label>
                <input type="text" class="form-control custom_input" id="family" name="parentname" value="<?=@$data['info']['parentname']?>">
            </div>
            <div class="form-group col-md-6 mb-2 sex">
                <span for="name" class="w-25 text-center">جنسیت : </span>
                <label class="ml-1">مرد</label>
                <input type="radio" name="sex" value="1" <?php if(@$data['info']['sex']==1) echo 'checked'?> checked>
                <label class="ml-1 mr-3">زن</label>
                <input type="radio" name="sex" value="2" <?php if(@$data['info']['sex']==2) echo 'checked'?>>

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">ادرس</label>
                <textarea type="text" class="form-control custom_input" placeholder="ادرس " name="Address" required><?=@$data['info']['Address']?></textarea>
                <div class="valid-feedback"></div>
            </div>
            <div class="form-group col-md-6">
                <label for="name" class="w-25">شماره همراه</label>
                <input type="text" class="form-control must_input " id="mobile" placeholder="اجباری" name="mobile" maxlength="11" value="<?=@$data['info']['mobile']?>">

            </div>

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">تاریخ تولد</label>
                <input type="text" id="inputDate3" class="form-control" name="birthday" placeholder="اختیاری" value="<?php if(isset($data['info'])) echo Model::miladiToShamsi($data['info']['birthday'],"/") ?>">
            </div>

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">شروع اعتبار</label>
                <input type="text" id="inputDate2" class="form-control" name="start_date" placeholder="اجباری" value="<?php if(isset($data['info'])) echo Model::miladiToShamsi($data['info']['start_date'],"/")?>">

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">پایان اعتبار</label>
                <input type="text" id="inputDate1" class="form-control" name="end_date" placeholder="اجباری" value="<?php if(isset($data['info'])) echo  Model::miladiToShamsi($data['info']['end_date'],"/")?>">
            </div>
            <?php
            if(!isset($data['info'])) {
                ?>
                <div class="form-group col-md-6 mb-2">
                    <label for="name" class="w-25">ارسال پیامک خوش آمدگویی</label>
                    <select class="form-control" name="send_sms">
                        <option value="0">خیر</option>
                        <option value="1" selected>آری</option>
                    </select>
                </div>
                <?php
            }
            ?>

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">افزودن تصویر</label>
                <input type="file" class="form-control custom_input file text-center" name="personal_pic">
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">افزودن مدارک</label>
                <input type="file" class="form-control custom_input file  text-center" name="pic[]">
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">افزودن مدارک</label>
                <input type="file" class="form-control custom_input file  text-center" name="pic[]">
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">افزودن مدارک</label>
                <input type="file" class="form-control custom_input file  text-center" name="pic[]">
            </div>
            <div class="col-sm-12">

                <button class="btn btn-success float-sm-left w-100 mt-5">ادامه</button>
            </div>
        </form>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#inputDate1').MdPersianDateTimePicker({
                    targetTextSelector: '#inputDate1',
                    englishNumber:true
                });
                $('#inputDate2').MdPersianDateTimePicker({
                    targetTextSelector: '#inputDate2',
                    englishNumber:true
                });
                $('#inputDate3').MdPersianDateTimePicker({
                    targetTextSelector: '#inputDate3',
                    englishNumber:true
                });
            });
        </script>


    </div>
<?php
require 'views/adminFooter.php';
?>