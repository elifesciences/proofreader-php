<?php
namespace eLife\Proofreader;

class ForbiddenPrefixRuleTest extends RuleTestCase
{
    /**
     * @test
     */
    public function it_forbids_the_usage_of_a_prefix_for_class_and_interfaces()
    {
        $report = $this->runPhpmdOn('prefix');
        $this->assertEquals(1, count($report->file->violation), var_export($report->file->violation, true));
    }
}
