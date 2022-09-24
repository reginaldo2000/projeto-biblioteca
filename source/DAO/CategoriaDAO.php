<?php

namespace Source\DAO;

use Doctrine\ORM\EntityManager;
use Exception;
use Source\Entity\Categoria;
use Source\Util\EntityManagerFactory;

class CategoriaDAO
{

    private static ?CategoriaDAO $instance = null;

    private EntityManager $entityManager;

    private function __construct()
    {
        $this->entityManager = EntityManagerFactory::getEntityManager();
    }

    public static function getInstance(): CategoriaDAO
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function save(Categoria $categoria): void
    {
        try {
            $this->entityManager->persist($categoria);
            $this->entityManager->flush();
        } catch (Exception $e) {
            echo $e;
            redirect("/oops/500");
        }
    }

    public function update(): void
    {
        try {
            $this->entityManager->flush();
        } catch (Exception $e) {
            echo $e;
            redirect("/oops/500");
        }
    }

    public function delete(int $id): void
    {
        try {
            $categoria = $this->entityManager->getRepository(Categoria::class)->find($id);
            $this->entityManager->remove($categoria);
            $this->entityManager->flush();
        } catch (Exception $e) {
            echo $e;
            redirect("/oops/500");
        }
    }

    public function list(): array
    {
        try {
            return $this->entityManager->getRepository(Categoria::class)->findBy([], ["nome" => "asc"]);
        } catch (Exception $e) {
            echo $e;
            redirect("/oops/500");
        }
    }

    public function get(int $id): ?Categoria
    {
        try {
            return $this->entityManager->getRepository(Categoria::class)->find($id);
        } catch (Exception $e) {
            echo $e;
            redirect("/oops/500");
        }
    }
}
