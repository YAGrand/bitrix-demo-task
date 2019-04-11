<?
	namespace My\Event;
	
	use \Bitrix\Main\SystemException;
	
	class Tasks {
		
        /**
         * Смена статуса на "На оценке", вместо "Завершена"
         * 
         * @param integer $ID 
         * @param array $arFields 
         * @param array $arCopy 
         * 
         * @return boolean
         */
		public static function OnBeforeTaskUpdate($ID, &$arFields, $arCopy){
			if(	isset($arFields['STATUS'])
				&& $arFields['STATUS'] != $arCopy['STATUS'] 
				&& in_array($arFields['STATUS'], array(\CTasks::STATE_COMPLETED))
				&& $arCopy['STATUS'] != MY_TASKS_STATUS_ASSESSMENT){
				$arFields['STATUS'] = MY_TASKS_STATUS_ASSESSMENT;
			}
			
			return true;
		}
	}