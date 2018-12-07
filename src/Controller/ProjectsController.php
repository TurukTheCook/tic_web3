<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Project;
use App\Entity\LangCode;
use Symfony\Component\Security\Core\User\UserInterface;

class ProjectsController extends AbstractController
{
    /**
     * @Route("/projects", name="projects")
     */
    public function index()
    {
        $projectsRepo = $this->getDoctrine()->getRepository(Project::class);
        $projects = $projectsRepo->findAll();

        return $this->render('projects/index.html.twig', ['projects' => $projects]);
    }

    /**
     * @Route("/projects/create", name="projects_create")
     */
    public function create(Request $request, UserInterface $user): Response
    {
        $langsRepo = $this->getDoctrine()->getRepository(LangCode::class);
        $langs = $langsRepo->findAll();
        
        if ($request->isMethod('POST')) {
            $projectName = $request->request->get('projectName');
            $projectLangId = $request->request->get('projectLangCode');
            $projectLangCode = $langsRepo->find($projectLangId);
            
            $project = new Project();
            $project->setName($projectName);
            $project->setLangCode($projectLangCode);
            $project->setUserId($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            return $this->redirectToRoute('projects');
        }
        
        return $this->render('projects/create.html.twig', ['langs' => $langs]);
    }
}
