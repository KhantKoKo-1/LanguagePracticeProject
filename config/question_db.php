<?php
function save_questions($mysqli, $description, $level_id, $type_id, $created_by) {
    $currentDateTime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `questions`(`description`, `level_id`, `type_id`, `created_by`, `created_at`) VALUES ('$description', $level_id, $type_id, $created_by, '$currentDateTime')";
    if($mysqli->query($sql)){
        return true;
    }
    return false;
}


?>