<?php
namespace Mageplaza\GiftCard\Setup;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;
        $installer->startSetup();
        if(version_compare($context->getVersion(), '2.0.0', '<')) {
            if (!$installer->tableExists('giftcard_history')) {
                $table = $installer->getConnection()->newTable
                (
                    $installer->getTable('giftcard_history')
                )->addColumn(
                    'history_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['primary' => true, 'identity' => true, 'nullable' => false]
                )->addColumn(
                    'giftcard_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false]
                )->addColumn(
                    'customer_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'unsigned' => true
                    ]
                )->addColumn(
                    'amount',
                    Table::TYPE_DECIMAL,
                    '12,4',
                    ['default' => 0.00]
                )->addColumn(
                    'action',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false]
                )->addColumn(
                    'action_time',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE]
                )->addForeignKey(
                    $installer->getFkName('giftcard_history', 'giftcard_id', 'giftcard_code', 'giftcard_id'),
                    'giftcard_id',
                    $installer->getTable('giftcard_code'),
                    'giftcard_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )->addForeignKey(
                    $installer->getFkName('giftcard_history', 'customer_id', 'customer_entity', 'entity_id'),
                    'customer_id',
                    $installer->getTable('customer_entity'),
                    'entity_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                );
                $installer->getConnection()->createTable($table);
            }
            if ($installer->tableExists('customer_entity')) {
                $installer->getConnection()->addColumn(
                    $installer->getTable('customer_entity'),
                    'giftcard_balance',
                    [
                        'type' => Table::TYPE_DECIMAL,
                        'nullable' => false,
                        'length' => '12,4',
                        'comment' => 'giftcard_balance',
                        'default' => 0.00
                    ]
                );
            }
        }
        $installer->endSetup();
    }
}