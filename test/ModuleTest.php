<?php
namespace MonthlyBasis\WebsiteTest;

use MonthlyBasis\LaminasTest\ModuleTestCase;
use MonthlyBasis\Website\Module;

class ModuleTest extends ModuleTestCase
{
    protected function setUp(): void
    {
        $this->module = new Module();
    }
}
