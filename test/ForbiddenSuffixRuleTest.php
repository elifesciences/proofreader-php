<?php
namespace eLife\Proofreader;

class ForbiddenSuffixRuleTest extends RuleTestCase
{
    /**
     * @test
     */
    public function it_forbids_the_usage_of_a_suffix_for_class_and_interfaces()
    {
        $report = $this->runPhpmdOn('suffix');
        $this->assertEquals(1, count($report->file->violation), var_export($report->file->violation, true));
    }
}
