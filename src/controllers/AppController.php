<?php

class AppController{
    protected function render(string $template = null, array $varriables = []){
        $template_path = 'public/views/' . $template . '.html';
        $output = 'File not found';
        if(file_exists($template_path)){
            extract($varriables)
            ob_start();
            include $template_path;
            $output = ob_get_clean();
        }
        print $output;
    }
}
?>