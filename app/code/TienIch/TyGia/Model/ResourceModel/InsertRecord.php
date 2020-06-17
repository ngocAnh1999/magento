<?php 
namespace TienIch\TyGia\Model\ResourceModel;
class InsertRecord extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
 public function _construct(){
 $this->_init("tygia_ngoaite","id");
 }
}
 ?>