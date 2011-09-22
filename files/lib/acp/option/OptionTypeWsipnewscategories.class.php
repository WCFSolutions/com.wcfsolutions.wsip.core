<?php
// wsip imports
require_once(WSIP_DIR.'lib/data/category/Category.class.php');

// wcf imports
require_once(WCF_DIR.'lib/acp/option/OptionType.class.php');

/**
 * OptionTypeSelect is an implementation of OptionType for a news category select.
 * 
 * @author	Sebastian Oettl
 * @copyright	2009-2011 WCF Solutions <http://www.wcfsolutions.com/>
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.wcfsolutions.wsip.core
 * @subpackage	acp.option
 * @category	Community Framework
 */
class OptionTypeWsipnewscategories implements OptionType {
	protected $publicationType = 'news';
	
	/**
	 * @see OptionType::getFormElement()
	 */
	public function getFormElement(&$optionData) {
		if (!isset($optionData['optionValue'])) {
			if (isset($optionData['defaultValue'])) $optionData['optionValue'] = explode(",", $optionData['defaultValue']);
			else $optionData['optionValue'] = array();
		}
		else if (!is_array($optionData['optionValue'])) {
			$optionData['optionValue'] = explode(",", $optionData['optionValue']);
		}
		
		WCF::getTPL()->assign(array(
			'optionData' => $optionData,
			'options' => Category::getCategorySelect($this->publicationType, array())
		));
		return WCF::getTPL()->fetch('optionTypeMultiselect');
	}
	
	/**
	 * @see OptionType::validate()
	 */
	public function validate($optionData, $newValue) {
		if (!is_array($newValue)) $newValue = array();
		$options = Category::getCategorySelect($this->publicationType, array());
		foreach ($newValue as $value) {
			if (!isset($options[$value])) throw new UserInputException($optionData['optionName'], 'validationFailed');
		}
	}
	
	/**
	 * @see OptionType::getData()
	 */
	public function getData($optionData, $newValue) {
		if (!is_array($newValue)) $newValue = array();
		return implode(',', $newValue);
	}
}
?>