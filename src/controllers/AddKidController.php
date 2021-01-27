<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';

class AddKidController extends AppController
{
    const MAX_FILE_SIZE= 1024*1024;
    const SUPORTED_PHOTO_TYPES=['image/png','image/jpeg'];
    const SUPORTED_DOC_TYPES = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.oasis.opendocument.text'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];


   public function addKid(){
       if($this->isPost() && is_uploaded_file($_FILES['kid-photo']['tmp_name']) && $this->validate($_FILES['kid-photo'])){
            move_uploaded_file(
                $_FILES['kid-photo']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['kid-photo']['name']
            );
           return $this->render('myprofile', ['messages'=>$this->messages]);
       }
       return $this->render('myprofile',['messages'=>$this->messages]);
   }

    private function validate(array $file):bool
    {
        if($file['size']>self::MAX_FILE_SIZE){
           $this->messages[]= 'File is too large for destination file system.';
           return false;
        }
        if(!isset($file['type']) || !in_array($file['type'],self::SUPORTED_PHOTO_TYPES)){
            $this->messages[]= 'File type is not supported';
            return false;
        }
        return true;
    }
}