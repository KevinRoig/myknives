<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Knife;
use App\Entity\User;
use PhpParser\Parser\Multiple;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Security\Core\Security;

class KnifeType extends AbstractType
{   
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', TextType::class)
            ->add('maker', TextType::class)
            ->add('blade_length', NumberType::class, [
                'required' =>false
            ])
            ->add('blade_thickness', NumberType::class, [
                'required' =>false
            ])
            ->add('blade_material', TextType::class, [
                'required' => false
            ])
            ->add('handle_length', NumberType::class, [
                'required' => false
            ])
            ->add('handle_material', TextType::class, [
                'required' => false
            ])
            ->add('total_length', NumberType::class, [
                'required' => false
            ])
            ->add('state', ChoiceType::class, [
                'choices' => [
                'En ma possession' => 'En ma possession',
                'Revendu' => 'Revendu',
                'Perdu' => 'Perdu'
                ]])
            ->add('user', EntityType::class, [
                'class' => User::class, 
                'choice_label' => 'lastname',
                'multiple' => false,
                'expanded' => false,
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Knife::class,
        ]);
    }
}
