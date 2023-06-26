<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class,[
            'label' => false,
            'attr' => [
                'autocomplete' => 'nom',                     
                'class' => 'form-control border-top-0 border-right-0 border-left-0 p-0 mt-2 mb-4',
                'placeholder' => 'Nom'
            ],
        ])
        ->add('prenom',TextType::class,[
            'label' => false,
            'attr' => [
                'autocomplete' => 'prenom',                     
                'class' => 'form-control border-top-0 border-right-0 border-left-0 p-0 mt-2 mb-4',
                'placeholder' => 'Prenom'
            ],
        ])
            
        ->add('email', TextType::class, [
            'label' => false,
            'attr' => [
                'autocomplete' => 'email',                     
                'class' => 'form-control border-top-0 border-right-0 border-left-0 p-0 mt-2 mb-4',
                'placeholder' => 'Email'
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez entrer l\'Adresse email',
                ]),
                new Email([
                    'message' => 'L\'Adresse email n\'est pas valide'
                ]),
                
                new Length([
                    'min' => 2,
                    'minMessage' => 'Votre Adresse emai doit comporter au moins de {{ limit }} caractères',
                    // max length allowed by Symfony for security reasons
                    'max' => 180,
                    'maxMessage' => 'Votre Adresse email ne doit pas comporter plus de {{ limit }} caractères',
                ]),
            ]
        ])
        ->add('etablissement', TextType::class,[
            'label' => false,
            'attr' => [
                'autocomplete' => 'etablissement',                     
                'class' => 'form-control border-top-0 border-right-0 border-left-0 p-0 mt-2 mb-4',
                'placeholder' => 'Etablissement'
            ],
        ])
        ->add('niveauetude',TextType::class,[
            'label' => false,
            'attr' => [
                'autocomplete' => 'niveauetude',                     
                'class' => 'form-control border-top-0 border-right-0 border-left-0 p-0 mt-2 mb-4',
                'placeholder' => 'Niveau d\'étude'
            ],
        ])
        ->add('submit', SubmitType::class,[
            'attr' => [
                'class'=> 'btn btn-primary py-2 px-5'
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
