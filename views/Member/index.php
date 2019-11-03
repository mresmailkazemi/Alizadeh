<?php
require 'views/adminPanel.php';
?>

<div class="container text-right" id="panel">
    <h2>اعضای باشگاه</h2>
    <table class="table table-striped table-hover table-bordered text-center">

        <thead>
        <tr>
            <th>ردیف</th>
            <th>انتخاب</th>
            <th>جنسیت</th>
            <th>نام</th>
            <th> نام خانوادگی</th>
            <th>موبایل</th>
            <th> کد ملی</th>
            <th>تصویر</th>
            <th>اعتبار</th>
            <th> وضعیت </th>



        </tr>
        </thead>
        <?php
        $result=$data[0];
        foreach ($result as $row){
        ?>
        <tbody>
        <tr>

            <td>
                1
            </td>
            <td><?=$row['sex']?></td>

        </tr>
        </tbody>
<?php } ?>
    </table>


</div>
<script src="<?=URL?>public/js/main.js"></script>
</body>
</html>