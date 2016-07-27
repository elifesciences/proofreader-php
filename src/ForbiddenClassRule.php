<?php

namespace eLife\Proofreader;

class ForbiddenClassRule
    extends \PHPMD\AbstractRule
    implements \PHPMD\Rule\MethodAware,
    \PHPMD\Rule\FunctionAware
{
    public function apply(\PHPMD\AbstractNode $node)
    {
        $forbidden = $this->getStringProperty('forbidden');
        $suggested = $this->getStringProperty('suggested');
        foreach ($node->findChildrenOfType('ClassOrInterfaceReference') as $each) {
            if ($each->getName() == $forbidden
                || $each->getName() == '\\'.$forbidden) {
                $this->addViolation($each, [$forbidden, $suggested]);
            }
        }
    }
}
