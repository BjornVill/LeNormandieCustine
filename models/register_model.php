<?php
    //tableau pour initialiser les classes des inputs
    $className = [
            'input'=>'input',
            'label'=>'label',
            'submit'=>'btn',
            'error'=>'error'
    ];
    
    //tableau pour initialiser les labels des inputs
     $formLabel = [
            'email' => 'Email',
            'password' => 'Mot de passe',
            'last_name' => 'Nom',
            'first_name' => 'Prénom',
            'phone' => 'Téléphone'
    ];
    
    //Initialisation formulaire d'enregistrement
    $myRegister = new Register($formLabel, $className);
    
    $createUser = new Database();
    
    //Error messages for blank input
    $errorEmail = '';
    if(!isset($_POST['email'])){
        $errorEmail = 'Veuillez rentrer une adresse email';        
    }
    
    $errorPassword = '';
    if(!isset($_POST['password'])){
        $errorPassword = 'Veuillez rentrer un mot de passe';        
    }
    
    $errorLastName = '';
    if(!isset($_POST['last_name'])){
        $errorLastName = 'Veuillez rentrer un nom';        
    }
    
    $errorFirstName = '';
    if(!isset($_POST['first_name'])){
        $errorFirstName = 'Veuillez rentrer un prénom';        
    }
    
    $errorPhone ='';
    if(!isset($_POST['phone'])){
        $errorPhone = 'Veuillez rentrer un numéro de téléphone';        
    }
    
    if (isset($_POST['submit'])){
        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['phone'])){
            $statement =('SELECT email FROM users WHERE email = :email');
            $params=['email'=>htmlentities($_POST['email'])];
            $existingEmail = $createUser->prepare($statement,$params);
            
            if ($existingEmail !== false){
                $
                $statement= ('INSERT INTO users (email, password, last_name, first_name, phone) VALUE (:email, :password, :last_name, :first_name, :phone)');
                $params =['email'=>htmlentities($_POST['email']),
                    'password'=>htmlentities($_POST['password']),
                    'last_name'=>htmlentities($_POST['last_name']),
                    'first_name'=>htmlentities($_POST['first_name']),
                    'phone'=>htmlentities($_POST['phone'])
                    ];
                  $createUser->prepare($statement,$params);
            }
        }
    }

?>