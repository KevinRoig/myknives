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
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('maker', TextType::class, [
                'label' => 'Fabricant'
            ])
            ->add('blade_length', NumberType::class, [
                'required' => false,
                'label' => 'Longueur de la lame'
            ])
            ->add('blade_thickness', NumberType::class, [
                'required' => false,
                'label' => 'Epaisseur de la lame'
            ])
            ->add('blade_material', TextType::class, [
                'required' => false,
                'label' => 'Matériau de la lame'
            ])
            ->add('handle_length', NumberType::class, [
                'required' => false,
                'label' => 'Longueur du manche'
            ])
            ->add('handle_material', TextType::class, [
                'required' => false,
                'label' => 'Matéreiau du manche'
            ])
            ->add('total_length', NumberType::class, [
                'required' => false,
                'label' => 'Longueur totale'
            ])
            ->add('state', ChoiceType::class, [
                'choices' => [
                'En ma possession' => 'En ma possession',
                'Revendu' => 'Revendu',
                'Perdu' => 'Perdu',
                'label' => 'Etat'
                ]])
            ->add('user', EntityType::class, [
                'class' => User::class, 
                'choice_label' => 'lastname',
                'multiple' => false,
                'expanded' => false,
                'label' => 'Utilisateur'
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
