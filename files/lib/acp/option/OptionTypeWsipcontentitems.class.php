<?php
// wsip imports
require_once(WSIP_DIR.'lib/data/content/ContentItem.class.php');

// wcf imports
require_once(WCF_DIR.'lib/acp/option/OptionType.class.php');

/**
 * OptionTypeSelect is an implementation of OptionType for a content item select.
 * 
 * @author	Sebastian Oettl
 * @copyright	2009-2011 WCF Solutions <http://www.wcfsolutions.com/>
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.wcfsolutions.wsip.core
 * @subpackage	acp.option
 * @category	Community Framework
 */
class OptionTypeWsipcontentitems implements OptionType {
	/**
	 * @see OptionType::getFormElement()
	 */
	public function getFormElement(&$optionData) {
		if (!isset($optionData['optionValue'])) {
			if (isset($optionData['defaultValue'])) $optionData['optionValue'] = $optionData['defaultValue'];
			else $optionData['optionValue'] = 0;
		}
		
		// get options
		$options = array(0 => '') + ContentItem::getContentItemSelect(array());
		
		WCF::getTPL()->assign(array(
			'optionData' => $optionData,
			'options' => $options
		));
		return WCF::getTPL()->fetch('optionTypeSelect');
	}
	
	/**
	 * @see OptionType::validate()
	 */
	public function validate($optionData, $newValue) {
		if ($newValue) {
			try {
				ContentItem::getContentItem(intval($newValue));
			}
			catch (IllegalLinkException $e) {
				throw new UserInputException($optionData['optionName'], 'validationFailed');
			}
		}
	}
	
	/**
	 * @see OptionType::getData()
	 */
	public function getData($optionData, $newValue) {
		return intval($newValue);
	}
}
?>