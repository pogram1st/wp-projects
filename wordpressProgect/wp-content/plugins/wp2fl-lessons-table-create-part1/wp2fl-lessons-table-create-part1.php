<?php
/*
Plugin Name: WP2FL. Lessons "Tabele Create" Part 1
Plugin URI: plugin url
Description: Урок. Создание таблицы. Часть 1
Version: 2.0
Author: Pavel
Author URI: author site url
License: GPL2
*/

defined('ABSPATH') or die('No script kiddies please!');

/**
 * Подключаем базовый класс
 */
if (class_exists('WP_List_Table') == FALSE) {
	require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
 * Отображаем таблицу лишь в том случае, если пользователь администратор
 */
if (is_admin() == TRUE) {
	new WP2FL_INIT_Lessons_Menu_Table_Create();
}

/**
 * Класс формирующий пункт меню и отображающий таблицу
 */
class WP2FL_INIT_Lessons_Menu_Table_Create
{
	/**
	 * Конструктор
	 */
	public function __construct()
	{
		add_action('admin_menu', array($this, 'createMenu'));
	}

	/**
	 * Создает пункт меню
	 */
	public function createMenu()
	{
		add_menu_page('Пользователи', 'Пользователи', 'manage_options', 'wp2fl_init_lessons_menu_table_create', array($this, 'createTable'), '', 6);
	}

	/**
	 * Отображает таблицу
	 *
	 */
	public function createTable()
	{
		$Table = new WP2FL_Lessons_Menu_Table_Create();
		$Table->prepare_items();

?>
<div class="wrap">
    <h2>Example List Table</h2>
    <?php $Table->display(); ?>
</div>
<?php
	}
}

/**
 * Класс создающий таблицу
 */
class WP2FL_Lessons_Menu_Table_Create extends WP_List_Table
{
	/**
	 * Подготавливаем колонки таблицы для их отображения
	 *
	 */
	public function prepare_items()
	{
		//Sets
		$per_page = 5;

		/* Получаем данные для формирования таблицы */
		$data = $this->table_data();

		/* Устанавливаем данные для пагинации */
		$this->set_pagination_args(
			array(
				'total_items' => count($data),
				'per_page' => $per_page
			)
		);

		/* Делим массив на части для пагинации */
		$data = array_slice(
			$data,
			(($this->get_pagenum() - 1) * $per_page),
			$per_page
		);

		/* Устанавливаем данные колонок */
		$this->_column_headers = array(
			$this->get_columns(), /* Получаем массив названий колокнок */
			$this->get_hidden_columns(), /* Получаем массив названий колонок которые нужно скрыть */
			$this->get_sortable_columns() /* Получаем массив названий колонок которые можно сортировать */
		);

		/* Устанавливаем данные таблицы */
		$this->items = $data;
	}

	/**
	 * Название колонок таблицы
	 *
	 * @return array
	 */
	public function get_columns()
	{
		return array(
			'ex_id' => 'ID',
			'ex_lastname' => 'LastName',
			'ex_firstname' => 'FirstName',
			'ex_middlename' => 'MiddleName',
			'ex_email' => 'Email',
			'ex_phone' => 'Phone',
			'ex_date' => 'date',
		);
	}

	/**
	 * Массив колонок которые нужно скрыть
	 *
	 * @return array
	 */
	public function get_hidden_columns()
	{
		return array();
	}

	/**
	 * Массив названий колонок по которым выполняется сортировка
	 *
	 * @return array
	 */
	public function get_sortable_columns()
	{
		return array(
			'ex_id' => array('ex_id', false),
			'ex_lastname' => array('ex_lastname', true),
			'ex_firstname' => array('ex_firstname', true),
			'ex_middlename' => array('ex_middlename', true),
			'ex_email' => array('ex_email', false),
			'ex_phone' => array('ex_phone', false),
			'ex_date' => array('ex_date', true),
		);
	}

	/**
	 * Данные таблицы
	 *
	 * @return array
	 */
	private function table_data()
	{
		global $wpdb;
		$querys = $wpdb->get_results("SELECT * FROM user");
		$arr = array();
		foreach ($querys as $query) {
			array_push(
				$arr,
				array(
					'ex_id' => $query->id,
					'ex_lastname' => $query->LastName,
					'ex_firstname' => $query->FirstName,
					'ex_middlename' => $query->MiddleName,
					'ex_email' => $query->Email,
					'ex_phone' => $query->Phone,
					'ex_date' => $query->date,
				)
			);
		}
		return $arr;
	}

	/**
	 * Возвращает содержимое колонки
	 *
	 * @param  array $item массив данных таблицы
	 * @param  string $column_name название текущей колонки
	 *
	 * @return mixed
	 */
	public function column_default($item, $column_name)
	{
		switch ($column_name) {
			case 'ex_id':
			case 'ex_lastname':
			case 'ex_firstname':
			case 'ex_middlename':
			case 'ex_email':
			case 'ex_phone':
			case 'ex_date':
				return $item[$column_name];
			default:
				return print_r($item, true);
		}
	}
}