<?php
/**
 * autocomplete provider
 * @package cli
 * @version 0.0.5
 */

namespace Cli\Library;

class Autocomplete
{
	static function none(): string{
		return '1';
	}

	static function primary($args): string{
		$farg = $args[0];

		$gates  = include BASEPATH . '/etc/cache/gates.php';
		$routes = include BASEPATH . '/etc/cache/routes.php';

		$result = [];

		foreach($gates as $gate){
            if($gate->host->value !== 'CLI')
                continue;

            foreach($routes->{$gate->name} as $route){
                $bpath = explode(' ', trim($route->path->value))[0];
                if($bpath === 'autocomplete')
                	continue;
                
                if($farg === $bpath){
            		$result = ['1'];
                	break 2;
                }

                if(!in_array($bpath, $result))
                	$result[] = $bpath;
            }
        }

        return trim(implode(' ', $result));
	}
}