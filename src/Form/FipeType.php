<?php 

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FipeType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codigo',TextType::class, ['label'=> 'Código: '])
                ->add('valor', MoneyType::class, ['label'=> 'Valor: '])
                ->add('historico',DateType::class, ['label'=>'Mês/Ano: '])
                ->add('Salvar', SubmitType::class);
    }
}
?>