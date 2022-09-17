<?php

namespace Source\Util;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerFactory
{

    private static ?EntityManager $instance = null;

    private function __construct()
    {
    }

    public static function getEntityManager(): EntityManager
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = ORMSetup::createAnnotationMetadataConfiguration(array(__DIR__ . "/../../source"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $conn = array(
            "url" => "mysql://root:@localhost/sistema_biblioteca"
        );

        if (self::$instance == null) {
            self::$instance = EntityManager::create($conn, $config);
        }
        return self::$instance;
    }
}
