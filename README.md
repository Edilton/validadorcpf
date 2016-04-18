# validadorcpf
Laravel 5 Service Provider para validação de CPF

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
          'cpf'                  => 'O CPF é inválido',
         ];
      ```
      
  
  * No seu validador use a tag cpf 
  
    ```php
  
     'cpf' =>'required|max:11|cpf|unique:sua_tabela'

    ```
  * Função retirada de [http://www.laravel.com.br/criando-um-validator-customizado-cnpj-e-cpf-laravel/]
