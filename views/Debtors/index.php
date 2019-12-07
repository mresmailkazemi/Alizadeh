<?php
require 'views/adminPanel.php';
?>
<div class="container-fluid text-right" id="panel">
    <div class="mb-3 mt-3 na  text-center alert alert-info py-1 "><h1 class="text-xlarge">بدهکاران</h1></div>
    <?php
    require_once 'search.php';
    ?>
    <form method="post">
        <div class="mb-3">
            <button class="btn btn-danger" data-href="<?= URL ?>Member/Delete" onclick="submitHrefandFrom(this)">حذف
                کاربر
            </button>
            <button class="btn btn-warning" data-href="<?= URL ?>Member/Archive" onclick="submitHrefandFrom(this)">
                ارشیو
            </button>
            <button class="btn btn-info" data-href="<?= URL ?>Member/Active" onclick="submitHrefandFrom(this)">فعال
            </button>
            <button class="btn btn-dark" data-href="<?= URL ?>Member/inactive" onclick="submitHrefandFrom(this)">غیر
                فعال
            </button>
        </div>
        <?php
        if (isset($_GET['success'])) {
            ?>
            <div style="padding: .75rem .25rem;text-align: center" class="alert alert-success">
                <?php
                echo $_GET['success']
                ?>
            </div>
        <?php } ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered text-center">
                <thead class="bg-dark text-white">
                <tr>
                    <th>کدورزشکار</th>
                    <th>انتخاب</th>
                    <th>جنسیت</th>
                    <th>نام</th>
                    <th> نام خانوادگی</th>
                    <th>موبایل</th>
                    <th> نام پدر</th>
                    <th>تصویر</th>
                    <th>اعتبار</th>
                    <th> وضعیت</th>
                </tr>
                </thead>
                <?php
                $result = $data[0];
                foreach ($result as $row) {
                    ?>
                    <tbody>
                    <tr>
                        <td><?= $row['userid'] ?></td>
                        <td><input name="delitem[]" value="<?= $row['userid'] ?>" type="checkbox"></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['family'] ?></td>
                        <td><?php
                            $userInfoBasic = Model::getMobile($row['userid']);
                            echo $userInfoBasic['mobile'];
                            ?>
                        </td>
                        <td><?= $row['parentname'] ?></td>
                        <td><img src="<?= URL ?>public/img/member/<?= $row['userid'] ?>/pic.jpg" width="80px"
                                 height="90px"></td>
                        <td>
                            <?php
                            $tuition = Model::getIdGiveCredit($row['userid']);
                            echo Model::miladiToShamsi($tuition['end_date'], "/")
                            ?>
                        </td>
                        <td>
                            <?php
                            $status = Model::getStatus($userInfoBasic['statusId']);
                            echo $status['title'];
                            ?>
                        </td>
                    </tr>
                    </tbody>
                    <?php ?>
                <?php } ?>
            </table>
        </div>
    </form>

</div>
<?php
require 'views/adminFooter.php';
?>

