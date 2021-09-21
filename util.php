<?php

///////////////////////////////////////
// 便利な関数
///////////////////////////////////////
 
/**
 * 画像ファイル名から画像のURLを生成する
 *
 * @param string $name 画像ファイル名
 * @param string $type user | tweet
 * @return string
 */
function buildImagePath(string $name = null, string $type)
{
    if ($type === 'user' && !isset($name)) {
        return HOME_URL . 'Views/img/icon-default-user.svg';//!isset＝何もない場合はデフォルト画像 icon-default-user.svg
    }
 
    return HOME_URL . 'Views/img_uploaded/' . $type . '/' . htmlspecialchars($name);
}




/**
 * 指定した日時間からどれだけ経過したかを取得 
 * 
 * @param string $datetime 日時 
 * @return string
 * 
 */ 
function convertToDayTimeAgo(string $datetime)
{
    $unix = strtotime($datetime); //①：取得した時間をunixtimeスタンプに変換
    $now = time(); //②：現在の時間を取得
    $diff_sec = $now - $unix;//③：②-①で経過日数を判断
    
    if($diff_sec < 60){
        $time = $diff_sec;
        $unit ='秒前';
    } elseif ($diff_sec < 3600){
        $time = $diff_sec /60;
        $unit ='分前';
        } elseif ($diff_sec < 86400){
        $time = $diff_sec /3600;
        $unit ='時間前';
        } elseif ($diff_sec < 2592000){
        $time = $diff_sec /86400;
        $unit ='日前';
                } elseif ($diff_sec < 31104000){
        $time = $diff_sec /2592000;
        $unit ='ヶ月前';
                } elseif ($diff_sec < 630720000){
        $time = $diff_sec /31536000;
        $unit ='年前';

    } else{
            if (date('Y') !== date('Y', $unix)) {
                $time = date('Y年n月j日', $unix);
            } else {
                $time = date('n月j日', $unix);
            }
            return $time;
        }
    return (int)$time.$unit;
    }


/**
 * ユーザー情報をセッションに保存
 *
 * @param array $user
 * @return void
 */
function saveUserSession(array $user)
{
    // セッションを開始していない場合
    if (session_status() === PHP_SESSION_NONE) {
        // セッション開始
        session_start();
    }
 
    $_SESSION['USER'] = $user;
}
 
/**
 * ユーザー情報をセッションから削除
 *
 * @return void
 */
function deleteUserSession()
{
    // セッションを開始していない場合
    if (session_status() === PHP_SESSION_NONE) {
        // セッション開始
        session_start();
    }
 
    // セッションのユーザー情報を削除
    unset($_SESSION['USER']);
}



/**
 * セッションのユーザー情報を取得
 * この関数はログインしていないユーザーにはページを表示しないようにする
 * @return array|false
 */
function getUserSession()
{
    // セッションを開始していない場合
    if (session_status() === PHP_SESSION_NONE) {
        // セッション開始
        session_start();
    }
 
    if (!isset($_SESSION['USER'])) {
        // セッションにユーザー情報がない
        return false;
    }
 
    $user = $_SESSION['USER'];
 
    // 画像のファイル名からファイルのURLを取得
    if (!isset($user['image_name'])) {
        $user['image_name'] = null;
    }
    $user['image_path'] = buildImagePath($user['image_name'], 'user');
 
    return $user;
}

function uploadImage(array $user, array $file, string $type)
{
    // 画像のファイル名から拡張子を取得（例：.png）
    $image_extension = strrchr($file['name'], '.');
 
    // 画像のファイル名を作成（YmdHis: 2021-01-01 00:00:00 ならば 20210101000000）
    $image_name = $user['id'] . '_' . date('YmdHis') . $image_extension;
 
    // 保存先のディレクトリ
    $directory = '../Views/img_uploaded/' . $type . '/';
 
    // 画像のパス
    $image_path = $directory . $image_name;
 
    // 画像を設置
    move_uploaded_file($file['tmp_name'], $image_path);
 
    // 画像ファイルの場合->ファイル名をreturn
    //exif_imagetypeは画像を判断する、ここでは$image_pathの$image_nameの$image_extensionにて拡張子が付くのでその拡張子を判断
    if (exif_imagetype($image_path)) {
        return $image_name;
    }
 
    // 画像ファイル以外の場合
    echo '選択されたファイルが画像ではないため処理を停止しました。';
    exit;
}