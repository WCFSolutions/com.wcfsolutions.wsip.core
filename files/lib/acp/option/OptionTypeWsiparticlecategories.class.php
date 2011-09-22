<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/option/OptionTypeWsipnewscategories.class.php');

/**
 * OptionTypeSelect is an implementation of OptionType for an article category select.
 * 
 * @author	Sebastian Oettl
 * @copyright	2009-2011 WCF Solutions <http://www.wcfsolutions.com/>
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.wcfsolutions.wsip.core
 * @subpackage	acp.option
 * @category	Community Framework
 */
class OptionTypeWsiparticlecategories extends OptionTypeWsipnewscategories {
	protected $publicationType = 'article';
}
?>