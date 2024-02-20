<?php

namespace App\Form;

use App\Entity\Juego;
use App\Entity\TipoMesa;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FyleType;

use Symfony\Component\OptionsResolver\OptionsResolver;


class JuegoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('imagen', FileType::class, array('label' => 'Nombre'))
            ->add('min_jug')
            ->add('max_jug')
            ->add('tipomesa', EntityType::class, [
                'class' => TipoMesa::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Juego::class,
        ]);
    }
}
