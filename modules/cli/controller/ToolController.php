<?php
/**
 * Tool tools
 * @package cli
 * @version 0.0.1
 */

namespace Cli\Controller;

class ToolController extends \Cli\Controller
{
    public function helpAction(): void{
        $gates  = include BASEPATH . '/etc/cache/gates.php';
        $routes = include BASEPATH . '/etc/cache/routes.php';
        
        $this->echo('Usage: mim [command] [options...]');
        $this->echo('');
        
        foreach($gates as $gate){
            if($gate->host->value !== 'CLI')
                continue;
            $base = $gate->path->value;
            foreach($routes->{$gate->name} as $route){
                $pref = ' ' . trim($route->path->value);
                $pref = str_pad($pref, 40, ' ');
                $pref.= $route->info ?? 'No info provided';
                $this->echo($pref);
            }
        }
        $this->echo('');
    }
    
    public function versionAction(): void{
        $this->echo($this->config->name);
        $dirs = \Mim\Library\Fs::scan(BASEPATH . '/modules');
        sort($dirs);
        foreach($dirs as $dir){
            $dir_abs = BASEPATH . '/modules/' . $dir;
            if(!is_dir($dir_abs))
                continue;
            $mod = '- ' . $dir;
            $mod_config = include $dir_abs . '/config.php';
            $mod.= ' ' . $mod_config['__version'];
            $this->echo($mod);
        }
    }
}