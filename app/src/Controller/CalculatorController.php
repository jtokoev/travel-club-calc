<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\CalculatorFormType;
use App\Model\CalculatorDto;
use App\Service\CalculatorInterface;
use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route(path: '/', name: 'calculator_process')]
    public function calcProcess(Request $request, CalculatorInterface $calculator): Response
    {
        $form = $this->createForm(CalculatorFormType::class);

        $form->handleRequest($request);

        $viewParameters = ['form' => $form];

        if ($form->isSubmitted() && $form->isValid()) {
            $calculatorDto = $form->getData();

            if (!$calculatorDto instanceof CalculatorDto) {
                throw new InvalidArgumentException();
            }

            $calculateResult = round($calculator->calculate($calculatorDto), 3);

            $result = sprintf('%s %s %s = %s', $calculatorDto->firstArgument, $calculatorDto->operation->value, $calculatorDto->secondArgument, $calculateResult);

            $viewParameters += ['result' => $result];
        }

        return $this->render('calculator/process.html.twig', $viewParameters);
    }
}
