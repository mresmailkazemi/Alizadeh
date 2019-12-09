<?php

class model_addMember extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function validation()
    {
        $flag = "";
        if (@$_POST['name'] == null || @$_POST['family'] == null || @$_POST['mobile'] == null) {
            return $flag = "فیلد های اجباری نمی تواند خالی باشد";
        }
        return $flag;
    }

    function getMemberInfo($edit)
    {
        return $this->doselect("SELECT i.*,u.mobile,t.end_date,t.start_date FROM tbl_user_info as i LEFT join tbl_user as u ON u.id=i.userId LEFT JOIN tbl_tuition AS t ON t.userId=u.id where i.userId=?", array($edit), 1);
    }

    function insertmobile()
    {
        $pass = Model::generateHash('alizadeh');
        $sql = "INSERT INTO tbl_user (mobile, password, statusId) VALUES (?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $_POST['mobile']);
        $stmt->bindValue(2, $pass);
        $stmt->bindValue(3, 1);
        $stmt->execute();
    }
function getTuitionEndDate($id)
{
    return $this->doselect('SELECT end_date FROM tbl_tuition where userId=?', array($id), 1);
}
    function updateInfo($id)
    {
        $_POST['birthday'] = $this->changeDate($_POST['birthday']);
        $this->doQuery("UPDATE tbl_user_info set sex=?, birthday=?, family=?,parentname=?,name=?,Address=?,code_meli=? where userid=?", array($_POST['sex'], $_POST['birthday'], $_POST['family'], $_POST['parentname'], $_POST['name'], $_POST['Address'], $_POST['code_meli'], $id));
    }

    function updateMobile($id)
    {
        $this->doQuery("UPDATE tbl_user set mobile=? where id=?", array($_POST['mobile'],$id));
    }

    function updateTuition($id)
    {
        $_POST['start_date'] = $this->changeDate($_POST['start_date']);
        $_POST['end_date'] = $this->changeDate($_POST['end_date']);
        $this->doQuery("UPDATE tbl_tuition set start_date=?,end_date=? where userId=?", array($_POST['start_date'], $_POST['end_date'], $id));
    }

    function insertuition($userId)
    {
        $_POST['start_date'] = $this->changeDate($_POST['start_date']);
        $_POST['end_date'] = $this->changeDate($_POST['end_date']);
        $sql = "INSERT INTO tbl_tuition (userid,start_date,end_date) VALUES (?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $userId);
        $stmt->bindValue(2, $_POST['start_date']);
        $stmt->bindValue(3, $_POST['end_date']);
        $stmt->execute();
    }

    function getUserId()
    {
        return $this->doselect('SELECT id FROM tbl_user where mobile=?', array($_POST['mobile']), 1);
    }

    function forwardInfo($userId)
    {
        $_POST['birthday'] = $this->changeDate($_POST['birthday']);
        $sql = "INSERT INTO tbl_user_info (sex, birthday, dateCreat, family,parentname,name,Address,userid,code_meli) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $_POST['sex']);
        $stmt->bindValue(2, $_POST['birthday']);
        $stmt->bindValue(3, date('Y-m-d H:i:s'));
        $stmt->bindValue(4, $_POST['family']);
        $stmt->bindValue(5, $_POST['parentname']);
        $stmt->bindValue(6, @$_POST['name']);
        $stmt->bindValue(7, $_POST['Address']);
        $stmt->bindValue(8, $userId);
        $stmt->bindValue(9, @$_POST['code_meli']);
        $stmt->execute();
    }

    function uploadPersonalPic($id)
    {
        if (!file_exists("public/img/member/$id")) {
            mkdir("public/img/member/$id");
        }
        $tmpFilePath = $_FILES['personal_pic']['tmp_name'];
        $newFilePath = "public/img/member/$id/";
        $ext = strtolower(pathinfo($_FILES['personal_pic']['name'], PATHINFO_EXTENSION));
        $newName = 'pic.';
        $target = $newFilePath . basename($newName . '.' . $ext);  //with extension
        $mainimage = $newFilePath . $newName . $ext;  //with out extension
        if (move_uploaded_file($tmpFilePath, $target)) {
            $this->create_thumbnail($target, $mainimage, 1024, 1024);
            if (file_exists($target)) {
                unlink($target);
            }
        }
    }

    function uploadImg($countImg, $id,$userid='')
    {
        $pics = array();
        $folder = $id;

        if (!file_exists("public/img/member/$folder")) {
            mkdir("public/img/member/$folder");
        }
        for ($i = 0; $i < $countImg; $i++) {
            $tmpFilePath = $_FILES['pic']['tmp_name'][$i];
            //Setup our new file path
            $newFilePath = "public/img/member/$folder/";
            $ext = strtolower(pathinfo($_FILES['pic']['name'][$i], PATHINFO_EXTENSION));
            $newName = 'pic' . $i.$userid. '.';
            $target = $newFilePath . basename($newName . '.' . $ext);  //with extension
            $mainimage = $newFilePath . $newName . $ext;  //with out extension
            //Upload the file into the temp dir

            if (move_uploaded_file($tmpFilePath, $target)) {

                $this->create_thumbnail($target, $mainimage, 1024, 1024);
                if (file_exists($target)) {
                    unlink($target);
                }
                array_push($pics, $newName . $ext);
            }
        }
        return $folder;
    }

    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {
        $new_height = $h;
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }
        $what = getimagesize($file);
        switch (strtolower($what['mime'])) {
            case 'image/png';
                $src = imagecreatefrompng($file);
                break;
            case 'image/jpeg';
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif';
                $src = imagecreatefromgif($file);
                break;
            default;
        }
        if ($new_height != '') {
            $newheight = $new_height;
        }
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($dst, $pathToSave, 95);
        return $dst;
    }

    function sendSms($mobile, $family, $id)
    {
        $check = $this->is_connected();
        if ($check == 1) {
            $username = "faraz09196145343";
            $password = '0371477905';
            $from = "+983000505";
            $pattern_code = "ft6we0n86g";
            $to = array($mobile);
            $input_data = array("name" => $family, "code" => $id);
            $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handler);
            $this->updateCounterSms(1);
        }
    }
}