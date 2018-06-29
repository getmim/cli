<?php
/**
 * CLI Base controller
 * @package cli
 * @version 0.0.4
 */

namespace Cli;

use Cli\Library\Bash;

class Controller extends \Mim\Controller implements \Mim\Iface\GateController
{
    public function show404(): void{
        $this->show404Action();
    }
    
    public function show404Action(): void{
        Bash::error('Unknow action, please hit `mim help` for list of actions');
    }
    
    public function show500(object $error): void{
        $this->show500Action($error);
    }
    
    public function show500Action(object $error): void{
        Bash::echo('Internal Application Error');
        Bash::echo($error);
    }
}