<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre prénom !'
                    ])
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre nom !'
                    ])
                ],
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre email !'
                    ])
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Numéro de téléphone',
                'help' => 'Format recommandé : 01-11-11-11-11',
                'required' => true,
                'constraints' => [
                    new Regex([
                        'match' => true,
                        'pattern' => "/[\d\ \-\.]/",
                        'message' => "Votre saisie ne doit contenir que des chiffres, des points, des tirets ou des espaces!",
                    ])
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'required' => true,
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez saisir un message !'])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
