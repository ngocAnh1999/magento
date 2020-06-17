<?php 
namespace TienIch\TyGia\Model\ResourceModel\InsertRecord;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	public function _construct(){
		$this->_init("TienIch\TyGia\Model\InsertRecord","TienIch\TyGia\Model\ResourceModel\InsertRecord");
	}
}
 ?>