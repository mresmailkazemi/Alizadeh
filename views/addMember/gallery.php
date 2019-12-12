
<style>
    .main_gallery > ul > li {
        width: 150px;
        border: 1px solid #CCCCCC;
        overflow: hidden;
        box-shadow: 0 0 3px #CCCCCC;
        display: inline-block;
    }
</style>
<div class="container-fluid mt-5">
    <div id="gallery">
        <div class="header_gallery">
            <b class="alert alert-info w-100 d-block text-center">گالری</b>
        </div>
        <div class="main_gallery">
            <ul>
                <?php
                $directory = "public/img/member/67";
                $images = glob($directory . "/*.jpg");
                foreach ($images as $image) {
                    ?>
                    <li class="rounded"><a href="<?= URL ?><?= $image ?>" class=""><img
                                    src="<?= $image ?>" alt=""></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>