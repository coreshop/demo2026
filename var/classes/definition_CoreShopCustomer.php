<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - salutation [input]
 * - firstname [firstname]
 * - lastname [lastname]
 * - company [coreShopRelation]
 * - email [email]
 * - newsletterActive [newsletterActive]
 * - newsletterConfirmed [newsletterConfirmed]
 * - newsletterToken [input]
 * - gender [gender]
 * - localeCode [input]
 * - user [coreShopRelation]
 * - addressAccessType [select]
 * - addresses [coreShopRelations]
 * - defaultAddress [coreShopRelation]
 * - customerGroups [coreShopRelations]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'cs_customer',
   'name' => 'CoreShopCustomer',
   'title' => '',
   'description' => '',
   'creationDate' => NULL,
   'modificationDate' => 1688643687,
   'userOwner' => 0,
   'userModification' => 0,
   'parentClass' => 'CoreShop\\Component\\Core\\Model\\Customer',
   'implementsInterfaces' => NULL,
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => false,
   'allowVariants' => false,
   'showVariants' => false,
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'children' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => NULL,
         'width' => 0,
         'height' => 0,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => NULL,
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'name' => 'information',
             'type' => NULL,
             'region' => NULL,
             'title' => 'coreshop.customer.information',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'salutation',
                 'title' => 'coreshop.customer.salutation',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'regex' => '',
                 'regexFlags' => 
                array (
                ),
                 'unique' => false,
                 'showCharCount' => false,
                 'width' => NULL,
                 'defaultValueGenerator' => '',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Firstname::__set_state(array(
                 'name' => 'firstname',
                 'title' => 'coreshop.customer.firstname',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'regex' => '',
                 'regexFlags' => 
                array (
                ),
                 'unique' => false,
                 'showCharCount' => false,
                 'width' => NULL,
                 'defaultValueGenerator' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Lastname::__set_state(array(
                 'name' => 'lastname',
                 'title' => 'coreshop.customer.lastname',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'regex' => '',
                 'regexFlags' => 
                array (
                ),
                 'unique' => false,
                 'showCharCount' => false,
                 'width' => NULL,
                 'defaultValueGenerator' => '',
              )),
              3 => 
              CoreShop\Bundle\ResourceBundle\CoreExtension\CoreShopRelation::__set_state(array(
                 'name' => 'company',
                 'title' => 'coreshop.customer.company',
                 'tooltip' => NULL,
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'CoreShopCompany',
                  ),
                ),
                 'displayMode' => NULL,
                 'pathFormatterClass' => '',
                 'assetInlineDownloadAllowed' => false,
                 'allowToClearRelation' => true,
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'width' => '',
                 'stack' => 'coreshop.company',
                 'returnConcrete' => false,
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Email::__set_state(array(
                 'name' => 'email',
                 'title' => 'coreshop.customer.email',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'regex' => '',
                 'regexFlags' => 
                array (
                ),
                 'unique' => false,
                 'showCharCount' => false,
                 'width' => NULL,
                 'defaultValueGenerator' => '',
              )),
              5 => 
              Pimcore\Bundle\NewsletterBundle\Model\DataObject\ClassDefinition\Data\NewsletterActive::__set_state(array(
                 'name' => 'newsletterActive',
                 'title' => 'coreshop.customer.newsletter_active',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'defaultValueGenerator' => '',
              )),
              6 => 
              Pimcore\Bundle\NewsletterBundle\Model\DataObject\ClassDefinition\Data\NewsletterConfirmed::__set_state(array(
                 'name' => 'newsletterConfirmed',
                 'title' => 'coreshop.customer.newsletter_confirmed',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => NULL,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => 0,
                 'defaultValueGenerator' => '',
              )),
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'newsletterToken',
                 'title' => 'Newsletter Token',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => true,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'regex' => '',
                 'regexFlags' => 
                array (
                ),
                 'unique' => false,
                 'showCharCount' => false,
                 'width' => NULL,
                 'defaultValueGenerator' => '',
              )),
              8 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Gender::__set_state(array(
                 'name' => 'gender',
                 'title' => 'coreshop.customer.gender',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'options' => NULL,
                 'defaultValue' => NULL,
                 'optionsProviderClass' => NULL,
                 'optionsProviderData' => NULL,
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
              )),
              9 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'localeCode',
                 'title' => 'coreshop.customer.locale',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'regex' => '',
                 'regexFlags' => 
                array (
                ),
                 'unique' => false,
                 'showCharCount' => false,
                 'width' => NULL,
                 'defaultValueGenerator' => '',
              )),
              10 => 
              CoreShop\Bundle\ResourceBundle\CoreExtension\CoreShopRelation::__set_state(array(
                 'name' => 'user',
                 'title' => 'coreshop.customer.user',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'CoreShopUser',
                  ),
                ),
                 'displayMode' => NULL,
                 'pathFormatterClass' => '',
                 'assetInlineDownloadAllowed' => false,
                 'allowToClearRelation' => true,
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'width' => NULL,
                 'stack' => 'coreshop.user',
                 'returnConcrete' => false,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'addresses',
             'type' => NULL,
             'region' => NULL,
             'title' => 'coreshop.customer.addresses',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'addressAccessType',
                 'title' => 'coreshop.customer.address_access_type',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'options' => NULL,
                 'defaultValue' => '',
                 'optionsProviderClass' => '@CoreShop\\Component\\Core\\Customer\\Address\\AddressAccessOptionsProvider',
                 'optionsProviderData' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
              )),
              1 => 
              CoreShop\Bundle\ResourceBundle\CoreExtension\CoreShopRelations::__set_state(array(
                 'name' => 'addresses',
                 'title' => 'coreshop.customer.addresses',
                 'tooltip' => NULL,
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'displayMode' => NULL,
                 'pathFormatterClass' => '',
                 'maxItems' => NULL,
                 'assetInlineDownloadAllowed' => false,
                 'allowToClearRelation' => true,
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'enableTextSelection' => false,
                 'width' => '',
                 'height' => 400,
                 'stack' => 'coreshop.address',
              )),
              2 => 
              CoreShop\Bundle\ResourceBundle\CoreExtension\CoreShopRelation::__set_state(array(
                 'name' => 'defaultAddress',
                 'title' => 'coreshop.customer.default_address',
                 'tooltip' => NULL,
                 'mandatory' => false,
                 'noteditable' => true,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'CoreShopAddress',
                  ),
                ),
                 'displayMode' => NULL,
                 'pathFormatterClass' => '',
                 'assetInlineDownloadAllowed' => false,
                 'allowToClearRelation' => true,
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'width' => '',
                 'stack' => 'coreshop.address',
                 'returnConcrete' => false,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => NULL,
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'groups',
             'type' => NULL,
             'region' => NULL,
             'title' => 'coreshop.customer.groups',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              CoreShop\Bundle\ResourceBundle\CoreExtension\CoreShopRelations::__set_state(array(
                 'name' => 'customerGroups',
                 'title' => 'coreshop.customer.groups',
                 'tooltip' => NULL,
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => 0,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'displayMode' => NULL,
                 'pathFormatterClass' => '',
                 'maxItems' => NULL,
                 'assetInlineDownloadAllowed' => false,
                 'allowToClearRelation' => true,
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'enableTextSelection' => false,
                 'width' => '',
                 'height' => 400,
                 'stack' => 'coreshop.customer_group',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => NULL,
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'tabpanel',
         'border' => false,
         'tabPosition' => 'top',
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'icon' => NULL,
   'group' => 'CoreShop',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => NULL,
   'previewGeneratorReference' => NULL,
   'compositeIndices' => 
  array (
  ),
   'showFieldLookup' => false,
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'deletedDataComponents' => 
  array (
  ),
   'blockedVarsForExport' => 
  array (
  ),
   'fieldDefinitionsCache' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
