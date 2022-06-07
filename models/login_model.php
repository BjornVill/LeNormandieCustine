<?php
    
    $formLabel = [
            'email' => 'Email',
            'password' => 'Mot de passe'
    ];

    $myLogin = new Login($formLabel);
    
    $checkConnection = new Database();

    if (isset($_POST['email']) && isset($_POST['password'])){
        
        $statement = ('SELECT email, password FROM users WHERE email = :email');
        $params =['email'=> htmlentities($_POST['email'])];

        $checkConnection->prepare($statement, $params);

        if ($checkConnection === false){
            //l'utilisateur n'est pas inscrit
            
        } else {
            //password_verify($_POST['password']
                var_dump($checkConnection);

        }
    }
?>