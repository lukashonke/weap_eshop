<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 22. 4. 2016
 * Time: 14:09
 */

namespace app\classes\models;

/**
 * Class DbTools
 * staticky metody k usnadneni pristupu k sql dotazum
 */
class DbTools
{
	public static function queryReturnFirstRow($db, $sql)
	{
		$result = $db->query($sql);
		return $result->fetch();
	}

	public static function queryReturnFirstColumn($db, $sql)
	{
		$result = $db->query($sql);
		return $result->fetchColumn();
	}

	/**
	 * @return returns as array of objects
	 */
	public static function queryReturnAll($db, $sql)
	{
		return $db->query($sql);
	}

	public static function query($db, $sql)
	{
		$db->query($sql);
	}
}