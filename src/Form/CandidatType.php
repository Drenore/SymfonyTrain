<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cin', IntegerType::class,[
            'attr' => [
                'class' => 'form-control'],
            ])
            ->add('nom', TextType::class,[
                'attr' => [
                    'class' => 'form-control'],
                ])
            ->add('prenom', TextType::class,[
                'attr' => [
                    'class' => 'form-control'],
                ])
            ->add('score', IntegerType::class,[
                'attr' => [
                    'class' => 'form-control'],
                ])
            ->add('motcle', TextType::class,[
                'attr' => [
                    'class' => 'form-control'],
                ])
            ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}