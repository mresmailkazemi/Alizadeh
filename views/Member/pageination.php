<form action="" method="get">
    <?php
    $conter = $data['total_page'] - $data['pageno'];
    ?>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item "><a class="page-link" href="<?= URL ?>operatorsalt/index?pageno=1">اول</a>
            </li>
            <li class="page-item <?php if ($data['pageno'] <= 1) {
                echo 'disabled';
            } ?>">
                <a class="page-link" href="<?php if ($data['pageno'] <= 1) {
                    echo URL . 'operatorsalt/index?pageno=1';
                } else {
                    echo URL . 'operatorsalt/index?pageno=' . ($data['pageno'] - 1);
                } ?>">قبلی</a>
            </li>
            <li class="page-item <?php if ($data['pageno'] >= $data['total_page']) {
                echo 'disabled';
            } ?>">
                <a class="page-link" href="<?php if ($data['pageno'] >= $data['total_page']) {
                    echo '#';
                } else {
                    echo URL . 'operatorsalt/index?pageno=' . ($data['pageno'] + 1);
                } ?>">بعدی</a>
            </li>
            <?php
            $pge = $data['pageno'];
            // $pge+=5;
            for ($i = $pge + 5; $i >= $pge; $pge++) {

                if ($pge <= $data['total_page']) {
                    ?>
                    <li class="page-item <?php if ($data['pageno'] == $pge) {
                        echo 'disabled';
                    } ?>">
                        <a class="page-link" href="<?php if ($data['pageno'] == $pge) {
                            echo '#';
                        } else {
                            echo URL . 'operatorsalt/index?pageno=' . ($pge);
                        } ?>"><?= $pge ?></a>
                    </li>
                    <?php
                }
            }
            ?>

            <li class="page-item"><a class="page-link"
                                     href="<?= URL ?>operatorsalt/index?pageno=<?php echo $data['total_page']; ?>">آخرین</a>
            </li>
        </ul>
    </nav>
</form>