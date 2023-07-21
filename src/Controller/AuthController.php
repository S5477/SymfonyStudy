<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\UuidV7;

class AuthController extends AbstractController
{
    #[Route('/auth', name: 'app_auth')]
    public function index(EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $entityManager->getRepository(User::class)->createUser([
            'name' => 'John1',
            'surname' => 'Doe1',
            'nickname' => 'johndoe1',
            'email' => 'johndoe1@example.com',
            'password' => 'mypassword1',
        ]);

        $entityManager->persist($user);

        $entityManager->flush();

        $user = $entityManager->getRepository(User::class)->find(UuidV7::fromString('01897662-2ba9-799e-86f1-f9a1b6869bd0'));

        var_dump($user);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AuthController.php',
        ]);
    }
}
