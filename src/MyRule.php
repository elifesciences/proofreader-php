<?php

namespace eLife;

//require_once 'PHPMD/AbstractRule.php';

/*
class MyRule extends \PHPMD\AbstractRule
    implements \PHPMD\Rule\ClassAware
{
    public function apply(\PHPMD\AbstractNode $node)
    {
        var_dump($node->getName());
        if (preg_match('/Factory$/', $node->getName())) {
            $this->addViolation($node, [$node->getName()]);
        }
        // Check constraints against the given node instance
    }
}
 */

class MyRule extends \PHPMD\AbstractRule implements \PHPMD\Rule\MethodAware, \PHPMD\Rule\FunctionAware
{
    public function apply(\PHPMD\AbstractNode $node)
    {
        foreach ($node->findChildrenOfType('ClassOrInterfaceReference') as $each) {
            var_dump(get_class($each->getNode()));
            var_dump($each->getName());
            var_dump($each->getType());
            //var_dump(get_class($each->getParent()->getNode()));
            //var_dump($each->getParent()->getParent()->getName());
            //var_dump($each->getParent()->getParent()->getType());
            /*
            var_dump($each->getParent()->getParent()->getParent()->getNode());
            var_dump($each->getParent()->getParent()->getParent()->getType());
             */
            echo '---', PHP_EOL;
        }
        echo '----------', PHP_EOL;
        /*
        foreach ($node->findChildrenOfType('ClassReference') as $each) {
            var_dump(get_class($each));
            var_dump($each->getName());
            var_dump($each->getType());
            echo "---", PHP_EOL;
        }
         */
        // Check constraints against the given node instance
    }
}
