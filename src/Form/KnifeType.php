<?php

namespace App\Form;

use App\Entity\Knife;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('blade_length', NumberType::class)
            ->add('blade_thickness', NumberType::class)
            ->add('blade_material', TextType::class)
            ->add('handle_length', NumberType::class)
            ->add('handle_material', TextType::class)
            ->add('total_length', NumberType::class)
            ->add('state', ChoiceType::class, [
                'choices' => [
                'En ma possession' => 'En ma possession',
                'Revendu' => 'Revendu',
                'Perdu' => 'Perdu'
                ]])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Knife::class,
        ]);
    }
}
