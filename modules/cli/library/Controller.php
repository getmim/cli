<?php
/**
 * CLI Base controller
 * @package cli
 * @version 0.0.1
 */

namespace Cli;

class Controller extends \Mim\Controller implements \Mim\Iface\GateController
{

    public function echo(string $str): void{
        print_r($str);
        echo PHP_EOL;
    }
    
    public function error(string $str): void{
        $text = 'Error: ' . $str;
        $this->echo($text);
        exit;
    }
    
    public function show404(): void{
        $this->show404Action();
    }
    
    public function show404Action(): void{
        $this->echo('Unknow action. Please hit `mim help` for list of actions');
    }
    
    public function show500(object $error): void{
        $this->show500Action($error);
    }
    
    public function show500Action(object $error): void{
        $this->echo('Internal Application Error');
        $this->echo($error);
    }
}