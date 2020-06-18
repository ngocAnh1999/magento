<?php 
namespace TienIch\TyGia\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('tygia_ngoaite');
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)
                            ->addColumn(
                                'id',
                                Table::TYPE_INTEGER,
                                null,
                                [
                                    'identity'=>true,'
                                    unsigned'=>true,
                                    'nullable'=>false,
                                    'primary'=>true
                                ]
                                )
                            ->addColumn(
                                'eur',
                                Table::TYPE_DECIMAL,'10,4',
                                
                                [
                                    'nullable' => true
                                
                                ]
                                )
                                ->addColumn(
                                    'aud',
                                    Table::TYPE_DECIMAL,'10,4',
                                    
                                    [
                                        'nullable' => true
                                       
                                    ]
                                )
                                ->addColumn(
                                    'chf',
                                    Table::TYPE_DECIMAL,'10,4',
                                    [
                                        'nullable' => true
                                      
                                    ]
                                )
                                ->addColumn(
                                    'cny',
                                    Table::TYPE_DECIMAL,'10,4',
                                    [
                                        'nullable' => true
                                   
                                    ]
                                )
                                   ->addColumn(
                                    'gbp',
                                    Table::TYPE_DECIMAL,'10,4',
                                    [
                                        'nullable' => true
                                      
                                    ]
                                )
                                      ->addColumn(
                                    'rub',
                                    Table::TYPE_DECIMAL,'10,4',
                                    [
                                        'nullable' => true
                                    
                                    ]
                                )
                                    ->addColumn(
                                    'jpy',
                                   Table::TYPE_DECIMAL,'10,4',
                                    [
                                        'nullable' => true
                                   
                                    ]
                                )
                                    ->addColumn(
                                    'cad',
                                   Table::TYPE_DECIMAL,'10,4',
                                    [
                                        'nullable' => true
                                     
                                    ]
                                )
                               ->addColumn(
                                    'vnd',
                                   Table::TYPE_DECIMAL,'10,4',
                                    [
                                        'nullable' => true
                                    
                                    ]
                                )
                                ->addColumn(
                                    'created_at',
                                    Table::TYPE_TIMESTAMP,
                                    null,
                                    [
                                        'nullable' => false,
                                        'default' => Table::TIMESTAMP_INIT
                                    ]
                                )
                            ->setOption('charset','utf8');
            $conn->createTable($table);
        }
        $setup->endSetup();
    }
}
 ?>