<?php
class model_Debtors extends model
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

    function getDebtors()
    {
        return $this->doselect("SELECT i.*,u.mobile,u.statusId,t.end_date FROM tbl_user as u right join tbl_user_info as i ON u.id=i.userId LEFT JOIN tbl_tuition AS t ON t.userId=u.id WHERE t.end_date<CURDATE() AND i.sex=? ORDER BY t.end_date desc",array($_SESSION['admin']));
    }
    function getMobileDebtorMember()
    {
        return $this->doselect("SELECT id FROM tbl_tuition WHERE end_date<CURDATE() AND sms_count<3", array(), '', PDO::FETCH_COLUMN);
    }
    function searchUser($id, $mobile, $name, $family, $end_time, $status)
    {
        $conditions = array();
        if ($status != "") {
            $conditions[] = 'AND statusId=' . $status . '';
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

        if ($id != "") {
            $conditions[] = 'AND i.userId=' . $id . '';
        }
        $conditions[] = 'AND sex=' . $_SESSION['admin'] . '';
        $query = 'SELECT i.*,u.mobile,u.statusId,t.end_date FROM tbl_user_info as i LEFT join tbl_user as u ON u.id=i.userId LEFT JOIN tbl_tuition AS t ON t.userId=u.id WHERE t.end_date<CURDATE()';
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
