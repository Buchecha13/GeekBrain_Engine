<?php

function getFeedbacks()
{
    $sql = "SELECT * FROM `feedbacks` ORDER BY `id` DESC";
    return getAssocResult($sql);
}

function getFeedbackStatus() {
    $messages = [
        'add' => 'Отзыв добавлен',
        'update' => 'Отзыв изменен',
        'delete' => 'Отзыв удален',
    ];

    if ($_GET['message']) {
        if ($_GET['message'] === 'add') {
            $message = $messages['add'];
        }
        elseif ($_GET['message'] === 'update') {
            $message = $messages['update'];
        }
        elseif ($_GET['message'] === 'delete') {
            $message = $messages['delete'];
        }
        else {
            $message = '';
        }
    }
    return $message;
}

function addFeedback()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name']) && !empty($_POST['feedback'])) {
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
        $sql = "INSERT INTO `feedbacks`(`name`, `feedback`) VALUES ('{$name}', '{$feedback}')";

        executeSql($sql);

        header("Location: /feedbacks/?message=add");
        exit();
    }
}

function editFeedback()
{
    $id = explode('/', $_SERVER['REQUEST_URI'])[3];
    $sql = "SELECT * FROM `feedbacks` WHERE id='{$id}' ";
    return getAssocResult($sql)[0];
}

function updateFeedback()
{
    $id = (int)$_POST['id'];
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
    $sql = "UPDATE `feedbacks` SET `name`='{$name}',`feedback`='{$feedback}' WHERE id ='{$id}'";

    executeSql($sql);

    header("Location: /feedbacks/?message=update");
    exit();
}

function deleteFeedback()
{
    $id = explode('/', $_SERVER['REQUEST_URI'])[3];
    $sql = "DELETE FROM `feedbacks` WHERE `id`= '{$id}'";

    executeSql($sql);

    header("Location: /feedbacks/?message=delete");
    exit();
}

function doFeedbackAction (&$params, $action) {
    $params['feedbackText'] = '';
    $params['feedbackId'] = '';
    $params['feedbackName'] = '';
    $params['btnText'] = 'Добавить отзыв';
    $params['action'] = 'add';

    if ($action === 'add') {
        addFeedback();
    }
    if ($action === 'edit') {

        $params['feedbackText'] = editFeedback()['feedback'];
        $params['feedbackId'] = editFeedback()['id'];
        $params['feedbackName'] = editFeedback()['name'];
        $params['btnText'] = 'Изменить отзыв';
        $params['action'] = 'update';
    }
    if ($action === 'update') {
        updateFeedback();
    }
    if ($action === 'delete') {
        deleteFeedback();
    }
}
