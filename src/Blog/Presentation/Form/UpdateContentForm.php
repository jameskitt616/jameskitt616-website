<?php

namespace App\Blog\Presentation\Form;

use App\Blog\Application\Command\UpdateContent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

final class UpdateContentForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, [
            'required' => false,
        ]);

        $builder->add('text', TextareaType::class, [
            'required' => false,
        ]);

        $builder->add('imageFile', FileType::class, [
            'required' => false,
            'constraints' => [
                new Image([
                    'maxSize' => '2M',
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UpdateContent::class,
        ]);
    }
}
