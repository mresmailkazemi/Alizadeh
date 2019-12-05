<?php

class model_member extends model
{

    function __construct()
    {
        parent::__construct();
    }

    function goDelete()
    {
        $ids = $_POST['delitem'];
        $id = join(',', $ids);
        $sql = 'UPDATE tbl_user SET statusId=4 WHERE `id` IN (' . $id . ')';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }

    function goArchive()
    {
        $ids = $_POST['delitem'];
        $id = join(',', $ids);
        $sql = 'UPDATE tbl_user SET statusId=1 WHERE `id` IN (' . $id . ')';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }
    function goInactive()
    {
        $ids = $_POST['delitem'];
        $id = join(',', $ids);
        $sql = 'UPDATE tbl_user SET statusId=2 WHERE `id` IN (' . $id . ')';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }
    function goActive()
    {
        $ids = $_POST['delitem'];
        $id = join(',', $ids);
        $sql = 'UPDATE tbl_user SET statusId=3 WHERE `id` IN (' . $id . ')';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }
}
