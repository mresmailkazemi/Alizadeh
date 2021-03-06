<?php

class model_member extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function calcOffset($pageno, $records)
    {
        return ($pageno - 1) * $records;
    }

    function totalPage()
    {
        $sql = "SELECT count(id) FROM tbl_user_info";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($result['count(id)'] / no_of_records_per_page);
        return $total_pages;
    }

    function getMember()
    {
        return $this->doselect("SELECT i.*,u.mobile,u.statusId,t.end_date FROM tbl_user_info as i LEFT join tbl_user as u ON u.id=i.userId LEFT JOIN tbl_tuition AS t ON t.userId=u.id WHERE sex=?", array($_SESSION['admin']));
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
        $sql = 'UPDATE tbl_user SET statusId=3 WHERE `id` IN (' . $id . ')';
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
        $sql = 'UPDATE tbl_user SET statusId=1 WHERE `id` IN (' . $id . ')';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }

    function searchUser($id, $mobile, $name, $family, $end_time, $status)
    {
        $conditions = array();
        $conditions[] = 'WHERE sex=' . $_SESSION['admin'] . '';
        if ($status != "") {
            $conditions[] = 'statusId=' . $status . '';
        }

        if ($mobile != "") {
            $conditions[] = 'AND mobile=' . $mobile . '';
        }
        if ($name != "") {
            $conditions[] = 'AND name LIKE"%' . $name . '%"';
        }
        if ($family != "") {
            $conditions[] = 'AND family LIKE"%' . $family . '%"';
        }
        if ($end_time != "") {
            $end_time = Model::changeDate($end_time);
            $conditions[] = 'AND t.end_date LIKE"%' . $end_time . '%"';
        }

        if ($id != "") {
            $conditions[] = 'AND i.userId=' . $id . '';
        }

        $query = 'SELECT i.*,u.mobile,u.statusId,t.end_date FROM tbl_user_info as i LEFT join tbl_user as u ON u.id=i.userId LEFT JOIN tbl_tuition AS t ON t.userId=u.id';
        $sql = $query;
        if (count($conditions) > 0) {
            $sql .= ' ' . implode(' ', $conditions);
        }
        $sql = $sql . ' ORDER BY id DESC';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
