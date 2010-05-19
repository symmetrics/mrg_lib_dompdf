<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category  Symmetrics
 * @package   Symmetrics_DomPdf
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Eric Reiche <er@symmetrics.de>
 * @copyright 2010 symmetrics gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */

/**
 * Default helper class
 *
 * @category  Symmetrics
 * @package   Symmetrics_DomPdf
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Eric Reiche <er@symmetrics.de>
 * @copyright 2010 symmetrics gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
class Symmetrics_DomPdf_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Get cache directory for pdf fonts
     *
     * @return string cache directory
     */
    public function getFontCacheDir()
    {
        $domPdfFontCacheDir = join(DS, array('lib', 'Symmetrics', 'dompdf', 'fonts'));
        $domPdfFontCacheDir = Mage::getBaseDir('var') . DS . $domPdfFontCacheDir;

        return $domPdfFontCacheDir;
    }
}