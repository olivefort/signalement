<?php

namespace App\Form;

use App\Entity\Alert;
use App\Data\SearchData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('field', TextType::class,[
                'attr' => [
                    'placeholder' => "Rechercher",
                    'class' => 'rounded',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label' => 'germe',
                'label_attr' => [
                    'class' => 'font-bold text-white m-6'
                ],
                'required' => false,
                
            ])
            ->add('departement', ChoiceType::class, [
                
                'choices' => [
                    '18' => true,
                    '28' => true,
                    '36' => true,
                    '37' => true,
                    '41' => true,
                    '45' => true,
                ],
                
                'label' => "departement",
                'label_attr' => [
                    'class' => 'text-white'
                ],
                // 'required' => false,
                // 'class'=> Alert::class,
                // 'expanded' => true,
                // 'multiple' => true
            ])
            ->add('dateMin', DateType::class, [                
                'label' => 'Entre le : ',
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'required' => false,
            ])
            ->add('dateMax', DateType::class, [
                'label' => 'Et le : ',
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'required' => false,
            ])
            ->add('cloture', CheckboxType::class, [
                'label' => 'Clôturé',
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'required' => false
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method'    => 'GET',
            'csrf_protection' => false,
        ]);

    }

    public function getBlockPrefix()
    {
        return '';
    }

}
