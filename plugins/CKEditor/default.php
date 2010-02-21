<?php if (!defined('APPLICATION')) exit();

// Define the plugin:
$PluginInfo['CKEditor'] = array(
   'Description' => 'Adds a basic <a href="http://ckeditor.com/" target="_blank">CKEditor</a> to Garden/Vanilla, a WYSIWYG editor.',
   'Version' => '1.0',
   'RequiredApplications' => FALSE,
   'RequiredTheme' => FALSE, 
   'RequiredPlugins' => FALSE,
   'HasLocale' => TRUE,
   'RegisterPermissions' => array('Plugins.CKEditor.Manage'),
   'SettingsUrl' => '/garden/plugin/ckeditor', // Url of the plugin's settings page.
   'SettingsPermission' => 'Plugins.CKEditor.Manage', // Permission to see SettingsUrl link...
   'Author' => "Louis St-Amour",
   'AuthorEmail' => 'louisstamour@gmail.com',
   'AuthorUrl' => 'http://lsta.me'
);

class CKEditorPlugin implements Gdn_IPlugin {
   // Specifying "Base" as the class name allows us to make the method get called for every
   // class that implements a base class's method. For example, Base_Render_After
   // would allow all controllers that call Controller.Render() to have that method
   // be called. It saves you from having to go:
   // Table_Render_After, Row_Render_After, Item_Render_After,
   // SignIn_Render_After, etc. and it essentially *_Render_After
   
   /* Adding JS for CKEditor to all page views */
   public function Base_Render_Before(&$Sender) {
      $Sender->AddJsFile('/plugins/CKEditor/ckeditor/ckeditor.js');
      $Sender->AddJsFile('/plugins/CKEditor/ckeditor/adapters/jquery.js');
      $Sender->AddJsFile('/plugins/CKEditor/start.js');
      $Sender->RemoveJsFile('js/library/jquery.autogrow.js');
      $Sender->RemoveJsFile('/js/library/jquery.autogrow.js');
      $Sender->RemoveJsFile('autosave.js');
   }
   
   /* Adding CKEditor settings link to side menu */
   public function Base_GetAppSettingsMenuItems_Handler(&$Sender) {
      $Menu = $Sender->EventArguments['SideMenu'];
		$Menu->AddLink('Add-ons', 'CKEditor', 'plugin/ckeditor', 'Plugins.CKEditor.Manage');
	}
   
   	/* The CKEditor settings controller method at /garden/plugin/ckeditor */
	public function PluginController_CKEditor_Create($Sender) {
		// Add the side module.
        $Sender->AddSideMenu('/plugin/ckeditor');
		
		$Sender->View = dirname(__FILE__).DS.'views'.DS.'ckeditor.php';
		$Sender->Render();
	}
   
   public function Setup() {
      SaveToConfig('Garden.Html.nl2br', FALSE);
      SaveToConfig('HtmlPurifier.AutoFormat.AutoParagraph', FALSE);
      SaveToConfig('HtmlPurifier.AutoFormat.Linkify', FALSE);
      SaveToConfig('HtmlPurifier.Filter.YouTube', FALSE);
      
      // TODO: Add code to nl2br existing posts.
      
      return TRUE;
   }
   
   public function OnDisable() {
      SaveToConfig('Garden.Html.nl2br', TRUE);
      SaveToConfig('HtmlPurifier.AutoFormat.AutoParagraph', TRUE);
      SaveToConfig('HtmlPurifier.AutoFormat.Linkify', TRUE);
      SaveToConfig('HtmlPurifier.Filter.YouTube', TRUE);
      
      // TODO: Add code to br2nl existing posts.
      
      return TRUE;
   }
   
   public function CleanUp() {
      return TRUE;
   }
}