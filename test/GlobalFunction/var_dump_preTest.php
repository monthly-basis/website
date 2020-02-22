<?php
namespace LeoGalleguillos\WebsiteTest\GlobalFunction;

use PHPUnit\Framework\TestCase;

class var_dump_preTest extends TestCase
{
    public function testVarDumpPre()
    {
        require_once(__DIR__ . '/../../src/GlobalFunction/var_dump_pre.php');

        ob_start();
        var_dump_pre('wow');
        $varDumpPreString = ob_get_contents();
        ob_end_clean();

        $this->assertSame(
            '<pre>string(3) "wow"' . "\n" . '</pre>',
            $varDumpPreString
        );
    }
}
