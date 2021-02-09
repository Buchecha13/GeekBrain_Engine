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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
        $sql = "INSERT INTO `feedbacks`(`name`, `feedback`) VALUES ('{$name}', '{$feedback}')";

        mysqli_query(getDb(), $sql);

        header("Location: /feedbacks/add/?message=add");
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

    mysqli_query(getDb(), $sql);

    header("Location: /feedbacks/add/?message=update");
    exit();
}

function deleteFeedback()
{
    $id = explode('/', $_SERVER['REQUEST_URI'])[3];
    $sql = "DELETE FROM `feedbacks` WHERE `id`= '{$id}'";

    mysqli_query(getDb(), $sql);

    header("Location: /feedbacks/add/?message=delete");
    exit();
}
