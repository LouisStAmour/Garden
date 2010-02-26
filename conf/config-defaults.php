<?php if (!defined('APPLICATION')) exit();
// DO NOT EDIT THIS FILE.
// If you want to override the settings in this file then edit config.php.
// This is the global application configuration file that sets up default
// values for configuration settings.
$Configuration = array();

$Configuration['EnabledApplications']['Garden'] = 'garden';

$Configuration['Database']['Engine']                           = 'MySQL';
$Configuration['Database']['Host']                             = 'dbhost';
$Configuration['Database']['Name']                             = 'dbname';
$Configuration['Database']['User']                             = 'dbuser';
$Configuration['Database']['Password']                         = '';
$Configuration['Database']['ConnectionOptions']                = array(
                                                                  PDO::ATTR_PERSISTENT => TRUE,
                                                                  1000 => TRUE, // PDO::MYSQL_ATTR_USE_BUFFERED_QUERY is missing in some php installations
                                                                  1002 => "set names 'utf8'" // PDO::MYSQL_ATTR_INIT_COMMAND is missing in PHP 5.3, so I use the actual value "1002" instead
                                                               );
$Configuration['Database']['CharacterEncoding']                = 'utf8';
$Configuration['Database']['DatabasePrefix']                    = 'GDN_';
$Configuration['Database']['ExtendedProperties']['Collate']     = 'utf8_unicode_ci';

$Configuration['Garden']['ContentType']                         = 'text/html';
$Configuration['Garden']['Charset']                             = 'utf-8';
// An array of folders the application should never search through when searching for classes. (note: plugins had to be removed so that locale searches could get the locale folder from the plugin's folder).
$Configuration['Garden']['FolderBlacklist']                     = array('.', '..', '_svn', '.git');
$Configuration['Garden']['Locale']                              = 'en-CA';
$Configuration['Garden']['Title']                               = 'Vanilla 2';
$Configuration['Garden']['Domain']                              = '';
$Configuration['Garden']['WebRoot']                             = FALSE;
$Configuration['Garden']['Debug']                               = FALSE;
$Configuration['Garden']['RewriteUrls']                         = 'FALSE';
$Configuration['Garden']['Session']['Length']                   = '15 minutes';
$Configuration['Garden']['Cookie']['Salt']                      = '';
$Configuration['Garden']['Cookie']['Name']                      = 'Vanilla';
$Configuration['Garden']['Cookie']['Path']                      = '/';
$Configuration['Garden']['Cookie']['Domain']                    = '';
$Configuration['Garden']['Cookie']['HashMethod']                = 'md5'; // md5 or sha1
$Configuration['Garden']['Authenticator']['Type']               = 'Password'; // Types include 'Password' and 'Handshake'
$Configuration['Garden']['Authenticator']['Encoding']           = 'ini';
$Configuration['Garden']['Authenticator']['RegisterUrl']        = '/entry/register/?Target=%s';
$Configuration['Garden']['Authenticator']['SignInUrl']          = '/entry/signin/?Target=%s';
$Configuration['Garden']['Authenticator']['SignOutUrl']         = '/entry/leave/{Session_TransientKey}';
$Configuration['Garden']['Errors']['LogEnabled']                = FALSE;
$Configuration['Garden']['Errors']['LogFile']                   = '';
$Configuration['Garden']['Errors']['MasterView']                = 'error.master.php';
// $Configuration['Garden']['Errors']['MasterView']                = 'deverror.master.php'; // <-- Use this error master view when debugging
$Configuration['Garden']['SignIn']['Popup']                     = TRUE; // Should the sign-in link pop up or go to it's own page? (SSO requires going to it's own external page)
$Configuration['Garden']['UserAccount']['AllowEdit']            = TRUE; // Allow users to edit their account information? (SSO requires accounts be edited in external system).
$Configuration['Garden']['Registration']['Method']              = 'Basic'; // Options are: Basic, Captcha, Approval, Invitation
$Configuration['Garden']['Registration']['DefaultRoles']        = array('8'); // The default role(s) to assign new users (4 is "Member")
$Configuration['Garden']['Registration']['ApplicantRoleID']     = 4; // The "Applicant" RoleID.
$Configuration['Garden']['Registration']['InviteExpiration']    = '-1 week'; // The time before now that an invitation expires. ie. If an invitation was sent within the last week, it is still valid. This value will be plugged directly into strtotime()
$Configuration['Garden']['Registration']['InviteRoles']         = 'FALSE';
$Configuration['Garden']['TermsOfService']                      = '/garden/home/termsofservice'; // The url to the terms of service.
$Configuration['Garden']['DefaultDateFormat']                   = 'F j, Y';
$Configuration['Garden']['DefaultDayFormat']                    = 'F j';
$Configuration['Garden']['DefaultYearFormat']                   = 'F Y';
$Configuration['Garden']['DefaultTimeFormat']                   = 'g:ia';
$Configuration['Garden']['Email']['UseSmtp']                    = FALSE;
$Configuration['Garden']['Email']['SmtpHost']                   = '';
$Configuration['Garden']['Email']['SmtpUser']                   = '';
$Configuration['Garden']['Email']['SmtpPassword']               = '';
$Configuration['Garden']['Email']['SmtpPort']                   = '25';
$Configuration['Garden']['Email']['MimeType']                   = 'text/plain';
$Configuration['Garden']['Email']['SupportName']                = 'Support';
$Configuration['Garden']['Email']['SupportAddress']             = '';
$Configuration['Garden']['UpdateCheckUrl']                      = 'http://vanillaforums.org/addons/update';
$Configuration['Garden']['AddonUrl']                            = 'http://vanillaforums.org/addons';
$Configuration['Garden']['AddonUrl']                            = '';
$Configuration['Garden']['CanProcessImages']                    = FALSE;
$Configuration['Garden']['Installed']                           = FALSE; // Has Garden been installed yet?
$Configuration['Garden']['Forms']['HoneypotName']               = 'hpt';
$Configuration['Garden']['Upload']['MaxFileSize']               = '1024000';
$Configuration['Garden']['Upload']['AllowedFileExtensions']     = array('txt','jpg','gif','png', 'zip', 'gz', 'tar.gz');
$Configuration['Garden']['Picture']['MaxHeight']                = 1000;
$Configuration['Garden']['Picture']['MaxWidth']                 = 600;
$Configuration['Garden']['Profile']['MaxHeight']                = 1000;
$Configuration['Garden']['Profile']['MaxWidth']                 = 250;
$Configuration['Garden']['Preview']['MaxHeight']                = 100;
$Configuration['Garden']['Preview']['MaxWidth']                 = 75;
$Configuration['Garden']['Thumbnail']['Size']                   = 50;
$Configuration['Garden']['Menu']['Sort']                        = array('Dashboard', 'Discussions', 'Activity', 'Conversations', 'User');
$Configuration['Garden']['InputFormatter']                      = 'Html';
$Configuration['Garden']['Theme']                               = 'default';
$Configuration['Garden']['Html']['nl2br']                       = TRUE;

