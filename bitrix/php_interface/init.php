<?
	use \Bitrix\Main\Loader;
	use \Bitrix\Main\EventManager;
	use \Bitrix\Main\Localization\Loc;

	Loc::loadMessages(__FILE__);
	
	define('MY_TASKS_STATUS_ASSESSMENT', 8);
	define('MY_TASKS_STATUS_ASSESSMENT_AUTOCHANGE_DAYS', 3);
	
	Loader::registerAutoLoadClasses(null, [
		'\\My\\Agent\\Tasks' => '/bitrix/php_interface/my/agent/tasks.php',
		'\\My\\Event\\Tasks' => '/bitrix/php_interface/my/event/tasks.php',
	]);
	
	EventManager::getInstance()->addEventHandlerCompatible('tasks', 'OnBeforeTaskUpdate', ['\\My\\Event\\Tasks', 'OnBeforeTaskUpdate'], false, 0);