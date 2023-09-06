<?php

namespace App\Tests\Functional;

use App\Enum\CalculatorOperationEnumType;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseFunctionalTest extends WebTestCase
{
    protected KernelBrowser $client;

    protected float $firstArgument;
    protected float $secondArgument;

    abstract protected static function getOperation(): CalculatorOperationEnumType;

    protected function setUp(): void
    {
        $this->client = self::createClient();
    }

    protected function buildForm(): Form
    {
        $this->client->request(Request::METHOD_GET, '/');

        $this->assertResponseIsSuccessful();

        $crawler = $this->client->getCrawler();
        $formCrawler = $crawler->filter('form[name="calculator_form"]');

        $form = $formCrawler->form();

        $calculatorForm = $form->get('calculator_form');

        $this->generateFirstArgument();
        $this->generateSecondArgument();

        $calculatorForm['firstArgument']->setValue($this->firstArgument);
        $calculatorForm['secondArgument']->setValue($this->secondArgument);
        $calculatorForm['operation']->setValue(static::getOperation()->value);

        return $form;
    }

    protected function generateFirstArgument(): void
    {
        $this->firstArgument = $this->getRandomNum();
    }

    protected function generateSecondArgument(): void
    {
        $this->secondArgument = $this->getRandomNum();
    }

    private function getRandomNum(): float
    {
        $rand = rand(1, 999);
        $division = rand(0, 1) ? 10 : 1;

        return $rand/ $division;
    }
}