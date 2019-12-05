<?php
require 'views/adminPanel.php';

?>

<div class="container">
    <form action="<?=URL?>message/send" method="post">
   <div class="row">
       <div class="col-md-2 mt-4 p-0">
<b class="m-2 text-xlarge">نوع گیرنده</b>
       </div>
       <div class="col-md-10 mt-4">
    <select class="form-control" name="how_to">
        <option value="1">بدهکاران</option>
        <option value="2">همه اعضا</option>
    </select>
       </div>
    </div>
        <div class="form-group mt-5 w-100">
            <label for="comment ">متن پیام</label>
            <textarea class="form-control w-100" rows="5" id="comment" name="text"></textarea>
        </div>
        <button type="submit" class="btn btn-success w-100 ">ارسال</button>
    </form>
</div>


<?php
require 'views/adminFooter.php';
?>
