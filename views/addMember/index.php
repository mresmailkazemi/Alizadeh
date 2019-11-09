<?php
require 'views/adminPanel.php';
?>
    <style>
        @media (max-width: 768px) {
            .sex {
                margin-top: 11px
            }

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
        <form class="form-inline was-validated mb-3" action="<?= URL ?>addmember/insert" method="post" enctype="multipart/form-data">

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">نام</label>
                <input type="text" class="form-control" id="name" placeholder="نام" name="name" required>
                <div class="valid-feedback"></div>

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">نام خانوادگی</label>
                <input type="text" class="form-control" id="family" placeholder="نام خانوادگی " name="family" required>
                <div class="valid-feedback"></div>

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">نام پدر</label>
                <input type="text" class="form-control" id="family" placeholder="نام پدر" name="parentname" required>
                <div class="valid-feedback"></div>

            </div>
            <div class="form-group col-md-6 mb-3 sex">
                <span for="name" class="w-25 text-center">جنسیت : </span>
                <label class="ml-1">مرد</label>
                <input type="radio" name="sex" value="1" checked>
                <label class="ml-1 mr-3">زن</label>
                <input type="radio" name="sex" value="2">

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">ادرس</label>
                <textarea type="text" class="form-control" placeholder="ادرس " name="Address" required></textarea>
                <div class="valid-feedback"></div>
            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">شماره همراه</label>
                <input type="text" class="form-control" id="mobile" placeholder="شماره همراه " name="mobile" maxlength="11">

            </div>

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">تاریخ تولد</label>
                <input type="text" id="inputDate3" class="form-control date4" name="birthday">
            </div>

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">شروع اعتبار</label>
                <input type="text" class="form-control" name="start_date" required>
                <div class="valid-feedback"></div>

            </div>
            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">پایان اعتبار</label>
                <input type="text" class="form-control" name="end_date" required>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-md-6 mb-2">
                <label for="name" class="w-25">افزودن تصویر</label>
                <input type="file" class="form-control file p-r-6 text-center" name="pic[]">
                <div class="valid-feedback"></div>

            </div>
            <div class="col-sm-12">

                <button class="btn btn-success float-sm-left w-100 mt-5">ادامه</button>
            </div>
        </form>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".date4").MdPersianDateTimePicker({
                    targetDateSelector: "#inputDate3",
                    isGregorian: false
                });
            });
        </script>


    </div>
<?php
require 'views/adminFooter.php';
?>