// Default Preferences
$Configuration['Preferences']['Email']['ConversationMessage']   = '1';
$Configuration['Preferences']['Email']['AddedToConversation']   = '1';

// Begin - HtmlPurifier Settings
$Configuration['HtmlPurifier']['AutoFormat']['AutoParagraph']   = TRUE;
$Configuration['HtmlPurifier']['AutoFormat']['Linkify']         = TRUE;
$Configuration['HtmlPurifier']['Cache']['SerializerPath']       = PATH_CACHE . DS . 'HtmlPurifier';
$Configuration['HtmlPurifier']['Filter']['YouTube']             = TRUE;

// Modules
$Configuration['Modules']['Vanilla']['Panel'] = array('NewDiscussionModule', 'GuestModule', 'Ads');
$Configuration['Modules']['Vanilla']['Content'] = array('Gdn_MessageModule', 'Notices', 'Content', 'Ads');
$Configuration['Modules']['Garden']['Content'] = array('Gdn_MessageModule', 'Notices', 'Content', 'Ads');
$Configuration['Modules']['Conversations']['Content'] = array('Gdn_MessageModule', 'Notices', 'Content', 'Ads');

// Routes
$Configuration['Routes']['DefaultController'] = 'home';
$Configuration['Routes']['Default404'] = 'garden/home/filenotfound';
$Configuration['Routes']['DefaultPermission'] = 'garden/home/permission';