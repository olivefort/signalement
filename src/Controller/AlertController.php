<?php

namespace App\Controller;

use App\Entity\Alert;
use App\Form\AlertType;
use App\Repository\AlertRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlertController extends AbstractController
{
    #[Route('/alerte', name: 'alert.index', methods: ['GET'])]
    public function index(
        AlertRepository $repository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $alert = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page',1),10
        );
        return $this->render('pages/alert/index.html.twig', [
            'alert' => $alert,
        ]);
    }

    //Ajout d'une alerte
    #[Route('/alerte/creation', name: 'alert.new', methods: ['GET','POST'])]
    public function new(
        EntityManagerInterface $manager,
        Request $request,
        Departement $Department
    ) :Response {
        $alert = new Alert();
        $form = $this->createForm(AlertType::class, $alert); 

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $alert = $form->getData();
            // var_dump($alert);
            // $alert->setUser($this->getUser());

            $depRepository = $manager->getRepository(Department::class);
            $department = $depRepository ->findOneBy(); //Chercher
            

            // $department = new Departement();
            // var_dump($department);
            // $number =
            // $fitness->setNumber($number);            
            // $department->setNumber(substr($number, 0, 2));
            // $manager->persist($department);
            // $manager->save();

            $manager->persist($alert);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre alerte a bien été ajouté avec succès !'
            );

            return $this->redirectToRoute('alert.index');
        }
        
        return $this->render('pages/alert/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
