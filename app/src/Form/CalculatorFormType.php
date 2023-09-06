<?php

namespace App\Form;

use App\Enum\CalculatorOperationEnumType;
use App\Enum\Interface\EnumNormalizeInterface;
use App\Model\CalculatorDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalculatorFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstArgument', NumberType::class, [
                'label' => 'Аргумент 1'
            ])
            ->add('operation', EnumType::class, [
                'class' => CalculatorOperationEnumType::class,
                'choices' => CalculatorOperationEnumType::cases(),
                'label' => 'Операция',
                'choice_label' => static function (CalculatorOperationEnumType $enumType): string {
                    return $enumType->value;
                }
            ])
            ->add('secondArgument', NumberType::class, [
                'label' => 'Аргумент 2'
            ])
            ->add('calculate', SubmitType::class, [
                'label' => "Результат"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CalculatorDto::class
        ]);
    }
}