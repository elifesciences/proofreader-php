<?php
namespace PHPMD\TextUI;

use PHPMD\PHPMD;
use PHPMD\RuleSetFactory;
use PHPMD\Writer\StreamWriter;
use PHPMD\Renderer\XMLRenderer;
use SimpleXMLElement;

class ForbiddenClassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_forbids_the_usage_of_a_deprecated_class()
    {
        $report = $this->runPhpmdOn('date_time_usage');
        $this->assertEquals(4, count($report->file->violation), var_export($report->file->violation, true));
    }

    /**
     * @param string $sample  name, without extension, of one of the files in test/samples/
     * @return SimpleXMLElement  the captured PHPMD report
     */
    private function runPhpmdOn($sample)
    {
        $ruleSetFactory = new RuleSetFactory();
        $command = new Command();
        $renderer = new XMLRenderer();
        $stream = fopen('php://temp', 'w+');
        $renderer->setWriter(new StreamWriter($stream));
        $renderers = array($renderer);
        $phpmd = new PHPMD();

        $file = __DIR__ . "/samples/{$sample}.php";
        $phpmd->processFiles(
            $file,
            'ruleset.xml.dist',
            $renderers,
            $ruleSetFactory
        );

        $this->assertTrue($phpmd->hasViolations(), "phpmd did not detect violations into $file");
        fseek($stream, 0);
        return new SimpleXMLElement(stream_get_contents($stream));
    }
}
