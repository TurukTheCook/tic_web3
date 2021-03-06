<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index(UserInterface $user)
    {
        $projects = $user->getProjects();

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'projects' => $projects
        ]);
    }
}
