<?php
   function validation($post){
    /*XSS対策*/
    $data = array();
    if(!empty($post)){
        foreach($post as $key => $value){
            $data[$key] = htmlspecialchars($value,ENT_QUOTES);
        }
    }
    $_SESSION=array();
    
    
    /*バリデーション*/
    if(empty($data['name'])){
        $_SESSION['name'] = $data['name'];
        $_SESSION['nameError'] = '飲食店名は必須入力です。';
    }

    if(empty($data['genre'])){
        $_SESSION['genre'] = $data['genre'];
        $_SESSION['genreError'] = 'ジャンルは必須入力です。';
    }

    if(empty($data['address'])){
        $_SESSION['address'] = $data['address'];
        $_SESSION['addressError'] = '住所は必須入力です。';
    }

    if(empty($data['station'])){
        $_SESSION['station'] = $data['station'];
        $_SESSION['stationError'] = '最寄り駅は必須入力です。';
    }

    if(empty($data['effort'])){
        $_SESSION['effort'] = $data['effort'];
        $_SESSION['effortError'] = 'お問い合わせ内容は必須入力です。';
    }

    if(empty($data['URL'])){
        $_SESSION['URL'] = $data['URL'];
        $_SESSION['URLError'] = 'URLを入力、もしくはcomingsoonを入力してください。';
    }
    }
?>