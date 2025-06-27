<?php 

namespace App\Controller;

use App\Entity\Veiculo;
use App\Form\FipeType;
use App\Form\VeiculoType;
use App\Repository\VeiculoRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class VeiculoController extends AbstractController{

#[Route('/veiculo', name:'veiculo')]
public function index(VeiculoRepository $veiculoRepository) : Response {
    $data['veiculo'] = $veiculoRepository->findAll();
    $data['titulo'] = 'Veiculos';

    return $this->render('veiculo/index.html.twig', $data);
        
}

#[Route('/veiculo/adicionar', name:'veiculo_adicionar')]
#[IsGranted('ROLE_ADMIN')]
public function adicionar(Request $request, EntityManagerInterface $em) : Response{
    $msg = '';
    $veiculo = new Veiculo();
    $form = $this->createForm(VeiculoType::class, $veiculo);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $em->persist($veiculo);
        $em->flush();
        $msg='Veiculo cadastrado com sucesso.';
    }
    $data['titulo'] = 'Cadastrar Veiculo';
    $data['form'] = $form;
    $data['msg'] = $msg;

    return $this->render('veiculo/form.html.twig', $data);
}

#[Route('/veiculo/editar/{id}', name:'veiculo_editar')]
public function editar($id, Request $request, EntityManagerInterface $em, VeiculoRepository $veiculorep) : Response{
    $this->denyAccessUnlessGranted('ROLE_ADMIN');
    $msg = '';
    $veiculo = $veiculorep->find($id);
    $form = $this->createForm(VeiculoType::class, $veiculo);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $em->flush();
        $msg='Veiculo editado com sucesso.';
    }
    $data['titulo'] = 'Alterar dados do Veiculo';
    $data['form'] = $form;
    $data['msg'] = $msg;

    return $this->render('veiculo/form.html.twig', $data);
}

#[Route('/veiculo/excluir/{id}', name:'veiculo_excluir')]
public function excluir($id ,Request $request, EntityManagerInterface $em, VeiculoRepository $veiculoRepository) : Response{
    $this->denyAccessUnlessGranted('ROLE_ADMIN');
    $veiculo = $veiculoRepository->find($id);
    
    $em->remove($veiculo);
    $em->flush();
    
    return $this->redirectToRoute('veiculo');
    
}




}

?>