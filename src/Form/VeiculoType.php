<?php 

namespace App\Form;

use App\Entity\Fipe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class VeiculoType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fipe',EntityType::class, [ 'class'=> Fipe::class, 'choice_label'=>'codigo', 'label'=> 'Código Fipe: '])
                ->add('preco', MoneyType::class, ['label'=> 'Preço: '])
                ->add('fabricante',TextType::class, ['label'=>'Marca: '])
                ->add('modelo',TextType::class, ['label'=>'Modelo: '])
                ->add('ano',IntegerType::class, ['label'=>'Ano: '])
                ->add('versao',TextType::class, ['label'=>'Versão: '])
                ->add('qtd_estoque',IntegerType::class, ['label'=>'Quantidade em Estoque: '])
                ->add('cidade',TextType::class, ['label'=>'Cidade: '])
                ->add('Salvar', SubmitType::class);
    }
}
?>