<?php

namespace Source\DAO;

use Doctrine\ORM\EntityManager;
use Exception;
use Source\Entity\Livro;
use Source\Util\EntityManagerFactory;

class LivroDAO
{

    private static ?LivroDAO $instance = null;

    private EntityManager $entityManager;

    private function __construct()
    {
        $this->entityManager = EntityManagerFactory::getEntityManager();
    }

    public static function getInstance(): LivroDAO
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function save(Livro $livro): void
    {
        try {
            $this->entityManager->persist($livro);
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
            $categoria = $this->entityManager->getRepository(Livro::class)->find($id);
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
            return $this->entityManager->getRepository(Livro::class)->findBy([], ["titulo" => "asc"]);
        } catch (Exception $e) {
            echo $e;
            redirect("/oops/500");
        }
    }

    public function get(int $id): ?Livro
    {
        try {
            return $this->entityManager->getRepository(Livro::class)->find($id);
        } catch (Exception $e) {
            echo $e;
            redirect("/oops/500");
        }
    }
}
