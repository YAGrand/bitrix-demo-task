<?
	namespace My\Agent;
	
	use \Bitrix\Main\SystemException;
	use \Bitrix\Tasks\Internals\TaskTable;
	use \Bitrix\Main\Type\DateTime;
	
	class Tasks {
		
        /**
         * Проверяет время с момента получения статуса MY_TASKS_STATUS_ASSESSMENT, если больше MY_TASKS_STATUS_ASSESSMENT_AUTOCHANGE_DAYS завершает задачу
         * 
         * 
         * @return string
         */
		public static function CheckAssessment(){
			$dbTasks = TaskTable::getList(['filter'=>['<STATUS_CHANGED_DATE'=>DateTime::createFromTimestamp(strtotime('-' . MY_TASKS_STATUS_ASSESSMENT_AUTOCHANGE_DAYS . ' days')), 'STATUS'=>MY_TASKS_STATUS_ASSESSMENT]]);
			while($arT = $dbTasks->fetch()){
				$TaskItem = new \CTaskItem($arT['ID'], $arT['CREATED_BY']);
				$TaskItem->complete();
			}
			
			return "\\My\\Agent\\Tasks::CheckAssessment();";
		}
	}