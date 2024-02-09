<?php

namespace App\Form;

use App\Entity\Juego;
use App\Entity\Mesa;
use App\Entity\Reserva;
use App\Entity\Usuario;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('completada')
            ->add('fecha_inicio')
            ->add('fecha_fin')
            ->add('juego', EntityType::class, [
                'class' => Juego::class,
'choice_label' => 'id',
            ])
            ->add('usuario', EntityType::class, [
                'class' => Usuario::class,
'choice_label' => 'id',
            ])
            ->add('mesa', EntityType::class, [
                'class' => Mesa::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reserva::class,
        ]);
    }
}
