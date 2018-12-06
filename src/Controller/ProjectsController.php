<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Project;

class ProjectsController extends AbstractController
{
    /**
     * @Route("/projects", name="projects")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Project::class);
        $projects = $repo->findAll();

        return $this->render('projects/index.html.twig', ['projects' => $projects]);
    }
}
