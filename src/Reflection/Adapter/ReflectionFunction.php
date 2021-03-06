<?php

namespace BetterReflection\Reflection\Adapter;

use ReflectionFunction as CoreReflectionFunction;
use BetterReflection\Reflection\ReflectionFunction as BetterReflectionFunction;

class ReflectionFunction extends CoreReflectionFunction
{
    /**
     * @var BetterReflectionFunction
     */
    private $betterReflectionFunction;

    public function __construct(BetterReflectionFunction $betterReflectionFunction)
    {
        $this->betterReflectionFunction = $betterReflectionFunction;
    }

    /**
     * {@inheritDoc}
     */
    public static function export($name, $return = null)
    {
        return BetterReflectionFunction::export(...func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->betterReflectionFunction->__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function inNamespace()
    {
        return $this->betterReflectionFunction->inNamespace();
    }

    /**
     * {@inheritDoc}
     */
    public function isClosure()
    {
        return $this->betterReflectionFunction->isClosure();
    }

    /**
     * {@inheritDoc}
     */
    public function isDeprecated()
    {
        return $this->betterReflectionFunction->isDeprecated();
    }

    /**
     * {@inheritDoc}
     */
    public function isInternal()
    {
        return $this->betterReflectionFunction->isInternal();
    }

    /**
     * {@inheritDoc}
     */
    public function isUserDefined()
    {
        return $this->betterReflectionFunction->isUserDefined();
    }

    /**
     * {@inheritDoc}
     */
    public function getClosureThis()
    {
        throw new Exception\NotImplemented('Not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function getClosureScopeClass()
    {
        throw new Exception\NotImplemented('Not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function getDocComment()
    {
        return $this->betterReflectionFunction->getDocComment();
    }

    /**
     * {@inheritDoc}
     */
    public function getEndLine()
    {
        return $this->betterReflectionFunction->getEndLine();
    }

    /**
     * {@inheritDoc}
     */
    public function getExtension()
    {
        throw new Exception\NotImplemented('Not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function getExtensionName()
    {
        throw new Exception\NotImplemented('Not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function getFileName()
    {
        return $this->betterReflectionFunction->getFileName();
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->betterReflectionFunction->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getNamespaceName()
    {
        return $this->betterReflectionFunction->getNamespaceName();
    }

    /**
     * {@inheritDoc}
     */
    public function getNumberOfParameters()
    {
        return $this->betterReflectionFunction->getNumberOfParameters();
    }

    /**
     * {@inheritDoc}
     */
    public function getNumberOfRequiredParameters()
    {
        return $this->betterReflectionFunction->getNumberOfRequiredParameters();
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters()
    {
        $parameters = $this->betterReflectionFunction->getParameters();

        $wrappedParameters = [];
        foreach ($parameters as $key => $parameter) {
            $wrappedParameters[$key] = new ReflectionParameter($parameter);
        }
        return $wrappedParameters;
    }

    /**
     * {@inheritDoc}
     */
    public function getShortName()
    {
        return $this->betterReflectionFunction->getShortName();
    }

    /**
     * {@inheritDoc}
     */
    public function getStartLine()
    {
        return $this->betterReflectionFunction->getStartLine();
    }

    /**
     * {@inheritDoc}
     */
    public function getStaticVariables()
    {
        throw new Exception\NotImplemented('Not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function returnsReference()
    {
        return $this->betterReflectionFunction->returnsReference();
    }

    /**
     * {@inheritDoc}
     */
    public function isGenerator()
    {
        return $this->betterReflectionFunction->isGenerator();
    }

    /**
     * {@inheritDoc}
     */
    public function isVariadic()
    {
        return $this->betterReflectionFunction->isVariadic();
    }

    /**
     * {@inheritDoc}
     */
    public function isDisabled()
    {
        throw new Exception\NotImplemented('Not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function invoke($args = null)
    {
        throw new Exception\NotImplemented('Not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function invokeArgs(array $args)
    {
        throw new Exception\NotImplemented('Not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function getClosure()
    {
        throw new Exception\NotImplemented('Not implemented');
    }
}
