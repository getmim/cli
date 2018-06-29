<?php
/**
 * autocomplete provider
 * @package cli
 * @version 0.0.7
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

                if(!in_array($bpath, $result))
                	$result[] = $bpath;
            }
        }

        $result_imploded = trim(implode(' ', $result));

        if($farg === '-')
        	return $result_imploded;

        if(in_array($farg, $result))
        	return '1';

        $farglen = strlen($farg);
        $match_found = false;
        foreach($result as $res){
        	if($farg === substr($res, 0, $farglen)){
        		$match_found = true;
        		break;
        	}
        }

        return $match_found ? $result_imploded : '1';
	}
}