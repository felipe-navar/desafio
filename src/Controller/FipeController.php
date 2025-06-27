<?php 

namespace App\Controller;

use App\Entity\Fipe;
use App\Form\FipeType;
use App\Repository\FipeRepository;
use Doctrine\DBAL\Driver\Mysqli\Initializer\Charset;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class FipeController extends AbstractController{

#[Route('/fipe', name:'fipe')]
public function index(FipeRepository $fipeRepository) : Response {

    $data['tabelas'] = $fipeRepository->findAll();
    $data['titulo'] = 'Tabelas Fipe';

    return $this->render('fipe/index.html.twig', $data);
    
}

#[Route('/fipe/adicionar', name:'fipe_adicionar')]
public function adicionar(Request $request, EntityManagerInterface $em) : Response{
    $this->denyAccessUnlessGranted('ROLE_ADMIN');
    $msg = '';
    $fipe = new Fipe();
    $form = $this->createForm(FipeType::class, $fipe);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $em->persist($fipe);
        $em->flush();
        $msg= "Tabela Fipe adicionada com sucesso!";
    }

    $data['titulo'] = 'Adicionar dados da tabela Fipe';
    $data['form'] = $form;
    $data['msg'] = $msg;

    return $this->render('fipe/form.html.twig', $data);
}

#[Route('/fipe/editar/{id}', name:'fipe_editar')]
#[IsGranted('ROLE_ADMIN')]
public function editar($id ,Request $request, EntityManagerInterface $em, FipeRepository $fipeRepository) : Response{
    $msg = '';
    $fipe = $fipeRepository->find($id);
    $form = $this->createForm(FipeType::class, $fipe);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $em->flush();
        $msg= "Tabela Fipe atualizada com sucesso!";
    }

    $data['titulo'] = 'editar dados da tabela Fipe';
    $data['form'] = $form;
    $data['msg'] = $msg;

    return $this->render('fipe/form.html.twig', $data);
}

#[Route('/fipe/excluir/{id}', name:'fipe_excluir')]
#[IsGranted('ROLE_ADMIN')]
public function excluir($id ,Request $request, EntityManagerInterface $em, FipeRepository $fipeRepository) : Response{
    $fipe = $fipeRepository->find($id);
    
    $em->remove($fipe);
    $em->flush();
    
    return $this->redirectToRoute('fipe');
    
}


}

?>