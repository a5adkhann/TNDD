<?php
require_once("./db/db_connection.php"); // Include your database connection

if(isset($_POST['searchPending'])) {
    $searchQuery = mysqli_real_escape_string($connection, $_POST['searchPending']);

    $query = "SELECT * FROM `student_applications` 
              WHERE (`student_id` LIKE '%$searchQuery%' 
              OR `student_application_tokenid` LIKE '%$searchQuery%') 
              AND `student_application_status` = 'Pending'";

    $execute = mysqli_query($connection, $query);

    if(mysqli_num_rows($execute) > 0) {
        while($fetch = mysqli_fetch_array($execute)){
            echo "<tr>
                <td>{$fetch['student_application_id']}</td>
                <td class='table-user'>{$fetch['student_id']}</td>
                <td>{$fetch['student_application_tokenid']}</td>
                <td>".(strlen($fetch['student_application_message']) > 50 
                    ? substr($fetch['student_application_message'], 0, 50)."..." 
                    : $fetch['student_application_message'])."</td>
                <td>{$fetch['student_application_date']}</td>
                <td class='text-center'>
                    <a href='./view_application?viewapplication={$fetch['student_application_id']}' class='text-reset p-1 rounded fs-16 px-1'>
                        <i class='ri-eye-line text-yellow-500 shadow-xl'></i>
                    </a>
                </td>
                <td class='space-x-1 flex gap-1 justify-center'>
                    <a href='?update={$fetch['student_application_id']}' class='shadow-lg bg-green-500 p-1 text-white rounded'>Approve</a>
                    <a href='?reject={$fetch['student_application_id']}' class='shadow-lg bg-red-500 p-1 text-white rounded'>Reject</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7' class='text-center text-gray-500'>No results found</td></tr>";
    }
}



if(isset($_POST['searchProcess'])) {
    $searchQuery = mysqli_real_escape_string($connection, $_POST['searchProcess']);

    $query = "SELECT * FROM `student_applications` 
              WHERE (`student_id` LIKE '%$searchQuery%' 
              OR `student_application_tokenid` LIKE '%$searchQuery%') 
              AND `student_application_status` = 'Process'";

    $execute = mysqli_query($connection, $query);

    if(mysqli_num_rows($execute) > 0) {
        while($fetch = mysqli_fetch_array($execute)){
            echo "<tr>
                <td>{$fetch['student_application_id']}</td>
                <td class='table-user'>{$fetch['student_id']}</td>
                <td>{$fetch['student_application_tokenid']}</td>
                <td>".(strlen($fetch['student_application_message']) > 50 
                    ? substr($fetch['student_application_message'], 0, 50)."..." 
                    : $fetch['student_application_message'])."</td>
                <td>{$fetch['student_application_date']}</td>
                <td class='text-center'>
                    <a href='./view_application?viewapplication={$fetch['student_application_id']}' class='text-reset p-1 rounded fs-16 px-1'>
                        <i class='ri-eye-line text-yellow-500 shadow-xl'></i>
                    </a>
                </td>
                <td class='space-x-1 flex gap-1 justify-center'>
                <a href='./administrator_solution_message?messageId={$fetch['student_application_id']}'>Add Remarks</a>
            </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7' class='text-center text-gray-500'>No results found</td></tr>";
    }
}

if(isset($_POST['searchSolved'])) {
    $searchQuery = mysqli_real_escape_string($connection, $_POST['searchSolved']);

    $query = "SELECT * FROM `student_applications` 
              WHERE (`student_id` LIKE '%$searchQuery%' 
              OR `student_application_tokenid` LIKE '%$searchQuery%') 
              AND `student_application_status` = 'Solved'";

    $execute = mysqli_query($connection, $query);

    if(mysqli_num_rows($execute) > 0) {
        while($fetch = mysqli_fetch_array($execute)){
            echo "<tr>
                <td>{$fetch['student_application_id']}</td>
                <td class='table-user'>{$fetch['student_id']}</td>
                <td>{$fetch['student_application_tokenid']}</td>
                <td>".(strlen($fetch['student_application_message']) > 50 
                    ? substr($fetch['student_application_message'], 0, 50)."..." 
                    : $fetch['student_application_message'])."</td>
                <td>{$fetch['student_application_date']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7' class='text-center text-gray-500'>No results found</td></tr>";
    }
}


?>
