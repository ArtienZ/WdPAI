<?php

class AppController
{
    protected const MAX_FILE_SIZE= 1024*1024;
    protected const SUPORTED_PHOTO_TYPES=['image/png','image/jpeg'];
    protected const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $request;
    public function __construct()
    {
        $this->request=$_SERVER['REQUEST_METHOD'];
    }
    protected function isPost() : bool{
        return $this->request === 'POST';
    }
    protected function isGet() : bool{
        return $this->request === 'GET';
    }
    protected function render(string $template = null, array $variables = [])
    {
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';
        if (file_exists($templatePath)) {
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }
    protected function validate_photo(array $file):bool
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