<?php
declare(strict_types=1);

namespace Elogic\MagentoFramework\ObjectManager\Code\Generator;

use Magento\Framework\Code\Generator\EntityAbstract;
use Magento\Framework\ObjectManagerInterface;

class Magic extends EntityAbstract
{
    const ENTITY_TYPE = 'magic';

    /**
     * @inheritDoc
     */
    protected function _getDefaultResultClassName($modelClassName)
    {
        return $modelClassName . '_' . ucfirst(static::ENTITY_TYPE);
    }

    /**
     * @inheritDoc
     */
    protected function _getClassMethods()
    {
        $construct = $this->_getDefaultConstructorDefinition();

        return [$construct];
    }

    protected function _getClassProperties()
    {
        $properties = parent::_getClassProperties();

        $properties[] = [
            'name' => 'magicProperty',
            'visibility' => 'public',
            'defaultValue' => 'MAGIYA',
            'const' => 'da',
            'docblock' => [
                'shortDescription' => 'Magiya proishodit zdes',
                'tags' => [['name' => 'var', 'description' => 'string']],
            ],
        ];
        return $properties;
    }

    protected function _getDefaultConstructorDefinition()
    {
        return [
            'name' => '__construct',
            'parameters' => [
                ['name' => 'objectManager', 'type' => '\\' . ObjectManagerInterface::class],
                ['name' => 'instanceName', 'defaultValue' => $this->getSourceClassName()],
            ],
            'body' => "\$this->_objectManager = \$objectManager;\n\$this->_instanceName = \$instanceName;",
            'docblock' => [
                'shortDescription' => ucfirst(static::ENTITY_TYPE) . ' constructor',
                'tags' => [
                    [
                        'name' => 'param',
                        'description' => '\Magento\Framework\ObjectManagerInterface $objectManager',
                    ],
                    ['name' => 'param', 'description' => 'string $instanceName'],
                ],
            ]
        ];
    }
}
