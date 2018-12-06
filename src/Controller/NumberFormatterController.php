<?php

namespace App\Controller;

use App\Services\MoneyFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NumberFormatterController extends AbstractController
{
    private $number;
    private $moneyFormattedNumberEur;
    private $moneyFormattedNumberUsd;
    /**
     * @Route("/number/formatter", name="number_formatter")
     */
    public function index(Request $request, MoneyFormatter $moneyFormatter)
    {
        if ($request->getMethod() === 'POST') {
            $this->number = $request->request->get('number');
            $this->moneyFormattedNumberEur = $moneyFormatter->formatEur($this->number);
            $this->moneyFormattedNumberUsd = $moneyFormatter->formatUsd($this->number);
        }

        return $this->render('number_formatter/index.html.twig', [
            'number' => $this->number,
            'moneyFormattedNumberEur' => $this->moneyFormattedNumberEur,
            'moneyFormattedNumberUsd' => $this->moneyFormattedNumberUsd,

        ]);
    }
}
