<?php

namespace Source\Core;

/**
 * PHP | Class Connect
 *
 * @author Murillo Araújo <murilloaraujog@gmail.com>
 * @package Source\Core
 */
class Connect
{
    /** @const array */
    private const OPTIONS = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL
    ];

    /** @var \PDO */
    private static $instance;

    /**
     * @return \PDO
     */
    public static function getInstance(): ?\PDO
    {
        if (empty(self::$instance)) {
            try {

                if (strpos($_SERVER['HTTP_HOST'], "localhost") !== false) {
                    self::$instance = new \PDO(
                        "mysql:host=" . CONF_DB_HOST_LOCAL . ";dbname=" . CONF_DB_NAME_LOCAL,
                        CONF_DB_USER_LOCAL,
                        CONF_DB_PASS_LOCAL,
                        self::OPTIONS
                    );
                } else {
                    self::$instance = new \PDO(
                        "mysql:host=" . CONF_DB_HOST_DEPLOY . ";dbname=" . CONF_DB_NAME_DEPLOY,
                        CONF_DB_USER_DEPLOY,
                        CONF_DB_PASS_DEPLOY,
                        self::OPTIONS
                    );
                }
            } catch (\PDOException $exception) {
                redirect("/ops/problemas");
            }
        }

        return self::$instance;
    }

    /**
     * Connect constructor.
     */
    final private function __construct()
    {
    }

    /**
     * Connect clone.
     */
    final private function __clone()
    {
    }
}
