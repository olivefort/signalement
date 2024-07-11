<?php

namespace App\Form;

use App\Entity\Alert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AlertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('germe', TextType::class, [
                'attr' => [
                    'placeholder' => "germe",
                    'class' => 'rounded placeholder-black !important',
                    // 'minlength' => '2',
                    // 'maxlength' => '50',
                ],
                'label' => 'Nom du germe :',
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'constraints' => [
                    // new Assert\Length(['min'=>2,'max'=>50]),
                    new Assert\NotBlank()                    
                ]
            ])
            ->add('date', DateType::class, [
                "input" => "datetime_immutable",
                'widget' => 'single_text',
                'label' => 'Date du signalement :',
                'label_attr' => [
                    'class' => 'text-white'
                ],
            ])
            ->add('cloture',CheckboxType::class, [
                'attr' => [
                    'class' => 'form-check-input',
                ],
                'required' => false,
                'label' => 'Clôturé ?',
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'constraints' => [
                    new Assert\NotNull()
                ]
            ])
            ->add('finess', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 180000000
                    // 'max' => 459999999
                ],
                'required' => false,
                'label' => 'Numéro de Finess : ',
                'label_attr' => [
                    'class' => 'text-white'
                ],
            ])
            ->add('ville', TextType::class, [
                'attr' => [
                    'placeholder' => "nom de la ville",
                    'class' => 'rounded placeholder-black',
                    // 'minlength' => '2',
                    // 'maxlength' => '50',
                ],
                'label' => 'Ville :',
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'constraints' => [
                    // new Assert\Length(['min'=>2,'max'=>50]),
                    new Assert\NotBlank()                    
                ]
            ])
            ->add('submit', SubmitType::class, 
            [
                'attr' => [
                    'class' => 'rounded bg-neutral-100 px-6 pb-2 pt-2.5 text-xs font-bold uppercase leading-normal text-neutral-600',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Alert::class,
        ]);
    }
}
