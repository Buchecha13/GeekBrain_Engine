<?php

function getDb() {
    static $db = null;
    if (is_null($db)) {
        $db = @mysqli_connect(HOST, USER,PASS,DB) or die('Ошибка: ' . mysqli_connect_error());
    }
    return $db;
}

function getAssocResult($sql) {
    $result = @mysqli_query(getDb(),$sql) or die(mysqli_error(getDb()));
    $array_result = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }
    return $array_result;
}

function executeSql($sql) {
    mysqli_query(getDb(), $sql);
    return mysqli_affected_rows(getDb());
}