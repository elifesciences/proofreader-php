<?php

namespace eLife\Proofreader;

class ForbiddenPrefixRule
    extends \PHPMD\AbstractRule
    implements \PHPMD\Rule\ClassAware,
    \PHPMD\Rule\InterfaceAware
{
    public function apply(\PHPMD\AbstractNode $node)
    {
        $forbidden = $this->getStringProperty('forbidden');
        $fullName = $node->getName();
        if (preg_match("/^{$forbidden}.*/", $fullName)) {
            $this->addViolation($node, [$forbidden]);
        }
    }
}
