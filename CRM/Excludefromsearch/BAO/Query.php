<?php

/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.4                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2013                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*/

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2013
 * $Id$
 *
 */
class CRM_Excludefromsearch_BAO_Query extends CRM_Contact_BAO_Query_Interface {


  /**
   * static field for all the export/import attentively fields
   *
   * @var array
   * @static
   */
  static $_networkFields = array();


  public function &getFields() {
    return self::$_networkFields;
  }

  /**
   * build select for Attentively
   *
   * @return void
   * @access public
   */
  public function select(&$query) { }

  public function where(&$query) {
    $grouping = 0;
    $statement = "NOT (contact_a.first_name <=> 'Carlos')";
    $query->_where[$grouping][] = $statement;
  }

  public function from($name, $mode, $side) {
    $from = NULL;
    return $from;
  }

  public function setTableDependency(&$tables) {
  }

  public function getPanesMapper(&$panes) {
    
  }

  public function registerAdvancedSearchPane(&$panes) {
    $panes['Social Media'] = 'social';
  }

  public function buildAdvancedSearchPaneForm(&$form, $type) {
    if ($type  == 'social') {
      $form->add('hidden', 'hidden_social', 1);
      self::buildSearchForm($form);
      $form->setDefaults(array('network_toggle' => 2));
    }
  }

  public function setAdvancedSearchPaneTemplatePath(&$paneTemplatePathArray, $type) {
    if ($type  == 'social') {
      $paneTemplatePathArray['social'] = 'CRM/Attentively/Form/Search/Criteria.tpl';
    }
  }

}

