<?php
namespace Mageplaza\GiftCard\Setup;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer -> startSetup();
        if(!$installer->tableExists('giftcard_code'))
        {
            $table = $installer->getConnection()->newTable
            (
                $installer->getTable('giftcard_code')
            )->addColumn(
                'giftcard_id',
                Table::TYPE_INTEGER,
                null,
                ['primary'=>true, 'identity'=>true, 'nullable'=>false]
            )->addColumn(
                'code',
                Table::TYPE_TEXT,
                255,
                ['nullable'=>false]
            )->addColumn(
                'balance',
                Table::TYPE_DECIMAL,
                '12,4',
                ['default'=>0.00]
            )->addColumn(
                'amount_used',
                Table::TYPE_DECIMAL,
                '12,4',
                ['default'=>0.00]
            )->addColumn(
                'create_from',
                Table::TYPE_TEXT,
                255,
                ['default'=>'Admin']
            )->addColumn(
                'create_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable'=>false, 'default'=>Table::TIMESTAMP_INIT]
            );
            $installer->getConnection()->createTable($table);
        }
        $installer -> endSetup();
    }
}