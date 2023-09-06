<?php

namespace App\Tests\Functional\Calculator\Success\Base;

use App\Tests\Functional\BaseFunctionalTest;

abstract class BaseSuccess extends BaseFunctionalTest
{
    abstract protected function calculate(): int|float;

    public function test(): void
    {
        $form = $this->buildForm();

        $this->client->submit($form);

        $this->assertCalculate();
    }

    private function assertCalculate(): void
    {
        $expected = sprintf('%s %s %s = %s', $this->firstArgument, static::getOperation()->value, $this->secondArgument, $this->calculate());

        $page = $this->client->getCrawler();

        $formCrawler = $page->filter('div[class="alert alert-success"]');

        $this->assertSame($expected, $formCrawler->text());
    }
}