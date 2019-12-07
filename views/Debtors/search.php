<div class="filter mt-5">
    <form action="<?= URL ?>debtors/search" method="post">
        <div class="row">
            <div class="center col-md-2 mb-3">
                <input type="text" class="filter form-control" name="id" id="id" placeholder="کد ورزشکار"
                       value="<?= @$_POST['id'] ?>">
            </div>
            <div class="col-md-2 mb-3">
                <input type="text" class="filter form-control" name="mobile"
                       id="name_mobile"
                       placeholder="موبایل" value="<?= @$_POST['mobile'] ?>">
            </div>
            <div class="col-md-2 mb-3">
                <input type="text" class="filter form-control" name="name"
                       id="name_mobile"
                       placeholder="نام" value="<?= @$_POST['name'] ?>">
            </div>
            <div class="col-md-2 mb-3">
                <input type="text" class="filter form-control" name="family"
                       id="name_mobile"
                       placeholder="نام خانوادگی" value="<?= @$_POST['family'] ?>">
            </div>
            <div class="col-md-2 mb-3">
                <input  type="text" id="inputDate1" class="form-control" name="end_date" placeholder="تاریخ اعتبار">
            </div>
            <div class="col-md-2 mb-3">
                <select name="status" class="form-control" >
                    <option value="">همه</option>
                    <?php
                    foreach (Model::getAllStatus() as $hum) {
                        ?>
                        <option value="<?= $hum['id'] ?>"  <?php if (@$_POST['status'] == $hum['id']) echo 'selected' ?>><?= $hum['title'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="actions col-md-5 mb-3">
                <button type="submit" class="btn btn-info submit-filter w-100">
                    <i class="fas icon-search"></i> جستجو
                </button>
            </div>
            <div class="actions col-md-2 mb-3">
                <a type="submit" class="btn btn-danger submit-filter w-100 text-white" onclick="clearInput()">
                    <i class="fas icon-search"></i> ریست
                </a>
            </div>
        </div>
    </form>
</div>
<script>
    $('#inputDate1').MdPersianDateTimePicker({
        targetTextSelector: '#inputDate1',
        englishNumber:true
    });
</script>