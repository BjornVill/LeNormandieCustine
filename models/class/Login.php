<?php
class Login {
    protected $data;
    protected $error;
    
    public function __construct($data = []){
        $this->data = $data;
    }
    
    protected function getValue($index){
        if(isset($_POST[$index])){
            if(empty($_POST[$index])){
                $this->createError($index);
            }
            return $_POST[$index];
        }
    }
    
    protected function createError(string $index, $error='input vide'){
        $this->error[$index] = $error;
    }
    
    protected function showError(string $index){
        return isset($this->error[$index]) ? $this->error[$index] . '<br>' : null;
    }
    
    protected function label(string $name){
        return('<label for="'. $name . '">'. $this->data[$name] . '</label>');
    }
    
    public function input(string $name, string $type='text'){
        return($this->label($name). '<input type="'.$type.'" id="'. $name .'" name="'.$name.'" value="'. $this->getValue($name) .'" > <br>'. $this-> showError($name));
    }
    
    public function submit(string $text='Se connecter'){
        return('<input type="submit" value="'.$text.'">');
    }
}
?>