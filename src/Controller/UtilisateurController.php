<?php

namespace App\Controller;


use App\Entity\Utilisateur;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
    #[Route('/utilisateur', name: 'app_utilisateur')]
    public function index(): Response
    {
        return $this->render('admin/utilisateur.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }

    #[Route('utilisateur/edit/{id}',name: 'app_edit_users')]
    public function edittion(Utilisateur $user) : Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        if (!$this->getUser() === $user) {
            // arevoir
            return $this->redirectToRoute('app_etudiant');
            // if (in_array('ROLE_ADMIN', $this->getUser()->getRoles(), true)) {
            //     return $this->redirectToRoute('app_admin');
            // } else {
            //     return $this->redirectToRoute('app_etudiant');
            // }
        }
        $form = $this->createForm( UserType::class,$user);
        return $this->render('etudiant/editetud.html.twig',[
            'form' => $form->createView(),
            'controller_name' => 'UtilisateurController',
        ]);
        // return $this->render('etudiant/edit.html.twig', [
            
        // ]);
    }

//     #[Route('Utilisateur/edit/{id}',name: 'app_edit_users')]
//     public function edit(Utilisateur $user):Response
//     {
//         if (!$this->getUser()) {
//             return $this->redirectToRoute('app_login');
//         }
//         if ($this->getUser() === $user) {
//             // arevoir
//             if (in_array('ROLE_ADMIN', $this->getUser()->getRoles(), true)) {
//                 return $this->redirectToRoute('app_admin');
//             } else {
//                 return $this->redirectToRoute('app_etudiant');
//             }
//         }
//         $form = $this->createForm( UserType::class,$user);
//         return $this->render('Utilisateur/edit.html.twig',[
//             'form' => $form->createView(),
//         ]);
//     }
}
