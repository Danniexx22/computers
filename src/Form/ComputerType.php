<?php

namespace App\Form;

use App\Entity\Computer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComputerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serie')
            ->add('marca')
            ->add('modelo')
            ->add('codigo')
            ->add('categoria')
            ->add('unidad')
            ->add('ip')
            ->add('marcamonitor')
            ->add('seriemonitor')
            ->add('usuariogenerico')
            ->add('noinventario')
            ->add('anioadquisicion')
            ->add('dominio')
            ->add('cantidadusuarios')
            ->add('idnodo')
            ->add('origen')
            ->add('piso')
            ->add('tipoconsultorio')
            ->add('area')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Computer::class,
        ]);
    }
}
