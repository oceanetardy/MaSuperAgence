<?php

namespace App\Form;

use App\Entity\Option;
use App\Entity\Property;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\Uploadable;
use App\Listener;
use Vich\UploaderBundle\Form\Type\VichImageType;


class PropertyType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',null, [
                'label' => 'Titre',
            ])
            ->add('description')
            ->add('surface')
            ->add('rooms' ,null, [
            'label' => 'Pièces',
            ])
            ->add('bedrooms' ,null, [
            'label' => 'Chambre',
            ])
            ->add('floor',null, [
                'label' => 'Étage',
            ])
            ->add('price',null, [
                'label' => 'Prix',
            ])
            ->add('heat', ChoiceType::class, [
                    'choices' => $this->getChoices(), 'label' => 'Chauffage'
                ]
            )
            ->add('options', EntityType::class, [
                'class' => Option::class,
                'required' => false,
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('city',null, [
                'label' => 'Ville',
            ])

            ->add('imageFile', VichFileType::class, [
                'required' => false
            ])

            ->add('address', null, [
            'label' => 'Adresse',
            ])
            ->add('postal_code',null, [
                'label' => 'Code postal',
            ])
            ->add('sold',null, [
                'label' => 'Vendu',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }

    private function getChoices()
    {
        $choices = Property::HEAT;
        $output = [];
        foreach ($choices as $k => $v){
            $output[$v] = $k;
        }
        return $output;
    }
}
