<?php
require 'views/adminPanel.php';
?>
<span data-local="#setting" class="local_span"></span>
<div class="header wow bounceInLeft">
    <b class="font16 alert alert-info text-center d-block">
        تغییر کلمه عبور
    </b>
</div>
<div class="container">
    <form action="<?= URL ?>adminoption/updatePassword" method="post">
        <b class="text-center alert d-none <?php if (isset($_GET['error'])) echo "alert-danger d-block"; elseif (isset($_GET['submit'])) echo "alert-success d-block" ?>">
            <?php
            if (isset($_GET['error'])) echo $_GET['error'];
            if (isset($_GET['submit'])) echo "کلمه عبور موفقیت ثبت شد.";
            ?>
        </b>
        <div class="container table_ajax">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                    <tr class="font15 text-center">
                        <td>ردیف</td>
                        <td>عنوان</td>
                        <td>مقدار</td>
                        <td>ویرایش</td>
                    </tr>
                    </thead>
                    <?php
                    $option = Model::option();
                    $i = 1;
                    foreach ($option as $key => $item) {
                        if ($key != "about") {
                            ?>

                            <tr class="font14">
                                <td><?= $i ?></td>
                                <td><?php echo $key; ?></td>
                                <td class="cattitle"><span><?= $option[$key]; ?></span>
                                    <input type="<?php if($key=="backcolor" || $key=="fontcolor") echo 'color';else echo "text"?>" class="font19 form-control" value="<?= $option[$key]; ?>"
                                           onchange="updateCategory('<?= $key ?>',this)">
                                </td>
                                <td><a><i class="fa fa-edit" onclick="showEdit(this)"></i></a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                    <tr class="font14">
                        <td><?= $i ?></td>
                        <td><?php echo "Password"; ?></td>
                        <td class="cattitle"><span></span>
                            <input type="text" class="font19 form-control"
                                   onchange="updatePass(this)">
                        </td>
                        <td><a><i class="fa fa-edit" onclick="showEdit(this)"></i></a></td>
                    </tr>
                </table>
            </div>
        </div>

    </form>
</div>
<script>

    function showEdit(tag) {
        $('input[type=text]').hide();
        $('.cattitle span').show();
        $(tag).parents('tr').find('.cattitle span').hide();
        $(tag).parents('tr').find('input[type=text]').slideToggle(250);

    }

    function updateCategory(setting, tag) {
        var value = $(tag).val();
        var url = "<?=URL?>adminoption/updateOption";
        var data = {'setting': setting, 'value': value};

        $.post(url, data, function (msg) {
            alert("باموفقیت ثبت شد");
            $(tag).parents('tr').find('span').text(value);
            $(tag).parents('tr').find('input[type=text]').hide();
            $(tag).parents('tr').find('.cattitle span').show();
        })
    }
    function updatePass(tag) {
        var value = $(tag).val();
        var url = "<?=URL?>adminoption/updatePassword";
        var data = {'value': value};

        $.post(url, data, function (msg) {
            alert("باموفقیت ثبت شد");
            $(tag).parents('tr').find('span').text(value);
            $(tag).parents('tr').find('input[type=text]').hide();
            $(tag).parents('tr').find('.cattitle span').show();
        })
    }
</script>


