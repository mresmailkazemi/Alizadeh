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

    function insertmobile()
    {
        $pass = Model::generateHash('alizadeh');
        $sql = "INSERT INTO tbl_user (mobile, password, statusId) VALUES (?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $_POST['mobile']);
        $stmt->bindValue(2, $pass);
        $stmt->bindValue(3, 3);
        $stmt->execute();
    }

    function insertuition($userId)
    {
        $sql = "INSERT INTO tbl_tuition (userid,start_date,end_date) VALUES (?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $userId);
        $stmt->bindValue(2, $_POST['start_date']);
        $stmt->bindValue(3, $_POST['end_date']);
        $stmt->execute();
    }

    function getUserId()
    {

        return $this->doselect('SELECT  id FROM tbl_user where mobile=?', array($_POST['mobile']), 1);
    }

    function forwardInfo($userId)
    {
        $sql = "INSERT INTO tbl_user_info ( sex, birthday, dateCreat, family,parentname,name,Address,userid) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $_POST['sex']);
        $stmt->bindValue(2, $_POST['birthday']);
        $stmt->bindValue(3, date('Y-m-d H:i:s'));
        $stmt->bindValue(4, $_POST['family']);
        $stmt->bindValue(5, $_POST['parentname']);
        $stmt->bindValue(6, @$_POST['name']);
        $stmt->bindValue(7, $_POST['Address']);
        $stmt->bindValue(8, $userId);

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

    function uploadImg($countImg, $id)
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
            $newName = 'pic' . $i . '.';
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

    function sendSms($mobile,$name)
    {


        $username = "faraz09196145343";
        $password = '0371477905';
        $from = "+983000505";
        $pattern_code = "oxwi8vg0t5";
        $to = array($mobile);
        $input_data = array("name" => $name);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        echo $response;


        $this->updateCounterSms(sizeof($mobile));
    }
}