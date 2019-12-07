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
        <form class="form-inline was-validated mb-3" action="<?= URL ?>addmember/insert" method="post" enctype="multipart/form-data">

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">نام</label>
                <input type="text" class="form-control must_input" id="name" placeholder="اجباری" name="name">

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">نام خانوادگی</label>
                <input type="text" class="form-control must_input" id="family" placeholder="اجباری " name="family">
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">نام پدر</label>
                <input type="text" class="form-control custom_input" id="family" name="parentname">
            </div>
            <div class="form-group col-md-6 mb-2 sex">
                <span for="name" class="w-25 text-center">جنسیت : </span>
                <label class="ml-1">مرد</label>
                <input type="radio" name="sex" value="1" checked>
                <label class="ml-1 mr-3">زن</label>
                <input type="radio" name="sex" value="2">

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">ادرس</label>
                <textarea type="text" class="form-control custom_input" placeholder="ادرس " name="Address" required></textarea>
                <div class="valid-feedback"></div>
            </div>
            <div class="form-group col-md-6">
                <label for="name" class="w-25">شماره همراه</label>
                <input type="text" class="form-control must_input " id="mobile" placeholder="اجباری" name="mobile" maxlength="11">

            </div>

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">تاریخ تولد</label>
                <input type="text" id="inputDate3" class="form-control custom_input date3" name="birthday">
            </div>

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">شروع اعتبار</label>
                <input type="text" id="inputDate4" class="form-control must_input date4"  placeholder="اجباری" name="start_date">

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">پایان اعتبار</label>
                <input type="text" id="inputDate5" class="form-control must_input date5"   placeholder="اجباری" name="end_date">

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">ارسال پیامک خوش آمدگویی</label>
                <select class="form-control" name="send_sms">
                    <option value="0">خیر</option>
                    <option value="1" selected>آری</option>
                </select>
            </div>

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
                $(".date3").MdPersianDateTimePicker({
                    targetDateSelector: "#inputDate3",
                    isGregorian: false
                });
                $(".date4").MdPersianDateTimePicker({
                    targetDateSelector: "#inputDate4",
                    isGregorian: false
                });
                $(".date5").MdPersianDateTimePicker({
                    targetDateSelector: "#inputDate5",
                    isGregorian: false
                })
            });
        </script>


    </div>
<?php
require 'views/adminFooter.php';
?>