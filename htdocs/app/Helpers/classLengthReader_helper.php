<?php 

use App\Models\getUsersClasses;

/**
 * classLengthReader
 *
 * @param  int $classID the id of the class you want to get all the students from
 * @return int returns the amount of students in a specific class
 */
function classLengthReader($classID){
    $usersClassesModel = new getUsersClasses();
    $allUserIDs = $usersClassesModel->where('ClassID', $classID)->findAll();
    $usersClassesModel;

    return count($allUserIDs);
}