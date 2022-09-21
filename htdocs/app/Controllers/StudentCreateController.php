<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class StudentCreateController extends Controller
{
    public function index()
    {
        return view('homepages/moderator/studentcreate');
    }
    public function CreateUsers()
    {
        $text = $this->request->getVar('text');
        $class = $this->request->getVar('class');

        $holdArray = explode("\n", $text);
        $splitArray = [];
        $newSplitArray = [];
        foreach($holdArray as $i => $data){
            $explode = explode(";", $data);
            array_push($splitArray, $explode);
        }
        foreach($splitArray as $i => $data){
            $explode = explode(",", $data[0]);
            $numb = count($explode)-1;
            $tempArray= [];
            $newTempArray =[];
            for($i=$numb; $i >= 0; $i--){
                array_push($tempArray,$explode[$i]);
            }
            $tempName = implode(' ',$tempArray);
            array_push($newTempArray, $tempName, $data[1]);
            array_push($newSplitArray, $newTempArray);
        }
        var_dump($newSplitArray);
        die();
        return view('Home');
    }
}