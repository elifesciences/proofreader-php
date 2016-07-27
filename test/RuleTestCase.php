<?php

namespace eLife\Proofreader;

use PHPMD\PHPMD;
use PHPMD\Renderer\XMLRenderer;
use PHPMD\RuleSetFactory;
use PHPMD\Writer\StreamWriter;
use SimpleXMLElement;

abstract class RuleTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $sample name, without extension, of one of the files in test/samples/
     *
     * @return SimpleXMLElement the captured PHPMD report
     */
    protected function runPhpmdOn($sample)
    {
        $ruleSetFactory = new RuleSetFactory();
        $renderer = new XMLRenderer();
        $stream = fopen('php://temp', 'w+');
        $renderer->setWriter(new StreamWriter($stream));
        $renderers = array($renderer);
        $phpmd = new PHPMD();

        $file = __DIR__."/samples/{$sample}.php";
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
