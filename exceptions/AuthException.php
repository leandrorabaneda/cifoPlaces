<?php

/* Clase AuthException 
 *
 * Para distinguir las excepciones de autorización
 *
 * autor: Robert Sallent
 * última revisión: 13/04/2023
 *
 */

    class AuthException extends Exception{
        
        public function __construct(
            string $message = 'Unauthorized',
            string $responseMessage = 'Unauthorized', 
            int $code = 401, 
            Throwable $previous = NULL
        ){
            parent::__construct($message, $code, $previous);
            header("HTTP/1.1 $code $responseMessage");
        }   
        
    }
    
    