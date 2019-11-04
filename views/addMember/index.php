<?php
require 'views/adminPanel.php';
?>
<div class="container">
    <div class="mt-2 mb-3">
    <h2 class="text-xlarge alert alert-info">
        فرم مشخصات
    </h2>
</div>
    <form  class="form-inline was-validated" action="<?=URL?>addmember">

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
            <input type="text" class="form-control" id="family" placeholder="نام پدر" name="parentFamily" required>
            <div class="valid-feedback"></div>

        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="name" class="w-25">جنسیت</label>
            <input  type="radio" name="gender" value="male"> مرد
            <input class="mr-3" type="radio" name="gender" value="female"> زن




        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="name" class="w-25">ادرس</label>
            <input type="text" class="form-control" id="address" placeholder="ادرس " name="address" required>
            <div class="valid-feedback"></div>


        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="name" class="w-25">شماره همراه</label>
            <input type="text" class="form-control" id="mobile" placeholder="شماره همراه " name="mobile" required>
            <div class="valid-feedback"></div>


        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="name" class="w-25">تاریخ تولد</label>
            <input type="text" class="form-control" id="birthday" placeholder="تاریخ تولد " name="birthday" required>
            <div class="valid-feedback"></div>


        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="name" class="w-25">افزودن تصویر</label>
            <input type="file" class="form-control file p-r-6 text-center" name="File">
            <div class="valid-feedback"></div>



        </div>
        <div class="col-sm-12">

            <button class="btn btn-success float-sm-left w-100 mt-5">ادامه</button>
        </div>
    </form>




</div>
</body>
</html>