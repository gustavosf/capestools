<?php

class Router {

    static $routes = array();

    // route public setters
    public static function get($route, $fn) {
        self::setRoute('GET', $route, $fn);
    }

    public static function post($route, $fn) {
        self::setRoute('POST', $route, $fn);
    }

    public static function delete($route, $fn) {
        self::setRoute('DELETE', $route, $fn);
    }

    public static function update($route, $fn) {
        self::setRoute('UPDATE', $route, $fn);
    }

    private static function setRoute($method, $route, $fn) {
        $method = strtoupper($method);

        preg_match_all('/:([a-z]+)/i', $route, $vars);
        $vars = $vars[1];

        $route = preg_replace('/:[a-z]+/i', '([^\/]+)', addcslashes($route,'/'));

        self::$routes[$method][] = array(
            'route' => $route,
            'fn' => $fn,
            'vars' => $vars,
        );
    }


    public static function route($method, $url) {
        $method = strtoupper($method);
        foreach (self::$routes[$method] as $route) {
            if (preg_match("/{$route['route']}/i", $url, $match)) {
				array_shift($match);
				if (sizeof($match)) 
	                $match = array_combine($route['vars'], $match);
                call_user_func_array($route['fn'], $match);
            }
        }
        // route to default or (404)
    }

}
