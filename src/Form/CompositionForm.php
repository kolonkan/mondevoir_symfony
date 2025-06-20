<?php

namespace App\Form;

use App\Entity\Composition;
use App\Entity\Joueur;
use App\Entity\Rencontre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompositionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('joueurs', EntityType::class, [
                'class' => Joueur::class,
                'choice_label' => function (Joueur $joueur) {
                    return $joueur->getNom() . ' ' . $joueur->getPrenom() . ' (N°' . $joueur->getNumero() . ')';
                },
                'multiple' => true,
                'expanded' => true,
                'label' => 'Sélection des joueurs',
                'attr' => ['class' => 'player-checkboxes'],
            ])
            ->add('titulaire', CheckboxType::class, [
                'label' => 'Est-ce une composition titulaire ?',
                'required' => false,
            ])
            ->add('rencontre', EntityType::class, [
                'class' => Rencontre::class,
                'choice_label' => function (Rencontre $r) {
                    return $r->getAdversaire() . ' - ' . $r->getDateRencontre()->format('d/m/Y');
                },
                'label' => 'Rencontre associée',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Composition::class,
        ]);
    }
}
