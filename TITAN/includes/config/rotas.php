<?php
//ROTAS
class Rotas
{
    private static $roots = array(
        "view" => "/TITAN/view/",
        "model" => "/TITAN/includes/model/",
        "controller" => "/TITAN/includes/controller/",
        "config" => "/TITAN/includes/config/",
    );

    private static $views = array();
    private static $models = array();
    private static $controllers = array();
    private static $configs = array();

    public static function getControllersRoutes()
    {
        return self::$controllers = array(
            "produto" => self::$roots["controller"] . "produtoManagement/produtoController.php",
        );
    }

    public static function getModelsRoutes()
    {
        return self::$models = array(
            "produto" => self::$roots["model"] . "produtoManagement/produtoModel.php",
        );
    }

    public static function getConfigsRoutes()
    {
        return self::$configs = array(
            "conexao" => self::$roots["config"] . "conexao.php",
        );
    }
}
