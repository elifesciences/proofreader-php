<?php

namespace eLife\Proofreader;

class ForbiddenClassRuleTest extends RuleTestCase
{
    /**
     * @test
     */
    public function it_forbids_the_usage_of_a_deprecated_class()
    {
        $report = $this->runPhpmdOn('date_time_usage');
        $this->assertEquals(4, count($report->file->violation), var_export($report->file->violation, true));
    }
}
