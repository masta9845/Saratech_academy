<?php
namespace App\Form;


use App\Entity\Utilisateur;
use Webmozart\Assert\Assert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Email;

class RegistrationFormType extends AbstractType
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
            ->add('numero', TextType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'numero',                     
                    'class' => 'form-control border-top-0 border-right-0 border-left-0 p-0 mt-2 mb-4',
                    'placeholder' => 'Numero'
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
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Accepter nos conditions',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions.',
                    ]),
                ],
                'label_attr' => [
                    'class' => 'mr-2',
                ],
            ])
     



             ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',                     
                    'class' => 'form-control border-top-0 border-right-0 border-left-0 p-0 mt-2 mb-4',
                    'placeholder' => 'Mot de passe'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
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