# validadorcpf
Laravel 5 Service Provider para validação de CPF e CNPJ

#Install
  ```bash
    composer require edilton/validadorcpf dev-master
  ```

## USo

* Add essa linha no arquivo config/app.php

  ```php
  
    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
       
        ValidadorCpf\ValidadorCpfServiceProvider::class
    ],

  ```
  * Personalizando a msg 
    Edit o seu arquivo em resources/lang/en/validation.php ou /lang/pt_BR/validation.php 
    
      ```php
        return [  
          'cpf'            => 'O CPF é inválido',
          'cnpj'           => 'O CNPJ é inválido',
         ];
      ```
      
  
  * No seu validador use a tag cpf 
  
    ```php
  
     'cpf' =>'cpf',
     'cnpj' => 'cnpj'

    ```
