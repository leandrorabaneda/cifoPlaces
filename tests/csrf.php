<?php

    echo TestTemplate::start($method); 

    echo "<h1>Test de CSRF</h1>";

    echo "<p>Creando un token CSRF y guardándolo en sesión</p>";
    $token = CSRF::create();
    
    echo "<p>Comprobando lo que hay en sesión</p>";
    echo Session::get('csrf_token');  
    
    echo "<p>Generando un input (previsualización)</p>";
    echo (DB_CLASS)::escape(CSRF::createInput());
    
    echo "<p>Generando un input (solo se verá en el código fuente)</p>";
    echo CSRF::createInput();
    
    echo "<p>Comprobando la validez del token</p>";
    try{
        CSRF::check($token); // OK
        echo "Token validado";
        
        // echo CSRF::check(); // ERROR
        echo CSRF::check("12345"); // ERROR
        
    }catch(Throwable $t){
        echo "<p>Se produjo un error al validar</p>";
    }
    
    echo "<p>Olvidando un token</p>";
    echo CSRF::forget();
    echo Session::get('csrf_token') ?? '<p>No existe</p>';
    
    echo TestTemplate::end(); 
    