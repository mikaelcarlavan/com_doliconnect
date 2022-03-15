<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * DoliConnect component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class DoliConnectHelper
{
    /**
     * Call cURL
     */
    public static function _curl($endpoint = '', $method = 'GET', $data = "")
    {
        $app = JFactory::getApplication();
        $input = $app->input;

        $componentName = $input->get('option');
        $params = JComponentHelper::getParams($componentName);

        $url = $params->get('url', ''); // TODO put in parameters
        $key = $params->get('key', '');

        $url = rtrim($url, '/');
        $url = $url . '/' . $endpoint;

        $headers = array(
            "Accept: application/json",
            "DOLAPIKEY: $key"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Joomla/" . JVERSION);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if (strtolower($method) != 'get') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        curl_close($ch);

        if ($result === false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }

        return $result;
    }

    /**
     * Call GET method
     */
    public static function get($endpoint = '')
    {
        return self::_curl($endpoint, 'GET');
    }

    /**
     * Call POST method
     */
    public static function post($endpoint = '', $data = array())
    {
        return self::_curl($endpoint, 'POST', json_encode($data));
    }

    /**
     * Call PUT method
     */
    public static function put($endpoint = '', $data = array())
    {
        return self::_curl($endpoint, 'PUT', json_encode($data));
    }

    /**
     * Get member
     * @param $id Id of member
     * @return array
     */
    public static function getMember($id = 0)
    {
        $endpoint = "members/$id";
        $result = self::get($endpoint);
        return json_decode($result);
    }

    /**
     * Update member
     * @param $id int id of member
     * @param $data array data of member
     * @return array
     */
    public static function updateMember($id = 0, $data = array())
    {
        $endpoint = "members/$id";
        $result = self::put($endpoint, $data);
        return json_decode($result);
    }
}
