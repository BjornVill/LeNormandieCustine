<?php

class Register extends Login {
    
    protected $data;
    protected $className = [
            'input'=>'',
            'label'=>'',
            'submit'=>'',
            'error'=>''];
        
    public function __construct(Array $data = [], Array $class){
        if (empty($class)){
            $this->className = $class;
        }
        $this->data = $data;
    }
    
    protected function label($name){
        $class = $this ->className ['label'];
        return('<label class="'.$class.'" for="'. $name . '">'. $this->data[$name] . '</label>');
    }
    
    public function input($name,$type='text'){
        $class = $this ->className ['input'];
        return($this->label($name).'<input class="'.$class.'" type="'.$type.'" id="'.$name.'"name="'.$name.'" value="'.$this->getValue($name).'"> '. $this->showError($name));
    }

    public function submit($text='Créer votre compte'){
        $class = $this ->className ['submit'];
        return('<input class="'.$class.'" type="submit" value="'.$text.'">');
    }

    protected function showError($index){
        $class = $this ->className ['error'];
        return isset($this->error[$index]) ? '<p class="'.$class.'">'. $this->error[$index] . '</p>' : null;
    }

}
?>