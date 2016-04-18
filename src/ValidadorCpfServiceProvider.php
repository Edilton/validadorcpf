<?php

namespace ValidadorCpf;

use Illuminate\Support\ServiceProvider;

class ValidadorCpfServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         $this->app['validator']->extend('cpf', function($attribute, $value, $parameters){
       
         /*
         * Salva em $cpf apenas numeros, isso permite receber o cpf em diferentes formatos,
         * como "000.000.000-00", "00000000000", "000 000 000 00"
         */
        $cpf = preg_replace('/\D/', '', $value);
        $num = array();
 
        /* Cria um array com os valores */
        for($i=0; $i<(strlen($cpf)); $i++) {
 
            $num[]=$cpf[$i];
        }
 
        if(count($num)!=11) {
            return false;
        }else{
            /*
            Combinações como 00000000000 e 22222222222 embora
            não sejam cpfs reais resultariam em cpfs
            válidos após o calculo dos dígitos verificares e
            por isso precisam ser filtradas nesta parte.
            */
            for($i=0; $i<10; $i++)
            {
                if ($num[0]==$i && $num[1]==$i && $num[2]==$i
                 && $num[3]==$i && $num[4]==$i && $num[5]==$i
                 && $num[6]==$i && $num[7]==$i && $num[8]==$i)
                    {
                        return false;
                        break;
                    }
            }
        }
        /*
        Calcula e compara o
        primeiro dígito verificador.
        */
        $j=10;
        for($i=0; $i<9; $i++)
            {
                $multiplica[$i] = $num[$i]*$j;
                $j--;
            }
        $soma = array_sum($multiplica);
        $resto = $soma%11;
        if($resto<2)
            {
                $dg=0;
            }
        else
            {
                $dg=11-$resto;
            }
        if($dg!=$num[9])
            {
                return false;
            }
        /*
        Calcula e compara o
        segundo dígito verificador.
        */
        $j=11;
        for($i=0; $i<10; $i++)
            {
                $multiplica[$i]=$num[$i]*$j;
                $j--;
            }
        $soma = array_sum($multiplica);
        $resto = $soma%11;
        if($resto<2)
            {
                $dg=0;
            }
        else
            {
                $dg=11-$resto;
            }
        if($dg!=$num[10])
            {
                return false;
            }
        else
            {
                return true;
            }
             
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
