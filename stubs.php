<?php

/**
 * Provides core support for plugins that have to deal with emoticons (like HTML editor or emoticon filter).
 *
 * Whenever this manager mentiones 'emoticon object', the following data
 * structure is expected: stdClass with properties text, imagename, imagecomponent,
 * altidentifier and altcomponent
 *
 * @see admin_setting_emoticons
 *
 * @copyright 2010 David Mudrak
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class emoticon_manager
{
    /**
     * Returns the currently enabled emoticons
     *
     * @param boolean $selectable - If true, only return emoticons that should be selectable from a list.
     * @return array of emoticon objects
     */
    public function get_emoticons($selectable = \false)
    {
    }
    /**
     * Converts emoticon object into renderable pix_emoticon object
     *
     * @param stdClass $emoticon emoticon object
     * @param array $attributes explicit HTML attributes to set
     * @return pix_emoticon
     */
    public function prepare_renderable_emoticon(\stdClass $emoticon, array $attributes = array())
    {
    }
    /**
     * Encodes the array of emoticon objects into a string storable in config table
     *
     * @see self::decode_stored_config()
     * @param array $emoticons array of emtocion objects
     * @return string
     */
    public function encode_stored_config(array $emoticons)
    {
    }
    /**
     * Decodes the string into an array of emoticon objects
     *
     * @see self::encode_stored_config()
     * @param string $encoded
     * @return string|null
     */
    public function decode_stored_config($encoded)
    {
    }
    /**
     * Returns default set of emoticons supported by Moodle
     *
     * @return array of sdtClasses
     */
    public function default_emoticons()
    {
    }
    /**
     * Helper method preparing the stdClass with the emoticon properties
     *
     * @param string|array $text or array of strings
     * @param string $imagename to be used by {@link pix_emoticon}
     * @param string $altidentifier alternative string identifier, null for no alt
     * @param string $altcomponent where the alternative string is defined
     * @param string $imagecomponent to be used by {@link pix_emoticon}
     * @return stdClass
     */
    protected function prepare_emoticon_object($text, $imagename, $altidentifier = \null, $altcomponent = 'core_pix', $imagecomponent = 'core')
    {
    }
}
/**
 * The lang_string class
 *
 * This special class is used to create an object representation of a string request.
 * It is special because processing doesn't occur until the object is first used.
 * The class was created especially to aid performance in areas where strings were
 * required to be generated but were not necessarily used.
 * As an example the admin tree when generated uses over 1500 strings, of which
 * normally only 1/3 are ever actually printed at any time.
 * The performance advantage is achieved by not actually processing strings that
 * arn't being used, as such reducing the processing required for the page.
 *
 * How to use the lang_string class?
 *     There are two methods of using the lang_string class, first through the
 *     forth argument of the get_string function, and secondly directly.
 *     The following are examples of both.
 * 1. Through get_string calls e.g.
 *     $string = get_string($identifier, $component, $a, true);
 *     $string = get_string('yes', 'moodle', null, true);
 * 2. Direct instantiation
 *     $string = new lang_string($identifier, $component, $a, $lang);
 *     $string = new lang_string('yes');
 *
 * How do I use a lang_string object?
 *     The lang_string object makes use of a magic __toString method so that you
 *     are able to use the object exactly as you would use a string in most cases.
 *     This means you are able to collect it into a variable and then directly
 *     echo it, or concatenate it into another string, or similar.
 *     The other thing you can do is manually get the string by calling the
 *     lang_strings out method e.g.
 *         $string = new lang_string('yes');
 *         $string->out();
 *     Also worth noting is that the out method can take one argument, $lang which
 *     allows the developer to change the language on the fly.
 *
 * When should I use a lang_string object?
 *     The lang_string object is designed to be used in any situation where a
 *     string may not be needed, but needs to be generated.
 *     The admin tree is a good example of where lang_string objects should be
 *     used.
 *     A more practical example would be any class that requries strings that may
 *     not be printed (after all classes get renderer by renderers and who knows
 *     what they will do ;))
 *
 * When should I not use a lang_string object?
 *     Don't use lang_strings when you are going to use a string immediately.
 *     There is no need as it will be processed immediately and there will be no
 *     advantage, and in fact perhaps a negative hit as a class has to be
 *     instantiated for a lang_string object, however get_string won't require
 *     that.
 *
 * Limitations:
 * 1. You cannot use a lang_string object as an array offset. Doing so will
 *     result in PHP throwing an error. (You can use it as an object property!)
 *
 * @package    core
 * @category   string
 * @copyright  2011 Sam Hemelryk
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class lang_string
{
    /** @var string The strings identifier */
    protected $identifier;
    /** @var string The strings component. Default '' */
    protected $component = '';
    /** @var array|stdClass Any arguments required for the string. Default null */
    protected $a = \null;
    /** @var string The language to use when processing the string. Default null */
    protected $lang = \null;
    /** @var string The processed string (once processed) */
    protected $string = \null;
    /**
     * A special boolean. If set to true then the object has been woken up and
     * cannot be regenerated. If this is set then $this->string MUST be used.
     * @var bool
     */
    protected $forcedstring = \false;
    /**
     * Constructs a lang_string object
     *
     * This function should do as little processing as possible to ensure the best
     * performance for strings that won't be used.
     *
     * @param string $identifier The strings identifier
     * @param string $component The strings component
     * @param stdClass|array $a Any arguments the string requires
     * @param string $lang The language to use when processing the string.
     * @throws coding_exception
     */
    public function __construct($identifier, $component = '', $a = \null, $lang = \null)
    {
    }
    /**
     * Processes the string.
     *
     * This function actually processes the string, stores it in the string property
     * and then returns it.
     * You will notice that this function is VERY similar to the get_string method.
     * That is because it is pretty much doing the same thing.
     * However as this function is an upgrade it isn't as tolerant to backwards
     * compatibility.
     *
     * @return string
     * @throws coding_exception
     */
    protected function get_string()
    {
    }
    /**
     * Returns the string
     *
     * @param string $lang The langauge to use when processing the string
     * @return string
     */
    public function out($lang = \null)
    {
    }
    /**
     * Magic __toString method for printing a string
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Magic __set_state method used for var_export
     *
     * @param array $array
     * @return self
     */
    public static function __set_state(array $array) : self
    {
    }
    /**
     * Prepares the lang_string for sleep and stores only the forcedstring and
     * string properties... the string cannot be regenerated so we need to ensure
     * it is generated for this.
     *
     * @return string
     */
    public function __sleep()
    {
    }
    /**
     * Returns the identifier.
     *
     * @return string
     */
    public function get_identifier()
    {
    }
    /**
     * Returns the component.
     *
     * @return string
     */
    public function get_component()
    {
    }
}
/**
 * Interface marking other classes as suitable for renderer_base::render()
 *
 * @copyright 2010 Petr Skoda (skodak) info@skodak.org
 * @package core
 * @category output
 */
interface renderable
{
    // intentionally empty
}
/**
 * Interface marking other classes having the ability to export their data for use by templates.
 *
 * @copyright 2015 Damyon Wiese
 * @package core
 * @category output
 * @since 2.9
 */
interface templatable
{
    /**
     * Function to export the renderer data in a format that is suitable for a
     * mustache template. This means:
     * 1. No complex types - only stdClass, array, int, string, float, bool
     * 2. Any additional info that is required for the template is pre-calculated (e.g. capability checks).
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(\renderer_base $output);
}
/**
 * Data structure representing a file picker.
 *
 * @copyright 2010 Dongsheng Cai
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class file_picker implements \renderable
{
    /**
     * @var stdClass An object containing options for the file picker
     */
    public $options;
    /**
     * Constructs a file picker object.
     *
     * The following are possible options for the filepicker:
     *    - accepted_types  (*)
     *    - return_types    (FILE_INTERNAL)
     *    - env             (filepicker)
     *    - client_id       (uniqid)
     *    - itemid          (0)
     *    - maxbytes        (-1)
     *    - maxfiles        (1)
     *    - buttonname      (false)
     *
     * @param stdClass $options An object containing options for the file picker.
     */
    public function __construct(\stdClass $options)
    {
    }
}
/**
 * Data structure representing a user picture.
 *
 * @copyright 2009 Nicolas Connault, 2010 Petr Skoda
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Modle 2.0
 * @package core
 * @category output
 */
class user_picture implements \renderable
{
    /**
     * @var stdClass A user object with at least fields all columns specified
     * in $fields array constant set.
     */
    public $user;
    /**
     * @var int The course id. Used when constructing the link to the user's
     * profile, page course id used if not specified.
     */
    public $courseid;
    /**
     * @var bool Add course profile link to image
     */
    public $link = \true;
    /**
     * @var int Size in pixels. Special values are (true/1 = 100px) and
     * (false/0 = 35px)
     * for backward compatibility.
     */
    public $size = 35;
    /**
     * @var bool Add non-blank alt-text to the image.
     * Default true, set to false when image alt just duplicates text in screenreaders.
     */
    public $alttext = \true;
    /**
     * @var bool Whether or not to open the link in a popup window.
     */
    public $popup = \false;
    /**
     * @var string Image class attribute
     */
    public $class = 'userpicture';
    /**
     * @var bool Whether to be visible to screen readers.
     */
    public $visibletoscreenreaders = \true;
    /**
     * @var bool Whether to include the fullname in the user picture link.
     */
    public $includefullname = \false;
    /**
     * @var mixed Include user authentication token. True indicates to generate a token for current user, and integer value
     * indicates to generate a token for the user whose id is the value indicated.
     */
    public $includetoken = \false;
    /**
     * User picture constructor.
     *
     * @param stdClass $user user record with at least id, picture, imagealt, firstname and lastname set.
     *                 It is recommended to add also contextid of the user for performance reasons.
     */
    public function __construct(\stdClass $user)
    {
    }
    /**
     * Returns a list of required user fields, useful when fetching required user info from db.
     *
     * In some cases we have to fetch the user data together with some other information,
     * the idalias is useful there because the id would otherwise override the main
     * id of the result record. Please note it has to be converted back to id before rendering.
     *
     * @param string $tableprefix name of database table prefix in query
     * @param array $extrafields extra fields to be included in result (do not include TEXT columns because it would break SELECT DISTINCT in MSSQL and ORACLE)
     * @param string $idalias alias of id field
     * @param string $fieldprefix prefix to add to all columns in their aliases, does not apply to 'id'
     * @return string
     * @deprecated since Moodle 3.11 MDL-45242
     * @see \core_user\fields
     */
    public static function fields($tableprefix = '', array $extrafields = \NULL, $idalias = 'id', $fieldprefix = '')
    {
    }
    /**
     * Extract the aliased user fields from a given record
     *
     * Given a record that was previously obtained using {@link self::fields()} with aliases,
     * this method extracts user related unaliased fields.
     *
     * @param stdClass $record containing user picture fields
     * @param array $extrafields extra fields included in the $record
     * @param string $idalias alias of the id field
     * @param string $fieldprefix prefix added to all columns in their aliases, does not apply to 'id'
     * @return stdClass object with unaliased user fields
     */
    public static function unalias(\stdClass $record, array $extrafields = \null, $idalias = 'id', $fieldprefix = '')
    {
    }
    /**
     * Works out the URL for the users picture.
     *
     * This method is recommended as it avoids costly redirects of user pictures
     * if requests are made for non-existent files etc.
     *
     * @param moodle_page $page
     * @param renderer_base $renderer
     * @return moodle_url
     */
    public function get_url(\moodle_page $page, \renderer_base $renderer = \null)
    {
    }
}
/**
 * Data structure representing a help icon.
 *
 * @copyright 2010 Petr Skoda (info@skodak.org)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class help_icon implements \renderable, \templatable
{
    /**
     * @var string lang pack identifier (without the "_help" suffix),
     * both get_string($identifier, $component) and get_string($identifier.'_help', $component)
     * must exist.
     */
    public $identifier;
    /**
     * @var string Component name, the same as in get_string()
     */
    public $component;
    /**
     * @var string Extra descriptive text next to the icon
     */
    public $linktext = \null;
    /**
     * Constructor
     *
     * @param string $identifier string for help page title,
     *  string with _help suffix is used for the actual help text.
     *  string with _link suffix is used to create a link to further info (if it exists)
     * @param string $component
     */
    public function __construct($identifier, $component)
    {
    }
    /**
     * Verifies that both help strings exists, shows debug warnings if not
     */
    public function diag_strings()
    {
    }
    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return array
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * Data structure representing an icon font.
 *
 * @copyright 2016 Damyon Wiese
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package core
 * @category output
 */
class pix_icon_font implements \templatable
{
    /**
     * @var pix_icon $pixicon The original icon.
     */
    private $pixicon = \null;
    /**
     * @var string $key The mapped key.
     */
    private $key;
    /**
     * @var bool $mapped The icon could not be mapped.
     */
    private $mapped;
    /**
     * Constructor
     *
     * @param pix_icon $pixicon The original icon
     */
    public function __construct(\pix_icon $pixicon)
    {
    }
    /**
     * Return true if this pix_icon was successfully mapped to an icon font.
     *
     * @return bool
     */
    public function is_mapped()
    {
    }
    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return array
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * Data structure representing an icon subtype.
 *
 * @copyright 2016 Damyon Wiese
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package core
 * @category output
 */
class pix_icon_fontawesome extends \pix_icon_font
{
}
/**
 * Data structure representing an icon.
 *
 * @copyright 2010 Petr Skoda
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class pix_icon implements \renderable, \templatable
{
    /**
     * @var string The icon name
     */
    var $pix;
    /**
     * @var string The component the icon belongs to.
     */
    var $component;
    /**
     * @var array An array of attributes to use on the icon
     */
    var $attributes = array();
    /**
     * Constructor
     *
     * @param string $pix short icon name
     * @param string $alt The alt text to use for the icon
     * @param string $component component name
     * @param array $attributes html attributes
     */
    public function __construct($pix, $alt, $component = 'moodle', array $attributes = \null)
    {
    }
    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return array
     */
    public function export_for_template(\renderer_base $output)
    {
    }
    /**
     * Much simpler version of export that will produce the data required to render this pix with the
     * pix helper in a mustache tag.
     *
     * @return array
     */
    public function export_for_pix()
    {
    }
}
/**
 * Data structure representing an activity icon.
 *
 * The difference is that activity icons will always render with the standard icon system (no font icons).
 *
 * @copyright 2017 Damyon Wiese
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package core
 */
class image_icon extends \pix_icon
{
}
/**
 * Data structure representing an emoticon image
 *
 * @copyright 2010 David Mudrak
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class pix_emoticon extends \pix_icon implements \renderable
{
    /**
     * Constructor
     * @param string $pix short icon name
     * @param string $alt alternative text
     * @param string $component emoticon image provider
     * @param array $attributes explicit HTML attributes
     */
    public function __construct($pix, $alt, $component = 'moodle', array $attributes = array())
    {
    }
}
/**
 * Data structure representing a simple form with only one button.
 *
 * @copyright 2009 Petr Skoda
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class single_button implements \renderable
{
    /**
     * @var moodle_url Target url
     */
    public $url;
    /**
     * @var string Button label
     */
    public $label;
    /**
     * @var string Form submit method post or get
     */
    public $method = 'post';
    /**
     * @var string Wrapping div class
     */
    public $class = 'singlebutton';
    /**
     * @var bool True if button is primary button. Used for styling.
     */
    public $primary = \false;
    /**
     * @var bool True if button disabled, false if normal
     */
    public $disabled = \false;
    /**
     * @var string Button tooltip
     */
    public $tooltip = \null;
    /**
     * @var string Form id
     */
    public $formid;
    /**
     * @var array List of attached actions
     */
    public $actions = array();
    /**
     * @var array $params URL Params
     */
    public $params;
    /**
     * @var string Action id
     */
    public $actionid;
    /**
     * @var array
     */
    protected $attributes = [];
    /**
     * Constructor
     * @param moodle_url $url
     * @param string $label button text
     * @param string $method get or post submit method
     * @param array $attributes Attributes for the HTML button tag
     */
    public function __construct(\moodle_url $url, $label, $method = 'post', $primary = \false, $attributes = [])
    {
    }
    /**
     * Shortcut for adding a JS confirm dialog when the button is clicked.
     * The message must be a yes/no question.
     *
     * @param string $confirmmessage The yes/no confirmation question. If "Yes" is clicked, the original action will occur.
     */
    public function add_confirm_action($confirmmessage)
    {
    }
    /**
     * Add action to the button.
     * @param component_action $action
     */
    public function add_action(\component_action $action)
    {
    }
    /**
     * Sets an attribute for the HTML button tag.
     *
     * @param  string $name  The attribute name
     * @param  mixed  $value The value
     * @return null
     */
    public function set_attribute($name, $value)
    {
    }
    /**
     * Export data.
     *
     * @param renderer_base $output Renderer.
     * @return stdClass
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * Simple form with just one select field that gets submitted automatically.
 *
 * If JS not enabled small go button is printed too.
 *
 * @copyright 2009 Petr Skoda
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class single_select implements \renderable, \templatable
{
    /**
     * @var moodle_url Target url - includes hidden fields
     */
    var $url;
    /**
     * @var string Name of the select element.
     */
    var $name;
    /**
     * @var array $options associative array value=>label ex.: array(1=>'One, 2=>Two)
     *     it is also possible to specify optgroup as complex label array ex.:
     *         array(array('Odd'=>array(1=>'One', 3=>'Three)), array('Even'=>array(2=>'Two')))
     *         array(1=>'One', '--1uniquekey'=>array('More'=>array(2=>'Two', 3=>'Three')))
     */
    var $options;
    /**
     * @var string Selected option
     */
    var $selected;
    /**
     * @var array Nothing selected
     */
    var $nothing;
    /**
     * @var array Extra select field attributes
     */
    var $attributes = array();
    /**
     * @var string Button label
     */
    var $label = '';
    /**
     * @var array Button label's attributes
     */
    var $labelattributes = array();
    /**
     * @var string Form submit method post or get
     */
    var $method = 'get';
    /**
     * @var string Wrapping div class
     */
    var $class = 'singleselect';
    /**
     * @var bool True if button disabled, false if normal
     */
    var $disabled = \false;
    /**
     * @var string Button tooltip
     */
    var $tooltip = \null;
    /**
     * @var string Form id
     */
    var $formid = \null;
    /**
     * @var help_icon The help icon for this element.
     */
    var $helpicon = \null;
    /**
     * Constructor
     * @param moodle_url $url form action target, includes hidden fields
     * @param string $name name of selection field - the changing parameter in url
     * @param array $options list of options
     * @param string $selected selected element
     * @param array $nothing
     * @param string $formid
     */
    public function __construct(\moodle_url $url, $name, array $options, $selected = '', $nothing = array('' => 'choosedots'), $formid = \null)
    {
    }
    /**
     * Shortcut for adding a JS confirm dialog when the button is clicked.
     * The message must be a yes/no question.
     *
     * @param string $confirmmessage The yes/no confirmation question. If "Yes" is clicked, the original action will occur.
     */
    public function add_confirm_action($confirmmessage)
    {
    }
    /**
     * Add action to the button.
     *
     * @param component_action $action
     */
    public function add_action(\component_action $action)
    {
    }
    /**
     * Adds help icon.
     *
     * @deprecated since Moodle 2.0
     */
    public function set_old_help_icon($helppage, $title, $component = 'moodle')
    {
    }
    /**
     * Adds help icon.
     *
     * @param string $identifier The keyword that defines a help page
     * @param string $component
     */
    public function set_help_icon($identifier, $component = 'moodle')
    {
    }
    /**
     * Sets select's label
     *
     * @param string $label
     * @param array $attributes (optional)
     */
    public function set_label($label, $attributes = array())
    {
    }
    /**
     * Export data.
     *
     * @param renderer_base $output Renderer.
     * @return stdClass
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * Simple URL selection widget description.
 *
 * @copyright 2009 Petr Skoda
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class url_select implements \renderable, \templatable
{
    /**
     * @var array $urls associative array value=>label ex.: array(1=>'One, 2=>Two)
     *     it is also possible to specify optgroup as complex label array ex.:
     *         array(array('Odd'=>array(1=>'One', 3=>'Three)), array('Even'=>array(2=>'Two')))
     *         array(1=>'One', '--1uniquekey'=>array('More'=>array(2=>'Two', 3=>'Three')))
     */
    var $urls;
    /**
     * @var string Selected option
     */
    var $selected;
    /**
     * @var array Nothing selected
     */
    var $nothing;
    /**
     * @var array Extra select field attributes
     */
    var $attributes = array();
    /**
     * @var string Button label
     */
    var $label = '';
    /**
     * @var array Button label's attributes
     */
    var $labelattributes = array();
    /**
     * @var string Wrapping div class
     */
    var $class = 'urlselect';
    /**
     * @var bool True if button disabled, false if normal
     */
    var $disabled = \false;
    /**
     * @var string Button tooltip
     */
    var $tooltip = \null;
    /**
     * @var string Form id
     */
    var $formid = \null;
    /**
     * @var help_icon The help icon for this element.
     */
    var $helpicon = \null;
    /**
     * @var string If set, makes button visible with given name for button
     */
    var $showbutton = \null;
    /**
     * Constructor
     * @param array $urls list of options
     * @param string $selected selected element
     * @param array $nothing
     * @param string $formid
     * @param string $showbutton Set to text of button if it should be visible
     *   or null if it should be hidden (hidden version always has text 'go')
     */
    public function __construct(array $urls, $selected = '', $nothing = array('' => 'choosedots'), $formid = \null, $showbutton = \null)
    {
    }
    /**
     * Adds help icon.
     *
     * @deprecated since Moodle 2.0
     */
    public function set_old_help_icon($helppage, $title, $component = 'moodle')
    {
    }
    /**
     * Adds help icon.
     *
     * @param string $identifier The keyword that defines a help page
     * @param string $component
     */
    public function set_help_icon($identifier, $component = 'moodle')
    {
    }
    /**
     * Sets select's label
     *
     * @param string $label
     * @param array $attributes (optional)
     */
    public function set_label($label, $attributes = array())
    {
    }
    /**
     * Clean a URL.
     *
     * @param string $value The URL.
     * @return The cleaned URL.
     */
    protected function clean_url($value)
    {
    }
    /**
     * Flatten the options for Mustache.
     *
     * This also cleans the URLs.
     *
     * @param array $options The options.
     * @param array $nothing The nothing option.
     * @return array
     */
    protected function flatten_options($options, $nothing)
    {
    }
    /**
     * Export for template.
     *
     * @param renderer_base $output Renderer.
     * @return stdClass
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * Data structure describing html link with special action attached.
 *
 * @copyright 2010 Petr Skoda
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class action_link implements \renderable
{
    /**
     * @var moodle_url Href url
     */
    public $url;
    /**
     * @var string Link text HTML fragment
     */
    public $text;
    /**
     * @var array HTML attributes
     */
    public $attributes;
    /**
     * @var array List of actions attached to link
     */
    public $actions;
    /**
     * @var pix_icon Optional pix icon to render with the link
     */
    public $icon;
    /**
     * Constructor
     * @param moodle_url $url
     * @param string $text HTML fragment
     * @param component_action $action
     * @param array $attributes associative array of html link attributes + disabled
     * @param pix_icon $icon optional pix_icon to render with the link text
     */
    public function __construct(\moodle_url $url, $text, \component_action $action = \null, array $attributes = \null, \pix_icon $icon = \null)
    {
    }
    /**
     * Add action to the link.
     *
     * @param component_action $action
     */
    public function add_action(\component_action $action)
    {
    }
    /**
     * Adds a CSS class to this action link object
     * @param string $class
     */
    public function add_class($class)
    {
    }
    /**
     * Returns true if the specified class has been added to this link.
     * @param string $class
     * @return bool
     */
    public function has_class($class)
    {
    }
    /**
     * Return the rendered HTML for the icon. Useful for rendering action links in a template.
     * @return string
     */
    public function get_icon_html()
    {
    }
    /**
     * Export for template.
     *
     * @param renderer_base $output The renderer.
     * @return stdClass
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * Simple html output class
 *
 * @copyright 2009 Tim Hunt, 2010 Petr Skoda
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class html_writer
{
    /**
     * Outputs a tag with attributes and contents
     *
     * @param string $tagname The name of tag ('a', 'img', 'span' etc.)
     * @param string $contents What goes between the opening and closing tags
     * @param array $attributes The tag attributes (array('src' => $url, 'class' => 'class1') etc.)
     * @return string HTML fragment
     */
    public static function tag($tagname, $contents, array $attributes = \null)
    {
    }
    /**
     * Outputs an opening tag with attributes
     *
     * @param string $tagname The name of tag ('a', 'img', 'span' etc.)
     * @param array $attributes The tag attributes (array('src' => $url, 'class' => 'class1') etc.)
     * @return string HTML fragment
     */
    public static function start_tag($tagname, array $attributes = \null)
    {
    }
    /**
     * Outputs a closing tag
     *
     * @param string $tagname The name of tag ('a', 'img', 'span' etc.)
     * @return string HTML fragment
     */
    public static function end_tag($tagname)
    {
    }
    /**
     * Outputs an empty tag with attributes
     *
     * @param string $tagname The name of tag ('input', 'img', 'br' etc.)
     * @param array $attributes The tag attributes (array('src' => $url, 'class' => 'class1') etc.)
     * @return string HTML fragment
     */
    public static function empty_tag($tagname, array $attributes = \null)
    {
    }
    /**
     * Outputs a tag, but only if the contents are not empty
     *
     * @param string $tagname The name of tag ('a', 'img', 'span' etc.)
     * @param string $contents What goes between the opening and closing tags
     * @param array $attributes The tag attributes (array('src' => $url, 'class' => 'class1') etc.)
     * @return string HTML fragment
     */
    public static function nonempty_tag($tagname, $contents, array $attributes = \null)
    {
    }
    /**
     * Outputs a HTML attribute and value
     *
     * @param string $name The name of the attribute ('src', 'href', 'class' etc.)
     * @param string $value The value of the attribute. The value will be escaped with {@link s()}
     * @return string HTML fragment
     */
    public static function attribute($name, $value)
    {
    }
    /**
     * Outputs a list of HTML attributes and values
     *
     * @param array $attributes The tag attributes (array('src' => $url, 'class' => 'class1') etc.)
     *       The values will be escaped with {@link s()}
     * @return string HTML fragment
     */
    public static function attributes(array $attributes = \null)
    {
    }
    /**
     * Generates a simple image tag with attributes.
     *
     * @param string $src The source of image
     * @param string $alt The alternate text for image
     * @param array $attributes The tag attributes (array('height' => $max_height, 'class' => 'class1') etc.)
     * @return string HTML fragment
     */
    public static function img($src, $alt, array $attributes = \null)
    {
    }
    /**
     * Generates random html element id.
     *
     * @staticvar int $counter
     * @staticvar type $uniq
     * @param string $base A string fragment that will be included in the random ID.
     * @return string A unique ID
     */
    public static function random_id($base = 'random')
    {
    }
    /**
     * Generates a simple html link
     *
     * @param string|moodle_url $url The URL
     * @param string $text The text
     * @param array $attributes HTML attributes
     * @return string HTML fragment
     */
    public static function link($url, $text, array $attributes = \null)
    {
    }
    /**
     * Generates a simple checkbox with optional label
     *
     * @param string $name The name of the checkbox
     * @param string $value The value of the checkbox
     * @param bool $checked Whether the checkbox is checked
     * @param string $label The label for the checkbox
     * @param array $attributes Any attributes to apply to the checkbox
     * @param array $labelattributes Any attributes to apply to the label, if present
     * @return string html fragment
     */
    public static function checkbox($name, $value, $checked = \true, $label = '', array $attributes = \null, array $labelattributes = \null)
    {
    }
    /**
     * Generates a simple select yes/no form field
     *
     * @param string $name name of select element
     * @param bool $selected
     * @param array $attributes - html select element attributes
     * @return string HTML fragment
     */
    public static function select_yes_no($name, $selected = \true, array $attributes = \null)
    {
    }
    /**
     * Generates a simple select form field
     *
     * Note this function does HTML escaping on the optgroup labels, but not on the choice labels.
     *
     * @param array $options associative array value=>label ex.:
     *                array(1=>'One, 2=>Two)
     *              it is also possible to specify optgroup as complex label array ex.:
     *                array(array('Odd'=>array(1=>'One', 3=>'Three)), array('Even'=>array(2=>'Two')))
     *                array(1=>'One', '--1uniquekey'=>array('More'=>array(2=>'Two', 3=>'Three')))
     * @param string $name name of select element
     * @param string|array $selected value or array of values depending on multiple attribute
     * @param array|bool $nothing add nothing selected option, or false of not added
     * @param array $attributes html select element attributes
     * @return string HTML fragment
     */
    public static function select(array $options, $name, $selected = '', $nothing = array('' => 'choosedots'), array $attributes = \null)
    {
    }
    /**
     * Returns HTML to display a select box option.
     *
     * @param string $label The label to display as the option.
     * @param string|int $value The value the option represents
     * @param array $selected An array of selected options
     * @return string HTML fragment
     */
    private static function select_option($label, $value, array $selected)
    {
    }
    /**
     * Returns HTML to display a select box option group.
     *
     * @param string $groupname The label to use for the group
     * @param array $options The options in the group
     * @param array $selected An array of selected values.
     * @return string HTML fragment.
     */
    private static function select_optgroup($groupname, $options, array $selected)
    {
    }
    /**
     * This is a shortcut for making an hour selector menu.
     *
     * @param string $type The type of selector (years, months, days, hours, minutes)
     * @param string $name fieldname
     * @param int $currenttime A default timestamp in GMT
     * @param int $step minute spacing
     * @param array $attributes - html select element attributes
     * @return HTML fragment
     */
    public static function select_time($type, $name, $currenttime = 0, $step = 5, array $attributes = \null)
    {
    }
    /**
     * Shortcut for quick making of lists
     *
     * Note: 'list' is a reserved keyword ;-)
     *
     * @param array $items
     * @param array $attributes
     * @param string $tag ul or ol
     * @return string
     */
    public static function alist(array $items, array $attributes = \null, $tag = 'ul')
    {
    }
    /**
     * Returns hidden input fields created from url parameters.
     *
     * @param moodle_url $url
     * @param array $exclude list of excluded parameters
     * @return string HTML fragment
     */
    public static function input_hidden_params(\moodle_url $url, array $exclude = \null)
    {
    }
    /**
     * Generate a script tag containing the the specified code.
     *
     * @param string $jscode the JavaScript code
     * @param moodle_url|string $url optional url of the external script, $code ignored if specified
     * @return string HTML, the code wrapped in <script> tags.
     */
    public static function script($jscode, $url = \null)
    {
    }
    /**
     * Renders HTML table
     *
     * This method may modify the passed instance by adding some default properties if they are not set yet.
     * If this is not what you want, you should make a full clone of your data before passing them to this
     * method. In most cases this is not an issue at all so we do not clone by default for performance
     * and memory consumption reasons.
     *
     * @param html_table $table data to be rendered
     * @return string HTML code
     */
    public static function table(\html_table $table)
    {
    }
    /**
     * Renders form element label
     *
     * By default, the label is suffixed with a label separator defined in the
     * current language pack (colon by default in the English lang pack).
     * Adding the colon can be explicitly disabled if needed. Label separators
     * are put outside the label tag itself so they are not read by
     * screenreaders (accessibility).
     *
     * Parameter $for explicitly associates the label with a form control. When
     * set, the value of this attribute must be the same as the value of
     * the id attribute of the form control in the same document. When null,
     * the label being defined is associated with the control inside the label
     * element.
     *
     * @param string $text content of the label tag
     * @param string|null $for id of the element this label is associated with, null for no association
     * @param bool $colonize add label separator (colon) to the label text, if it is not there yet
     * @param array $attributes to be inserted in the tab, for example array('accesskey' => 'a')
     * @return string HTML of the label element
     */
    public static function label($text, $for, $colonize = \true, array $attributes = array())
    {
    }
    /**
     * Combines a class parameter with other attributes. Aids in code reduction
     * because the class parameter is very frequently used.
     *
     * If the class attribute is specified both in the attributes and in the
     * class parameter, the two values are combined with a space between.
     *
     * @param string $class Optional CSS class (or classes as space-separated list)
     * @param array $attributes Optional other attributes as array
     * @return array Attributes (or null if still none)
     */
    private static function add_class($class = '', array $attributes = \null)
    {
    }
    /**
     * Creates a <div> tag. (Shortcut function.)
     *
     * @param string $content HTML content of tag
     * @param string $class Optional CSS class (or classes as space-separated list)
     * @param array $attributes Optional other attributes as array
     * @return string HTML code for div
     */
    public static function div($content, $class = '', array $attributes = \null)
    {
    }
    /**
     * Starts a <div> tag. (Shortcut function.)
     *
     * @param string $class Optional CSS class (or classes as space-separated list)
     * @param array $attributes Optional other attributes as array
     * @return string HTML code for open div tag
     */
    public static function start_div($class = '', array $attributes = \null)
    {
    }
    /**
     * Ends a <div> tag. (Shortcut function.)
     *
     * @return string HTML code for close div tag
     */
    public static function end_div()
    {
    }
    /**
     * Creates a <span> tag. (Shortcut function.)
     *
     * @param string $content HTML content of tag
     * @param string $class Optional CSS class (or classes as space-separated list)
     * @param array $attributes Optional other attributes as array
     * @return string HTML code for span
     */
    public static function span($content, $class = '', array $attributes = \null)
    {
    }
    /**
     * Starts a <span> tag. (Shortcut function.)
     *
     * @param string $class Optional CSS class (or classes as space-separated list)
     * @param array $attributes Optional other attributes as array
     * @return string HTML code for open span tag
     */
    public static function start_span($class = '', array $attributes = \null)
    {
    }
    /**
     * Ends a <span> tag. (Shortcut function.)
     *
     * @return string HTML code for close span tag
     */
    public static function end_span()
    {
    }
}
/**
 * Simple javascript output class
 *
 * @copyright 2010 Petr Skoda
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class js_writer
{
    /**
     * Returns javascript code calling the function
     *
     * @param string $function function name, can be complex like Y.Event.purgeElement
     * @param array $arguments parameters
     * @param int $delay execution delay in seconds
     * @return string JS code fragment
     */
    public static function function_call($function, array $arguments = \null, $delay = 0)
    {
    }
    /**
     * Special function which adds Y as first argument of function call.
     *
     * @param string $function The function to call
     * @param array $extraarguments Any arguments to pass to it
     * @return string Some JS code
     */
    public static function function_call_with_Y($function, array $extraarguments = \null)
    {
    }
    /**
     * Returns JavaScript code to initialise a new object
     *
     * @param string $var If it is null then no var is assigned the new object.
     * @param string $class The class to initialise an object for.
     * @param array $arguments An array of args to pass to the init method.
     * @param array $requirements Any modules required for this class.
     * @param int $delay The delay before initialisation. 0 = no delay.
     * @return string Some JS code
     */
    public static function object_init($var, $class, array $arguments = \null, array $requirements = \null, $delay = 0)
    {
    }
    /**
     * Returns code setting value to variable
     *
     * @param string $name
     * @param mixed $value json serialised value
     * @param bool $usevar add var definition, ignored for nested properties
     * @return string JS code fragment
     */
    public static function set_variable($name, $value, $usevar = \true)
    {
    }
    /**
     * Writes event handler attaching code
     *
     * @param array|string $selector standard YUI selector for elements, may be
     *     array or string, element id is in the form "#idvalue"
     * @param string $event A valid DOM event (click, mousedown, change etc.)
     * @param string $function The name of the function to call
     * @param array $arguments An optional array of argument parameters to pass to the function
     * @return string JS code fragment
     */
    public static function event_handler($selector, $event, $function, array $arguments = \null)
    {
    }
}
/**
 * Holds all the information required to render a <table> by {@link core_renderer::table()}
 *
 * Example of usage:
 * $t = new html_table();
 * ... // set various properties of the object $t as described below
 * echo html_writer::table($t);
 *
 * @copyright 2009 David Mudrak <david.mudrak@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class html_table
{
    /**
     * @var string Value to use for the id attribute of the table
     */
    public $id = \null;
    /**
     * @var array Attributes of HTML attributes for the <table> element
     */
    public $attributes = array();
    /**
     * @var array An array of headings. The n-th array item is used as a heading of the n-th column.
     * For more control over the rendering of the headers, an array of html_table_cell objects
     * can be passed instead of an array of strings.
     *
     * Example of usage:
     * $t->head = array('Student', 'Grade');
     */
    public $head;
    /**
     * @var array An array that can be used to make a heading span multiple columns.
     * In this example, {@link html_table:$data} is supposed to have three columns. For the first two columns,
     * the same heading is used. Therefore, {@link html_table::$head} should consist of two items.
     *
     * Example of usage:
     * $t->headspan = array(2,1);
     */
    public $headspan;
    /**
     * @var array An array of column alignments.
     * The value is used as CSS 'text-align' property. Therefore, possible
     * values are 'left', 'right', 'center' and 'justify'. Specify 'right' or 'left' from the perspective
     * of a left-to-right (LTR) language. For RTL, the values are flipped automatically.
     *
     * Examples of usage:
     * $t->align = array(null, 'right');
     * or
     * $t->align[1] = 'right';
     */
    public $align;
    /**
     * @var array The value is used as CSS 'size' property.
     *
     * Examples of usage:
     * $t->size = array('50%', '50%');
     * or
     * $t->size[1] = '120px';
     */
    public $size;
    /**
     * @var array An array of wrapping information.
     * The only possible value is 'nowrap' that sets the
     * CSS property 'white-space' to the value 'nowrap' in the given column.
     *
     * Example of usage:
     * $t->wrap = array(null, 'nowrap');
     */
    public $wrap;
    /**
     * @var array Array of arrays or html_table_row objects containing the data. Alternatively, if you have
     * $head specified, the string 'hr' (for horizontal ruler) can be used
     * instead of an array of cells data resulting in a divider rendered.
     *
     * Example of usage with array of arrays:
     * $row1 = array('Harry Potter', '76 %');
     * $row2 = array('Hermione Granger', '100 %');
     * $t->data = array($row1, $row2);
     *
     * Example with array of html_table_row objects: (used for more fine-grained control)
     * $cell1 = new html_table_cell();
     * $cell1->text = 'Harry Potter';
     * $cell1->colspan = 2;
     * $row1 = new html_table_row();
     * $row1->cells[] = $cell1;
     * $cell2 = new html_table_cell();
     * $cell2->text = 'Hermione Granger';
     * $cell3 = new html_table_cell();
     * $cell3->text = '100 %';
     * $row2 = new html_table_row();
     * $row2->cells = array($cell2, $cell3);
     * $t->data = array($row1, $row2);
     */
    public $data = [];
    /**
     * @deprecated since Moodle 2.0. Styling should be in the CSS.
     * @var string Width of the table, percentage of the page preferred.
     */
    public $width = \null;
    /**
     * @deprecated since Moodle 2.0. Styling should be in the CSS.
     * @var string Alignment for the whole table. Can be 'right', 'left' or 'center' (default).
     */
    public $tablealign = \null;
    /**
     * @deprecated since Moodle 2.0. Styling should be in the CSS.
     * @var int Padding on each cell, in pixels
     */
    public $cellpadding = \null;
    /**
     * @var int Spacing between cells, in pixels
     * @deprecated since Moodle 2.0. Styling should be in the CSS.
     */
    public $cellspacing = \null;
    /**
     * @var array Array of classes to add to particular rows, space-separated string.
     * Class 'lastrow' is added automatically for the last row in the table.
     *
     * Example of usage:
     * $t->rowclasses[9] = 'tenth'
     */
    public $rowclasses;
    /**
     * @var array An array of classes to add to every cell in a particular column,
     * space-separated string. Class 'cell' is added automatically by the renderer.
     * Classes 'c0' or 'c1' are added automatically for every odd or even column,
     * respectively. Class 'lastcol' is added automatically for all last cells
     * in a row.
     *
     * Example of usage:
     * $t->colclasses = array(null, 'grade');
     */
    public $colclasses;
    /**
     * @var string Description of the contents for screen readers.
     *
     * The "summary" attribute on the "table" element is not supported in HTML5.
     * Consider describing the structure of the table in a "caption" element or in a "figure" element containing the table;
     * or, simplify the structure of the table so that no description is needed.
     *
     * @deprecated since Moodle 3.9.
     */
    public $summary;
    /**
     * @var string Caption for the table, typically a title.
     *
     * Example of usage:
     * $t->caption = "TV Guide";
     */
    public $caption;
    /**
     * @var bool Whether to hide the table's caption from sighted users.
     *
     * Example of usage:
     * $t->caption = "TV Guide";
     * $t->captionhide = true;
     */
    public $captionhide = \false;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
}
/**
 * Component representing a table row.
 *
 * @copyright 2009 Nicolas Connault
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class html_table_row
{
    /**
     * @var string Value to use for the id attribute of the row.
     */
    public $id = \null;
    /**
     * @var array Array of html_table_cell objects
     */
    public $cells = array();
    /**
     * @var string Value to use for the style attribute of the table row
     */
    public $style = \null;
    /**
     * @var array Attributes of additional HTML attributes for the <tr> element
     */
    public $attributes = array();
    /**
     * Constructor
     * @param array $cells
     */
    public function __construct(array $cells = \null)
    {
    }
}
/**
 * Component representing a table cell.
 *
 * @copyright 2009 Nicolas Connault
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class html_table_cell
{
    /**
     * @var string Value to use for the id attribute of the cell.
     */
    public $id = \null;
    /**
     * @var string The contents of the cell.
     */
    public $text;
    /**
     * @var string Abbreviated version of the contents of the cell.
     */
    public $abbr = \null;
    /**
     * @var int Number of columns this cell should span.
     */
    public $colspan = \null;
    /**
     * @var int Number of rows this cell should span.
     */
    public $rowspan = \null;
    /**
     * @var string Defines a way to associate header cells and data cells in a table.
     */
    public $scope = \null;
    /**
     * @var bool Whether or not this cell is a header cell.
     */
    public $header = \null;
    /**
     * @var string Value to use for the style attribute of the table cell
     */
    public $style = \null;
    /**
     * @var array Attributes of additional HTML attributes for the <td> element
     */
    public $attributes = array();
    /**
     * Constructs a table cell
     *
     * @param string $text
     */
    public function __construct($text = \null)
    {
    }
}
/**
 * Component representing a paging bar.
 *
 * @copyright 2009 Nicolas Connault
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class paging_bar implements \renderable, \templatable
{
    /**
     * @var int The maximum number of pagelinks to display.
     */
    public $maxdisplay = 18;
    /**
     * @var int The total number of entries to be pages through..
     */
    public $totalcount;
    /**
     * @var int The page you are currently viewing.
     */
    public $page;
    /**
     * @var int The number of entries that should be shown per page.
     */
    public $perpage;
    /**
     * @var string|moodle_url If this  is a string then it is the url which will be appended with $pagevar,
     * an equals sign and the page number.
     * If this is a moodle_url object then the pagevar param will be replaced by
     * the page no, for each page.
     */
    public $baseurl;
    /**
     * @var string This is the variable name that you use for the pagenumber in your
     * code (ie. 'tablepage', 'blogpage', etc)
     */
    public $pagevar;
    /**
     * @var string A HTML link representing the "previous" page.
     */
    public $previouslink = \null;
    /**
     * @var string A HTML link representing the "next" page.
     */
    public $nextlink = \null;
    /**
     * @var string A HTML link representing the first page.
     */
    public $firstlink = \null;
    /**
     * @var string A HTML link representing the last page.
     */
    public $lastlink = \null;
    /**
     * @var array An array of strings. One of them is just a string: the current page
     */
    public $pagelinks = array();
    /**
     * Constructor paging_bar with only the required params.
     *
     * @param int $totalcount The total number of entries available to be paged through
     * @param int $page The page you are currently viewing
     * @param int $perpage The number of entries that should be shown per page
     * @param string|moodle_url $baseurl url of the current page, the $pagevar parameter is added
     * @param string $pagevar name of page parameter that holds the page number
     */
    public function __construct($totalcount, $page, $perpage, $baseurl, $pagevar = 'page')
    {
    }
    /**
     * Prepares the paging bar for output.
     *
     * This method validates the arguments set up for the paging bar and then
     * produces fragments of HTML to assist display later on.
     *
     * @param renderer_base $output
     * @param moodle_page $page
     * @param string $target
     * @throws coding_exception
     */
    public function prepare(\renderer_base $output, \moodle_page $page, $target)
    {
    }
    /**
     * Export for template.
     *
     * @param renderer_base $output The renderer.
     * @return stdClass
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * Component representing initials bar.
 *
 * @copyright 2017 Ilya Tregubov
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 3.3
 * @package core
 * @category output
 */
class initials_bar implements \renderable, \templatable
{
    /**
     * @var string Currently selected letter.
     */
    public $current;
    /**
     * @var string Class name to add to this initial bar.
     */
    public $class;
    /**
     * @var string The name to put in front of this initial bar.
     */
    public $title;
    /**
     * @var string URL parameter name for this initial.
     */
    public $urlvar;
    /**
     * @var string URL object.
     */
    public $url;
    /**
     * @var array An array of letters in the alphabet.
     */
    public $alpha;
    /**
     * Constructor initials_bar with only the required params.
     *
     * @param string $current the currently selected letter.
     * @param string $class class name to add to this initial bar.
     * @param string $title the name to put in front of this initial bar.
     * @param string $urlvar URL parameter name for this initial.
     * @param string $url URL object.
     * @param array $alpha of letters in the alphabet.
     */
    public function __construct($current, $class, $title, $urlvar, $url, $alpha = \null)
    {
    }
    /**
     * Export for template.
     *
     * @param renderer_base $output The renderer.
     * @return stdClass
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * This class represents how a block appears on a page.
 *
 * During output, each block instance is asked to return a block_contents object,
 * those are then passed to the $OUTPUT->block function for display.
 *
 * contents should probably be generated using a moodle_block_..._renderer.
 *
 * Other block-like things that need to appear on the page, for example the
 * add new block UI, are also represented as block_contents objects.
 *
 * @copyright 2009 Tim Hunt
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class block_contents
{
    /** Used when the block cannot be collapsed **/
    const NOT_HIDEABLE = 0;
    /** Used when the block can be collapsed but currently is not **/
    const VISIBLE = 1;
    /** Used when the block has been collapsed **/
    const HIDDEN = 2;
    /**
     * @var int Used to set $skipid.
     */
    protected static $idcounter = 1;
    /**
     * @var int All the blocks (or things that look like blocks) printed on
     * a page are given a unique number that can be used to construct id="" attributes.
     * This is set automatically be the {@link prepare()} method.
     * Do not try to set it manually.
     */
    public $skipid;
    /**
     * @var int If this is the contents of a real block, this should be set
     * to the block_instance.id. Otherwise this should be set to 0.
     */
    public $blockinstanceid = 0;
    /**
     * @var int If this is a real block instance, and there is a corresponding
     * block_position.id for the block on this page, this should be set to that id.
     * Otherwise it should be 0.
     */
    public $blockpositionid = 0;
    /**
     * @var array An array of attribute => value pairs that are put on the outer div of this
     * block. {@link $id} and {@link $classes} attributes should be set separately.
     */
    public $attributes;
    /**
     * @var string The title of this block. If this came from user input, it should already
     * have had format_string() processing done on it. This will be output inside
     * <h2> tags. Please do not cause invalid XHTML.
     */
    public $title = '';
    /**
     * @var string The label to use when the block does not, or will not have a visible title.
     * You should never set this as well as title... it will just be ignored.
     */
    public $arialabel = '';
    /**
     * @var string HTML for the content
     */
    public $content = '';
    /**
     * @var array An alternative to $content, it you want a list of things with optional icons.
     */
    public $footer = '';
    /**
     * @var string Any small print that should appear under the block to explain
     * to the teacher about the block, for example 'This is a sticky block that was
     * added in the system context.'
     */
    public $annotation = '';
    /**
     * @var int One of the constants NOT_HIDEABLE, VISIBLE, HIDDEN. Whether
     * the user can toggle whether this block is visible.
     */
    public $collapsible = self::NOT_HIDEABLE;
    /**
     * Set this to true if the block is dockable.
     * @var bool
     */
    public $dockable = \false;
    /**
     * @var array A (possibly empty) array of editing controls. Each element of
     * this array should be an array('url' => $url, 'icon' => $icon, 'caption' => $caption).
     * $icon is the icon name. Fed to $OUTPUT->image_url.
     */
    public $controls = array();
    /**
     * Create new instance of block content
     * @param array $attributes
     */
    public function __construct(array $attributes = \null)
    {
    }
    /**
     * Add html class to block
     *
     * @param string $class
     */
    public function add_class($class)
    {
    }
    /**
     * Check if the block is a fake block.
     *
     * @return boolean
     */
    public function is_fake()
    {
    }
}
/**
 * This class represents a target for where a block can go when it is being moved.
 *
 * This needs to be rendered as a form with the given hidden from fields, and
 * clicking anywhere in the form should submit it. The form action should be
 * $PAGE->url.
 *
 * @copyright 2009 Tim Hunt
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class block_move_target
{
    /**
     * @var moodle_url Move url
     */
    public $url;
    /**
     * Constructor
     * @param moodle_url $url
     */
    public function __construct(\moodle_url $url)
    {
    }
}
/**
 * Custom menu item
 *
 * This class is used to represent one item within a custom menu that may or may
 * not have children.
 *
 * @copyright 2010 Sam Hemelryk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class custom_menu_item implements \renderable, \templatable
{
    /**
     * @var string The text to show for the item
     */
    protected $text;
    /**
     * @var moodle_url The link to give the icon if it has no children
     */
    protected $url;
    /**
     * @var string A title to apply to the item. By default the text
     */
    protected $title;
    /**
     * @var int A sort order for the item, not necessary if you order things in
     * the CFG var.
     */
    protected $sort;
    /**
     * @var custom_menu_item A reference to the parent for this item or NULL if
     * it is a top level item
     */
    protected $parent;
    /**
     * @var array A array in which to store children this item has.
     */
    protected $children = array();
    /**
     * @var int A reference to the sort var of the last child that was added
     */
    protected $lastsort = 0;
    /**
     * Constructs the new custom menu item
     *
     * @param string $text
     * @param moodle_url $url A moodle url to apply as the link for this item [Optional]
     * @param string $title A title to apply to this item [Optional]
     * @param int $sort A sort or to use if we need to sort differently [Optional]
     * @param custom_menu_item $parent A reference to the parent custom_menu_item this child
     *        belongs to, only if the child has a parent. [Optional]
     */
    public function __construct($text, \moodle_url $url = \null, $title = \null, $sort = \null, \custom_menu_item $parent = \null)
    {
    }
    /**
     * Adds a custom menu item as a child of this node given its properties.
     *
     * @param string $text
     * @param moodle_url $url
     * @param string $title
     * @param int $sort
     * @return custom_menu_item
     */
    public function add($text, \moodle_url $url = \null, $title = \null, $sort = \null)
    {
    }
    /**
     * Removes a custom menu item that is a child or descendant to the current menu.
     *
     * Returns true if child was found and removed.
     *
     * @param custom_menu_item $menuitem
     * @return bool
     */
    public function remove_child(\custom_menu_item $menuitem)
    {
    }
    /**
     * Returns the text for this item
     * @return string
     */
    public function get_text()
    {
    }
    /**
     * Returns the url for this item
     * @return moodle_url
     */
    public function get_url()
    {
    }
    /**
     * Returns the title for this item
     * @return string
     */
    public function get_title()
    {
    }
    /**
     * Sorts and returns the children for this item
     * @return array
     */
    public function get_children()
    {
    }
    /**
     * Gets the sort order for this child
     * @return int
     */
    public function get_sort_order()
    {
    }
    /**
     * Gets the parent this child belong to
     * @return custom_menu_item
     */
    public function get_parent()
    {
    }
    /**
     * Sorts the children this item has
     */
    public function sort()
    {
    }
    /**
     * Returns true if this item has any children
     * @return bool
     */
    public function has_children()
    {
    }
    /**
     * Sets the text for the node
     * @param string $text
     */
    public function set_text($text)
    {
    }
    /**
     * Sets the title for the node
     * @param string $title
     */
    public function set_title($title)
    {
    }
    /**
     * Sets the url for the node
     * @param moodle_url $url
     */
    public function set_url(\moodle_url $url)
    {
    }
    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return array
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * Custom menu class
 *
 * This class is used to operate a custom menu that can be rendered for the page.
 * The custom menu is built using $CFG->custommenuitems and is a structured collection
 * of custom_menu_item nodes that can be rendered by the core renderer.
 *
 * To configure the custom menu:
 *     Settings: Administration > Appearance > Themes > Theme settings
 *
 * @copyright 2010 Sam Hemelryk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category output
 */
class custom_menu extends \custom_menu_item
{
    /**
     * @var string The language we should render for, null disables multilang support.
     */
    protected $currentlanguage = \null;
    /**
     * Creates the custom menu
     *
     * @param string $definition the menu items definition in syntax required by {@link convert_text_to_menu_nodes()}
     * @param string $currentlanguage the current language code, null disables multilang support
     */
    public function __construct($definition = '', $currentlanguage = \null)
    {
    }
    /**
     * Overrides the children of this custom menu. Useful when getting children
     * from $CFG->custommenuitems
     *
     * @param array $children
     */
    public function override_children(array $children)
    {
    }
    /**
     * Converts a string into a structured array of custom_menu_items which can
     * then be added to a custom menu.
     *
     * Structure:
     *     text|url|title|langs
     * The number of hyphens at the start determines the depth of the item. The
     * languages are optional, comma separated list of languages the line is for.
     *
     * Example structure:
     *     First level first item|http://www.moodle.com/
     *     -Second level first item|http://www.moodle.com/partners/
     *     -Second level second item|http://www.moodle.com/hq/
     *     --Third level first item|http://www.moodle.com/jobs/
     *     -Second level third item|http://www.moodle.com/development/
     *     First level second item|http://www.moodle.com/feedback/
     *     First level third item
     *     English only|http://moodle.com|English only item|en
     *     German only|http://moodle.de|Deutsch|de,de_du,de_kids
     *
     *
     * @static
     * @param string $text the menu items definition
     * @param string $language the language code, null disables multilang support
     * @return array
     */
    public static function convert_text_to_menu_nodes($text, $language = \null)
    {
    }
    /**
     * Sorts two custom menu items
     *
     * This function is designed to be used with the usort method
     *     usort($this->children, array('custom_menu','sort_custom_menu_items'));
     *
     * @static
     * @param custom_menu_item $itema
     * @param custom_menu_item $itemb
     * @return int
     */
    public static function sort_custom_menu_items(\custom_menu_item $itema, \custom_menu_item $itemb)
    {
    }
}
/**
 * Stores one tab
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package core
 */
class tabobject implements \renderable, \templatable
{
    /** @var string unique id of the tab in this tree, it is used to find selected and/or inactive tabs */
    var $id;
    /** @var moodle_url|string link */
    var $link;
    /** @var string text on the tab */
    var $text;
    /** @var string title under the link, by defaul equals to text */
    var $title;
    /** @var bool whether to display a link under the tab name when it's selected */
    var $linkedwhenselected = \false;
    /** @var bool whether the tab is inactive */
    var $inactive = \false;
    /** @var bool indicates that this tab's child is selected */
    var $activated = \false;
    /** @var bool indicates that this tab is selected */
    var $selected = \false;
    /** @var array stores children tabobjects */
    var $subtree = array();
    /** @var int level of tab in the tree, 0 for root (instance of tabtree), 1 for the first row of tabs */
    var $level = 1;
    /**
     * Constructor
     *
     * @param string $id unique id of the tab in this tree, it is used to find selected and/or inactive tabs
     * @param string|moodle_url $link
     * @param string $text text on the tab
     * @param string $title title under the link, by defaul equals to text
     * @param bool $linkedwhenselected whether to display a link under the tab name when it's selected
     */
    public function __construct($id, $link = \null, $text = '', $title = '', $linkedwhenselected = \false)
    {
    }
    /**
     * Travels through tree and finds the tab to mark as selected, all parents are automatically marked as activated
     *
     * @param string $selected the id of the selected tab (whatever row it's on),
     *    if null marks all tabs as unselected
     * @return bool whether this tab is selected or contains selected tab in its subtree
     */
    protected function set_selected($selected)
    {
    }
    /**
     * Travels through tree and finds a tab with specified id
     *
     * @param string $id
     * @return tabtree|null
     */
    public function find($id)
    {
    }
    /**
     * Allows to mark each tab's level in the tree before rendering.
     *
     * @param int $level
     */
    protected function set_level($level)
    {
    }
    /**
     * Export for template.
     *
     * @param renderer_base $output Renderer.
     * @return object
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * Renderable for the main page header.
 *
 * @package core
 * @category output
 * @since 2.9
 * @copyright 2015 Adrian Greeve <adrian@moodle.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class context_header implements \renderable
{
    /**
     * @var string $heading Main heading.
     */
    public $heading;
    /**
     * @var int $headinglevel Main heading 'h' tag level.
     */
    public $headinglevel;
    /**
     * @var string|null $imagedata HTML code for the picture in the page header.
     */
    public $imagedata;
    /**
     * @var array $additionalbuttons Additional buttons for the header e.g. Messaging button for the user header.
     *      array elements - title => alternate text for the image, or if no image is available the button text.
     *                       url => Link for the button to head to. Should be a moodle_url.
     *                       image => location to the image, or name of the image in /pix/t/{image name}.
     *                       linkattributes => additional attributes for the <a href> element.
     *                       page => page object. Don't include if the image is an external image.
     */
    public $additionalbuttons;
    /**
     * Constructor.
     *
     * @param string $heading Main heading data.
     * @param int $headinglevel Main heading 'h' tag level.
     * @param string|null $imagedata HTML code for the picture in the page header.
     * @param string $additionalbuttons Buttons for the header e.g. Messaging button for the user header.
     */
    public function __construct($heading = \null, $headinglevel = 1, $imagedata = \null, $additionalbuttons = \null)
    {
    }
    /**
     * Adds an array element for a formatted image.
     */
    protected function format_button_images()
    {
    }
}
/**
 * Stores tabs list
 *
 * Example how to print a single line tabs:
 * $rows = array(
 *    new tabobject(...),
 *    new tabobject(...)
 * );
 * echo $OUTPUT->tabtree($rows, $selectedid);
 *
 * Multiple row tabs may not look good on some devices but if you want to use them
 * you can specify ->subtree for the active tabobject.
 *
 * @copyright 2013 Marina Glancy
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.5
 * @package core
 * @category output
 */
class tabtree extends \tabobject
{
    /**
     * Constuctor
     *
     * It is highly recommended to call constructor when list of tabs is already
     * populated, this way you ensure that selected and inactive tabs are located
     * and attribute level is set correctly.
     *
     * @param array $tabs array of tabs, each of them may have it's own ->subtree
     * @param string|null $selected which tab to mark as selected, all parent tabs will
     *     automatically be marked as activated
     * @param array|string|null $inactive list of ids of inactive tabs, regardless of
     *     their level. Note that you can as weel specify tabobject::$inactive for separate instances
     */
    public function __construct($tabs, $selected = \null, $inactive = \null)
    {
    }
    /**
     * Export for template.
     *
     * @param renderer_base $output Renderer.
     * @return object
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * An action menu.
 *
 * This action menu component takes a series of primary and secondary actions.
 * The primary actions are displayed permanently and the secondary attributes are displayed within a drop
 * down menu.
 *
 * @package core
 * @category output
 * @copyright 2013 Sam Hemelryk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class action_menu implements \renderable, \templatable
{
    /**
     * Top right alignment.
     */
    const TL = 1;
    /**
     * Top right alignment.
     */
    const TR = 2;
    /**
     * Top right alignment.
     */
    const BL = 3;
    /**
     * Top right alignment.
     */
    const BR = 4;
    /**
     * The instance number. This is unique to this instance of the action menu.
     * @var int
     */
    protected $instance = 0;
    /**
     * An array of primary actions. Please use {@link action_menu::add_primary_action()} to add actions.
     * @var array
     */
    protected $primaryactions = array();
    /**
     * An array of secondary actions. Please use {@link action_menu::add_secondary_action()} to add actions.
     * @var array
     */
    protected $secondaryactions = array();
    /**
     * An array of attributes added to the container of the action menu.
     * Initialised with defaults during construction.
     * @var array
     */
    public $attributes = array();
    /**
     * An array of attributes added to the container of the primary actions.
     * Initialised with defaults during construction.
     * @var array
     */
    public $attributesprimary = array();
    /**
     * An array of attributes added to the container of the secondary actions.
     * Initialised with defaults during construction.
     * @var array
     */
    public $attributessecondary = array();
    /**
     * The string to use next to the icon for the action icon relating to the secondary (dropdown) menu.
     * @var array
     */
    public $actiontext = \null;
    /**
     * The string to use for the accessible label for the menu.
     * @var array
     */
    public $actionlabel = \null;
    /**
     * An icon to use for the toggling the secondary menu (dropdown).
     * @var pix_icon
     */
    public $actionicon;
    /**
     * Any text to use for the toggling the secondary menu (dropdown).
     * @var string
     */
    public $menutrigger = '';
    /**
     * Any extra classes for toggling to the secondary menu.
     * @var string
     */
    public $triggerextraclasses = '';
    /**
     * Place the action menu before all other actions.
     * @var bool
     */
    public $prioritise = \false;
    /**
     * Constructs the action menu with the given items.
     *
     * @param array $actions An array of actions (action_menu_link|pix_icon|string).
     */
    public function __construct(array $actions = array())
    {
    }
    /**
     * Sets the label for the menu trigger.
     *
     * @param string $label The text
     */
    public function set_action_label($label)
    {
    }
    /**
     * Sets the menu trigger text.
     *
     * @param string $trigger The text
     * @param string $extraclasses Extra classes to style the secondary menu toggle.
     */
    public function set_menu_trigger($trigger, $extraclasses = '')
    {
    }
    /**
     * Return true if there is at least one visible link in the menu.
     *
     * @return bool
     */
    public function is_empty()
    {
    }
    /**
     * Initialises JS required fore the action menu.
     * The JS is only required once as it manages all action menu's on the page.
     *
     * @param moodle_page $page
     */
    public function initialise_js(\moodle_page $page)
    {
    }
    /**
     * Adds an action to this action menu.
     *
     * @param action_menu_link|pix_icon|string $action
     */
    public function add($action)
    {
    }
    /**
     * Adds a primary action to the action menu.
     *
     * @param action_menu_link|action_link|pix_icon|string $action
     */
    public function add_primary_action($action)
    {
    }
    /**
     * Adds a secondary action to the action menu.
     *
     * @param action_link|pix_icon|string $action
     */
    public function add_secondary_action($action)
    {
    }
    /**
     * Returns the primary actions ready to be rendered.
     *
     * @param core_renderer $output The renderer to use for getting icons.
     * @return array
     */
    public function get_primary_actions(\core_renderer $output = \null)
    {
    }
    /**
     * Returns the secondary actions ready to be rendered.
     * @return array
     */
    public function get_secondary_actions()
    {
    }
    /**
     * Sets the selector that should be used to find the owning node of this menu.
     * @param string $selector A CSS/YUI selector to identify the owner of the menu.
     */
    public function set_owner_selector($selector)
    {
    }
    /**
     * Sets the alignment of the dialogue in relation to button used to toggle it.
     *
     * @param int $dialogue One of action_menu::TL, action_menu::TR, action_menu::BL, action_menu::BR.
     * @param int $button One of action_menu::TL, action_menu::TR, action_menu::BL, action_menu::BR.
     */
    public function set_alignment($dialogue, $button)
    {
    }
    /**
     * Returns a string to describe the alignment.
     *
     * @param int $align One of action_menu::TL, action_menu::TR, action_menu::BL, action_menu::BR.
     * @return string
     */
    protected function get_align_string($align)
    {
    }
    /**
     * Sets a constraint for the dialogue.
     *
     * The constraint is applied when the dialogue is shown and limits the display of the dialogue to within the
     * element the constraint identifies.
     *
     * This is required whenever the action menu is displayed inside any CSS element with the .no-overflow class
     * (flexible_table and any of it's child classes are a likely candidate).
     *
     * @param string $ancestorselector A snippet of CSS used to identify the ancestor to contrain the dialogue to.
     */
    public function set_constraint($ancestorselector)
    {
    }
    /**
     * If you call this method the action menu will be displayed but will not be enhanced.
     *
     * By not displaying the menu enhanced all items will be displayed in a single row.
     *
     * @deprecated since Moodle 3.2
     */
    public function do_not_enhance()
    {
    }
    /**
     * Returns true if this action menu will be enhanced.
     *
     * @return bool
     */
    public function will_be_enhanced()
    {
    }
    /**
     * Sets nowrap on items. If true menu items should not wrap lines if they are longer than the available space.
     *
     * This property can be useful when the action menu is displayed within a parent element that is either floated
     * or relatively positioned.
     * In that situation the width of the menu is determined by the width of the parent element which may not be large
     * enough for the menu items without them wrapping.
     * This disables the wrapping so that the menu takes on the width of the longest item.
     *
     * @param bool $value If true nowrap gets set, if false it gets removed. Defaults to true.
     */
    public function set_nowrap_on_items($value = \true)
    {
    }
    /**
     * Export for template.
     *
     * @param renderer_base $output The renderer.
     * @return stdClass
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * An action menu filler
 *
 * @package core
 * @category output
 * @copyright 2013 Andrew Nicols
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class action_menu_filler extends \action_link implements \renderable
{
    /**
     * True if this is a primary action. False if not.
     * @var bool
     */
    public $primary = \true;
    /**
     * Constructs the object.
     */
    public function __construct()
    {
    }
}
/**
 * An action menu action
 *
 * @package core
 * @category output
 * @copyright 2013 Sam Hemelryk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class action_menu_link extends \action_link implements \renderable
{
    /**
     * True if this is a primary action. False if not.
     * @var bool
     */
    public $primary = \true;
    /**
     * The action menu this link has been added to.
     * @var action_menu
     */
    public $actionmenu = \null;
    /**
     * The number of instances of this action menu link (and its subclasses).
     * @var int
     */
    protected static $instance = 1;
    /**
     * Constructs the object.
     *
     * @param moodle_url $url The URL for the action.
     * @param pix_icon $icon The icon to represent the action.
     * @param string $text The text to represent the action.
     * @param bool $primary Whether this is a primary action or not.
     * @param array $attributes Any attribtues associated with the action.
     */
    public function __construct(\moodle_url $url, \pix_icon $icon = \null, $text, $primary = \true, array $attributes = array())
    {
    }
    /**
     * Export for template.
     *
     * @param renderer_base $output The renderer.
     * @return stdClass
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * A primary action menu action
 *
 * @package core
 * @category output
 * @copyright 2013 Sam Hemelryk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class action_menu_link_primary extends \action_menu_link
{
    /**
     * Constructs the object.
     *
     * @param moodle_url $url
     * @param pix_icon $icon
     * @param string $text
     * @param array $attributes
     */
    public function __construct(\moodle_url $url, \pix_icon $icon = \null, $text, array $attributes = array())
    {
    }
}
/**
 * A secondary action menu action
 *
 * @package core
 * @category output
 * @copyright 2013 Sam Hemelryk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class action_menu_link_secondary extends \action_menu_link
{
    /**
     * Constructs the object.
     *
     * @param moodle_url $url
     * @param pix_icon $icon
     * @param string $text
     * @param array $attributes
     */
    public function __construct(\moodle_url $url, \pix_icon $icon = \null, $text, array $attributes = array())
    {
    }
}
/**
 * Represents a set of preferences groups.
 *
 * @package core
 * @category output
 * @copyright 2015 Frédéric Massart - FMCorz.net
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class preferences_groups implements \renderable
{
    /**
     * Array of preferences_group.
     * @var array
     */
    public $groups;
    /**
     * Constructor.
     * @param array $groups of preferences_group
     */
    public function __construct($groups)
    {
    }
}
/**
 * Represents a group of preferences page link.
 *
 * @package core
 * @category output
 * @copyright 2015 Frédéric Massart - FMCorz.net
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class preferences_group implements \renderable
{
    /**
     * Title of the group.
     * @var string
     */
    public $title;
    /**
     * Array of navigation_node.
     * @var array
     */
    public $nodes;
    /**
     * Constructor.
     * @param string $title The title.
     * @param array $nodes of navigation_node.
     */
    public function __construct($title, $nodes)
    {
    }
}
/**
 * Progress bar class.
 *
 * Manages the display of a progress bar.
 *
 * To use this class.
 * - construct
 * - call create (or use the 3rd param to the constructor)
 * - call update or update_full() or update() repeatedly
 *
 * @copyright 2008 jamiesensei
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package core
 * @category output
 */
class progress_bar implements \renderable, \templatable
{
    /** @var string html id */
    private $html_id;
    /** @var int total width */
    private $width;
    /** @var int last percentage printed */
    private $percent = 0;
    /** @var int time when last printed */
    private $lastupdate = 0;
    /** @var int when did we start printing this */
    private $time_start = 0;
    /**
     * Constructor
     *
     * Prints JS code if $autostart true.
     *
     * @param string $htmlid The container ID.
     * @param int $width The suggested width.
     * @param bool $autostart Whether to start the progress bar right away.
     */
    public function __construct($htmlid = '', $width = 500, $autostart = \false)
    {
    }
    /**
     * Getter for ID
     * @return string id
     */
    public function get_id() : string
    {
    }
    /**
     * Create a new progress bar, this function will output html.
     *
     * @return void Echo's output
     */
    public function create()
    {
    }
    /**
     * Update the progress bar.
     *
     * @param int $percent From 1-100.
     * @param string $msg The message.
     * @return void Echo's output
     * @throws coding_exception
     */
    private function _update($percent, $msg)
    {
    }
    /**
     * Estimate how much time it is going to take.
     *
     * @param int $pt From 1-100.
     * @return mixed Null (unknown), or int.
     */
    private function estimate($pt)
    {
    }
    /**
     * Update progress bar according percent.
     *
     * @param int $percent From 1-100.
     * @param string $msg The message needed to be shown.
     */
    public function update_full($percent, $msg)
    {
    }
    /**
     * Update progress bar according the number of tasks.
     *
     * @param int $cur Current task number.
     * @param int $total Total task number.
     * @param string $msg The message needed to be shown.
     */
    public function update($cur, $total, $msg)
    {
    }
    /**
     * Restart the progress bar.
     */
    public function restart()
    {
    }
    /**
     * Export for template.
     *
     * @param  renderer_base $output The renderer.
     * @return array
     */
    public function export_for_template(\renderer_base $output)
    {
    }
}
/**
 * $PAGE is a central store of information about the current page we are
 * generating in response to the user's request.
 *
 * It does not do very much itself
 * except keep track of information, however, it serves as the access point to
 * some more significant components like $PAGE->theme, $PAGE->requires,
 * $PAGE->blocks, etc.
 *
 * @copyright 2009 Tim Hunt
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 2.0
 * @package core
 * @category page
 *
 * The following properties are alphabetical. Please keep it that way so that its
 * easy to maintain.
 *
 * @property-read string $activityname The type of activity we are in, for example 'forum' or 'quiz'.
 *      Will be null if this page is not within a module.
 * @property-read stdClass $activityrecord The row from the activities own database table (for example
 *      the forum or quiz table) that this page belongs to. Will be null
 *      if this page is not within a module.
 * @property-read array $alternativeversions Mime type => object with ->url and ->title.
 * @property-read block_manager $blocks The blocks manager object for this page.
 * @property-read array $blockmanipulations
 * @property-read string $bodyclasses A string to use within the class attribute on the body tag.
 * @property-read string $bodyid A string to use as the id of the body tag.
 * @property-read string $button The HTML to go where the Turn editing on button normally goes.
 * @property-read bool $cacheable Defaults to true. Set to false to stop the page being cached at all.
 * @property-read array $categories An array of all the categories the page course belongs to,
 *      starting with the immediately containing category, and working out to
 *      the top-level category. This may be the empty array if we are in the
 *      front page course.
 * @property-read mixed $category The category that the page course belongs to.
 * @property-read cm_info $cm The course_module that this page belongs to. Will be null
 *      if this page is not within a module. This is a full cm object, as loaded
 *      by get_coursemodule_from_id or get_coursemodule_from_instance,
 *      so the extra modname and name fields are present.
 * @property-read context $context The main context to which this page belongs.
 * @property-read stdClass $course The current course that we are inside - a row from the
 *      course table. (Also available as $COURSE global.) If we are not inside
 *      an actual course, this will be the site course.
 * @property-read string $devicetypeinuse The name of the device type in use
 * @property-read string $docspath The path to the Moodle docs for this page.
 * @property-read string $focuscontrol The id of the HTML element to be focused when the page has loaded.
 * @property-read bool $headerprinted True if the page header has already been printed.
 * @property-read string $heading The main heading that should be displayed at the top of the <body>.
 * @property-read string $headingmenu The menu (or actions) to display in the heading
 * @property-read array $layout_options An arrays with options for the layout file.
 * @property-read array $legacythemeinuse True if the legacy browser theme is in use.
 * @property-read navbar $navbar The navbar object used to display the navbar
 * @property-read global_navigation $navigation The navigation structure for this page.
 * @property-read xhtml_container_stack $opencontainers Tracks XHTML tags on this page that have been opened but not closed.
 *      mainly for internal use by the rendering code.
 * @property-read string $pagelayout The general type of page this is. For example 'normal', 'popup', 'home'.
 *      Allows the theme to display things differently, if it wishes to.
 * @property-read string $pagetype The page type string, should be used as the id for the body tag in the theme.
 * @property-read int $periodicrefreshdelay The periodic refresh delay to use with meta refresh
 * @property-read page_requirements_manager $requires Tracks the JavaScript, CSS files, etc. required by this page.
 * @property-read string $requestip The IP address of the current request, null if unknown.
 * @property-read string $requestorigin The type of request 'web', 'ws', 'cli', 'restore', etc.
 * @property-read settings_navigation $settingsnav The settings navigation
 * @property-read int $state One of the STATE_... constants
 * @property-read string $subpage The subpage identifier, if any.
 * @property-read theme_config $theme The theme for this page.
 * @property-read string $title The title that should go in the <head> section of the HTML of this page.
 * @property-read moodle_url $url The moodle url object for this page.
 */
class moodle_page
{
    /** The state of the page before it has printed the header **/
    const STATE_BEFORE_HEADER = 0;
    /** The state the page is in temporarily while the header is being printed **/
    const STATE_PRINTING_HEADER = 1;
    /** The state the page is in while content is presumably being printed **/
    const STATE_IN_BODY = 2;
    /**
     * The state the page is when the footer has been printed and its function is
     * complete.
     */
    const STATE_DONE = 3;
    /**
     * @var int The current state of the page. The state a page is within
     * determines what actions are possible for it.
     */
    protected $_state = self::STATE_BEFORE_HEADER;
    /**
     * @var stdClass The course currently associated with this page.
     * If not has been provided the front page course is used.
     */
    protected $_course = \null;
    /**
     * @var cm_info If this page belongs to a module, this is the cm_info module
     * description object.
     */
    protected $_cm = \null;
    /**
     * @var stdClass If $_cm is not null, then this will hold the corresponding
     * row from the modname table. For example, if $_cm->modname is 'quiz', this
     * will be a row from the quiz table.
     */
    protected $_module = \null;
    /**
     * @var context The context that this page belongs to.
     */
    protected $_context = \null;
    /**
     * @var array This holds any categories that $_course belongs to, starting with the
     * particular category it belongs to, and working out through any parent
     * categories to the top level. These are loaded progressively, if needed.
     * There are three states. $_categories = null initially when nothing is
     * loaded; $_categories = array($id => $cat, $parentid => null) when we have
     * loaded $_course->category, but not any parents; and a complete array once
     * everything is loaded.
     */
    protected $_categories = \null;
    /**
     * @var array An array of CSS classes that should be added to the body tag in HTML.
     */
    protected $_bodyclasses = array();
    /**
     * @var string The title for the page. Used within the title tag in the HTML head.
     */
    protected $_title = '';
    /**
     * @var string The string to use as the heading of the page. Shown near the top of the
     * page within most themes.
     */
    protected $_heading = '';
    /**
     * @var string The pagetype is used to describe the page and defaults to a representation
     * of the physical path to the page e.g. my-index, mod-quiz-attempt
     */
    protected $_pagetype = \null;
    /**
     * @var string The pagelayout to use when displaying this page. The
     * pagelayout needs to have been defined by the theme in use, or one of its
     * parents. By default base is used however standard is the more common layout.
     * Note that this gets automatically set by core during operations like
     * require_login.
     */
    protected $_pagelayout = 'base';
    /**
     * @var array List of theme layout options, these are ignored by core.
     * To be used in individual theme layout files only.
     */
    protected $_layout_options = \null;
    /**
     * @var string An optional arbitrary parameter that can be set on pages where the context
     * and pagetype is not enough to identify the page.
     */
    protected $_subpage = '';
    /**
     * @var string Set a different path to use for the 'Moodle docs for this page' link.
     * By default, it uses the path of the file for instance mod/quiz/attempt.
     */
    protected $_docspath = \null;
    /**
     * @var string A legacy class that will be added to the body tag
     */
    protected $_legacyclass = \null;
    /**
     * @var moodle_url The URL for this page. This is mandatory and must be set
     * before output is started.
     */
    protected $_url = \null;
    /**
     * @var array An array of links to alternative versions of this page.
     * Primarily used for RSS versions of the current page.
     */
    protected $_alternateversions = array();
    /**
     * @var block_manager The blocks manager for this page. It is responsible for
     * the blocks and there content on this page.
     */
    protected $_blocks = \null;
    /**
     * @var page_requirements_manager Page requirements manager. It is responsible
     * for all JavaScript and CSS resources required by this page.
     */
    protected $_requires = \null;
    /** @var page_requirements_manager Saves the requirement manager object used before switching to to fragments one. */
    protected $savedrequires = \null;
    /**
     * @var string The capability required by the user in order to edit blocks
     * and block settings on this page.
     */
    protected $_blockseditingcap = 'moodle/site:manageblocks';
    /**
     * @var bool An internal flag to record when block actions have been processed.
     * Remember block actions occur on the current URL and it is important that
     * even they are never executed more than once.
     */
    protected $_block_actions_done = \false;
    /**
     * @var array An array of any other capabilities the current user must have
     * in order to editing the page and/or its content (not just blocks).
     */
    protected $_othereditingcaps = array();
    /**
     * @var bool Sets whether this page should be cached by the browser or not.
     * If it is set to true (default) the page is served with caching headers.
     */
    protected $_cacheable = \true;
    /**
     * @var string Can be set to the ID of an element on the page, if done that
     * element receives focus when the page loads.
     */
    protected $_focuscontrol = '';
    /**
     * @var string HTML to go where the turn on editing button is located. This
     * is nearly a legacy item and not used very often any more.
     */
    protected $_button = '';
    /**
     * @var theme_config The theme to use with this page. This has to be properly
     * initialised via {@link moodle_page::initialise_theme_and_output()} which
     * happens magically before any operation that requires it.
     */
    protected $_theme = \null;
    /**
     * @var global_navigation Contains the global navigation structure.
     */
    protected $_navigation = \null;
    /**
     * @var settings_navigation Contains the settings navigation structure.
     */
    protected $_settingsnav = \null;
    /**
     * @var flat_navigation Contains a list of nav nodes, most closely related to the current page.
     */
    protected $_flatnav = \null;
    /**
     * @var navbar Contains the navbar structure.
     */
    protected $_navbar = \null;
    /**
     * @var string The menu (or actions) to display in the heading.
     */
    protected $_headingmenu = \null;
    /**
     * @var array stack trace. Then the theme is initialised, we save the stack
     * trace, for use in error messages.
     */
    protected $_wherethemewasinitialised = \null;
    /**
     * @var xhtml_container_stack Tracks XHTML tags on this page that have been
     * opened but not closed.
     */
    protected $_opencontainers;
    /**
     * @var int Sets the page to refresh after a given delay (in seconds) using
     * meta refresh in {@link standard_head_html()} in outputlib.php
     * If set to null(default) the page is not refreshed
     */
    protected $_periodicrefreshdelay = \null;
    /**
     * @var array Associative array of browser shortnames (as used by check_browser_version)
     * and their minimum required versions
     */
    protected $_legacybrowsers = array('MSIE' => 6.0);
    /**
     * @var string Is set to the name of the device type in use.
     * This will we worked out when it is first used.
     */
    protected $_devicetypeinuse = \null;
    /**
     * @var bool Used to determine if HTTPS should be required for login.
     */
    protected $_https_login_required = \false;
    /**
     * @var bool Determines if popup notifications allowed on this page.
     * Code such as the quiz module disables popup notifications in situations
     * such as upgrading or completing a quiz.
     */
    protected $_popup_notification_allowed = \true;
    /**
     * @var bool Is the settings menu being forced to display on this page (activities / resources only).
     * This is only used by themes that use the settings menu.
     */
    protected $_forcesettingsmenu = \false;
    /**
     * @var array Array of header actions HTML to add to the page header actions menu.
     */
    protected $_headeractions = [];
    /**
     * @var bool Should the region main settings menu be rendered in the header.
     */
    protected $_regionmainsettingsinheader = \false;
    /**
     * Force the settings menu to be displayed on this page. This will only force the
     * settings menu on an activity / resource page that is being displayed on a theme that
     * uses a settings menu.
     *
     * @param bool $forced default of true, can be sent false to turn off the force.
     */
    public function force_settings_menu($forced = \true)
    {
    }
    /**
     * Check to see if the settings menu is forced to display on this activity / resource page.
     * This only applies to themes that use the settings menu.
     *
     * @return bool True if the settings menu is forced to display.
     */
    public function is_settings_menu_forced()
    {
    }
    // Magic getter methods =============================================================
    // Due to the __get magic below, you normally do not call these as $PAGE->magic_get_x
    // methods, but instead use the $PAGE->x syntax.
    /**
     * Please do not call this method directly, use the ->state syntax. {@link moodle_page::__get()}.
     * @return integer one of the STATE_XXX constants. You should not normally need
     * to use this in your code. It is intended for internal use by this class
     * and its friends like print_header, to check that everything is working as
     * expected. Also accessible as $PAGE->state.
     */
    protected function magic_get_state()
    {
    }
    /**
     * Please do not call this method directly, use the ->headerprinted syntax. {@link moodle_page::__get()}.
     * @return bool has the header already been printed?
     */
    protected function magic_get_headerprinted()
    {
    }
    /**
     * Please do not call this method directly, use the ->course syntax. {@link moodle_page::__get()}.
     * @return stdClass the current course that we are inside - a row from the
     * course table. (Also available as $COURSE global.) If we are not inside
     * an actual course, this will be the site course.
     */
    protected function magic_get_course()
    {
    }
    /**
     * Please do not call this method directly, use the ->cm syntax. {@link moodle_page::__get()}.
     * @return cm_info the course_module that this page belongs to. Will be null
     * if this page is not within a module. This is a full cm object, as loaded
     * by get_coursemodule_from_id or get_coursemodule_from_instance,
     * so the extra modname and name fields are present.
     */
    protected function magic_get_cm()
    {
    }
    /**
     * Please do not call this method directly, use the ->activityrecord syntax. {@link moodle_page::__get()}.
     * @return stdClass the row from the activities own database table (for example
     * the forum or quiz table) that this page belongs to. Will be null
     * if this page is not within a module.
     */
    protected function magic_get_activityrecord()
    {
    }
    /**
     * Please do not call this method directly, use the ->activityname syntax. {@link moodle_page::__get()}.
     * @return string the The type of activity we are in, for example 'forum' or 'quiz'.
     * Will be null if this page is not within a module.
     */
    protected function magic_get_activityname()
    {
    }
    /**
     * Please do not call this method directly, use the ->category syntax. {@link moodle_page::__get()}.
     * @return stdClass the category that the page course belongs to. If there isn't one
     * (that is, if this is the front page course) returns null.
     */
    protected function magic_get_category()
    {
    }
    /**
     * Please do not call this method directly, use the ->categories syntax. {@link moodle_page::__get()}.
     * @return array an array of all the categories the page course belongs to,
     * starting with the immediately containing category, and working out to
     * the top-level category. This may be the empty array if we are in the
     * front page course.
     */
    protected function magic_get_categories()
    {
    }
    /**
     * Please do not call this method directly, use the ->context syntax. {@link moodle_page::__get()}.
     * @return context the main context to which this page belongs.
     */
    protected function magic_get_context()
    {
    }
    /**
     * Please do not call this method directly, use the ->pagetype syntax. {@link moodle_page::__get()}.
     * @return string e.g. 'my-index' or 'mod-quiz-attempt'.
     */
    protected function magic_get_pagetype()
    {
    }
    /**
     * Please do not call this method directly, use the ->pagetype syntax. {@link moodle_page::__get()}.
     * @return string The id to use on the body tag, uses {@link magic_get_pagetype()}.
     */
    protected function magic_get_bodyid()
    {
    }
    /**
     * Please do not call this method directly, use the ->pagelayout syntax. {@link moodle_page::__get()}.
     * @return string the general type of page this is. For example 'standard', 'popup', 'home'.
     *      Allows the theme to display things differently, if it wishes to.
     */
    protected function magic_get_pagelayout()
    {
    }
    /**
     * Please do not call this method directly, use the ->layout_options syntax. {@link moodle_page::__get()}.
     * @return array returns arrays with options for layout file
     */
    protected function magic_get_layout_options()
    {
    }
    /**
     * Please do not call this method directly, use the ->subpage syntax. {@link moodle_page::__get()}.
     * @return string The subpage identifier, if any.
     */
    protected function magic_get_subpage()
    {
    }
    /**
     * Please do not call this method directly, use the ->bodyclasses syntax. {@link moodle_page::__get()}.
     * @return string the class names to put on the body element in the HTML.
     */
    protected function magic_get_bodyclasses()
    {
    }
    /**
     * Please do not call this method directly, use the ->title syntax. {@link moodle_page::__get()}.
     * @return string the title that should go in the <head> section of the HTML of this page.
     */
    protected function magic_get_title()
    {
    }
    /**
     * Please do not call this method directly, use the ->heading syntax. {@link moodle_page::__get()}.
     * @return string the main heading that should be displayed at the top of the <body>.
     */
    protected function magic_get_heading()
    {
    }
    /**
     * Please do not call this method directly, use the ->heading syntax. {@link moodle_page::__get()}.
     * @return string The menu (or actions) to display in the heading
     */
    protected function magic_get_headingmenu()
    {
    }
    /**
     * Please do not call this method directly, use the ->docspath syntax. {@link moodle_page::__get()}.
     * @return string the path to the Moodle docs for this page.
     */
    protected function magic_get_docspath()
    {
    }
    /**
     * Please do not call this method directly, use the ->url syntax. {@link moodle_page::__get()}.
     * @return moodle_url the clean URL required to load the current page. (You
     * should normally use this in preference to $ME or $FULLME.)
     */
    protected function magic_get_url()
    {
    }
    /**
     * The list of alternate versions of this page.
     * @return array mime type => object with ->url and ->title.
     */
    protected function magic_get_alternateversions()
    {
    }
    /**
     * Please do not call this method directly, use the ->blocks syntax. {@link moodle_page::__get()}.
     * @return block_manager the blocks manager object for this page.
     */
    protected function magic_get_blocks()
    {
    }
    /**
     * Please do not call this method directly, use the ->requires syntax. {@link moodle_page::__get()}.
     * @return page_requirements_manager tracks the JavaScript, CSS files, etc. required by this page.
     */
    protected function magic_get_requires()
    {
    }
    /**
     * Please do not call this method directly, use the ->cacheable syntax. {@link moodle_page::__get()}.
     * @return bool can this page be cached by the user's browser.
     */
    protected function magic_get_cacheable()
    {
    }
    /**
     * Please do not call this method directly, use the ->focuscontrol syntax. {@link moodle_page::__get()}.
     * @return string the id of the HTML element to be focused when the page has loaded.
     */
    protected function magic_get_focuscontrol()
    {
    }
    /**
     * Please do not call this method directly, use the ->button syntax. {@link moodle_page::__get()}.
     * @return string the HTML to go where the Turn editing on button normally goes.
     */
    protected function magic_get_button()
    {
    }
    /**
     * Please do not call this method directly, use the ->theme syntax. {@link moodle_page::__get()}.
     * @return theme_config the initialised theme for this page.
     */
    protected function magic_get_theme()
    {
    }
    /**
     * Returns an array of minipulations or false if there are none to make.
     *
     * @since Moodle 2.5.1 2.6
     * @return bool|array
     */
    protected function magic_get_blockmanipulations()
    {
    }
    /**
     * Please do not call this method directly, use the ->devicetypeinuse syntax. {@link moodle_page::__get()}.
     * @return string The device type being used.
     */
    protected function magic_get_devicetypeinuse()
    {
    }
    /**
     * Please do not call this method directly use the ->periodicrefreshdelay syntax
     * {@link moodle_page::__get()}
     * @return int The periodic refresh delay to use with meta refresh
     */
    protected function magic_get_periodicrefreshdelay()
    {
    }
    /**
     * Please do not call this method directly use the ->opencontainers syntax. {@link moodle_page::__get()}
     * @return xhtml_container_stack tracks XHTML tags on this page that have been opened but not closed.
     *      mainly for internal use by the rendering code.
     */
    protected function magic_get_opencontainers()
    {
    }
    /**
     * Return the navigation object
     * @return global_navigation
     */
    protected function magic_get_navigation()
    {
    }
    /**
     * Return a navbar object
     * @return navbar
     */
    protected function magic_get_navbar()
    {
    }
    /**
     * Returns the settings navigation object
     * @return settings_navigation
     */
    protected function magic_get_settingsnav()
    {
    }
    /**
     * Returns the flat navigation object
     * @return flat_navigation
     */
    protected function magic_get_flatnav()
    {
    }
    /**
     * Returns request IP address.
     *
     * @return string IP address or null if unknown
     */
    protected function magic_get_requestip()
    {
    }
    /**
     * Returns the origin of current request.
     *
     * Note: constants are not required because we need to use these values in logging and reports.
     *
     * @return string 'web', 'ws', 'cli', 'restore', etc.
     */
    protected function magic_get_requestorigin()
    {
    }
    /**
     * PHP overloading magic to make the $PAGE->course syntax work by redirecting
     * it to the corresponding $PAGE->magic_get_course() method if there is one, and
     * throwing an exception if not.
     *
     * @param string $name property name
     * @return mixed
     * @throws coding_exception
     */
    public function __get($name)
    {
    }
    /**
     * PHP overloading magic to catch obvious coding errors.
     *
     * This method has been created to catch obvious coding errors where the
     * developer has tried to set a page property using $PAGE->key = $value.
     * In the moodle_page class all properties must be set using the appropriate
     * $PAGE->set_something($value) method.
     *
     * @param string $name property name
     * @param mixed $value Value
     * @return void Throws exception if field not defined in page class
     * @throws coding_exception
     */
    public function __set($name, $value)
    {
    }
    // Other information getting methods ==========================================.
    /**
     * Returns instance of page renderer
     *
     * @param string $component name such as 'core', 'mod_forum' or 'qtype_multichoice'.
     * @param string $subtype optional subtype such as 'news' resulting to 'mod_forum_news'
     * @param string $target one of rendering target constants
     * @return renderer_base
     */
    public function get_renderer($component, $subtype = \null, $target = \null)
    {
    }
    /**
     * Checks to see if there are any items on the navbar object
     *
     * @return bool true if there are, false if not
     */
    public function has_navbar()
    {
    }
    /**
     * Switches from the regular requirements manager to the fragment requirements manager to
     * capture all necessary JavaScript to display a chunk of HTML such as an mform. This is for use
     * by the get_fragment() web service and not for use elsewhere.
     */
    public function start_collecting_javascript_requirements()
    {
    }
    /**
     * Switches back from collecting fragment JS requirement to the original requirement manager
     */
    public function end_collecting_javascript_requirements()
    {
    }
    /**
     * Should the current user see this page in editing mode.
     * That is, are they allowed to edit this page, and are they currently in
     * editing mode.
     * @return bool
     */
    public function user_is_editing()
    {
    }
    /**
     * Does the user have permission to edit blocks on this page.
     * @return bool
     */
    public function user_can_edit_blocks()
    {
    }
    /**
     * Does the user have permission to see this page in editing mode.
     * @return bool
     */
    public function user_allowed_editing()
    {
    }
    /**
     * Get a description of this page. Normally displayed in the footer in developer debug mode.
     * @return string
     */
    public function debug_summary()
    {
    }
    // Setter methods =============================================================.
    /**
     * Set the state.
     *
     * The state must be one of that STATE_... constants, and the state is only allowed to advance one step at a time.
     *
     * @param int $state The new state.
     * @throws coding_exception
     */
    public function set_state($state)
    {
    }
    /**
     * Set the current course. This sets both $PAGE->course and $COURSE. It also
     * sets the right theme and locale.
     *
     * Normally you don't need to call this function yourself, require_login will
     * call it for you if you pass a $course to it. You can use this function
     * on pages that do need to call require_login().
     *
     * Sets $PAGE->context to the course context, if it is not already set.
     *
     * @param stdClass $course the course to set as the global course.
     * @throws coding_exception
     */
    public function set_course($course)
    {
    }
    /**
     * Set the main context to which this page belongs.
     *
     * @param context $context a context object. You normally get this with context_xxxx::instance().
     */
    public function set_context($context)
    {
    }
    /**
     * The course module that this page belongs to (if it does belong to one).
     *
     * @param stdClass|cm_info $cm a record from course_modules table or cm_info from get_fast_modinfo().
     * @param stdClass $course
     * @param stdClass $module
     * @return void
     * @throws coding_exception
     */
    public function set_cm($cm, $course = \null, $module = \null)
    {
    }
    /**
     * Sets the activity record. This could be a row from the main table for a
     * module. For instance if the current module (cm) is a forum this should be a row
     * from the forum table.
     *
     * @param stdClass $module A row from the main database table for the module that this page belongs to.
     * @throws coding_exception
     */
    public function set_activity_record($module)
    {
    }
    /**
     * Sets the pagetype to use for this page.
     *
     * Normally you do not need to set this manually, it is automatically created
     * from the script name. However, on some pages this is overridden.
     * For example the page type for course/view.php includes the course format,
     * for example 'course-view-weeks'. This gets used as the id attribute on
     * <body> and also for determining which blocks are displayed.
     *
     * @param string $pagetype e.g. 'my-index' or 'mod-quiz-attempt'.
     */
    public function set_pagetype($pagetype)
    {
    }
    /**
     * Sets the layout to use for this page.
     *
     * The page layout determines how the page will be displayed, things such as
     * block regions, content areas, etc are controlled by the layout.
     * The theme in use for the page will determine that the layout contains.
     *
     * This properly defaults to 'base', so you only need to call this function if
     * you want something different. The exact range of supported layouts is specified
     * in the standard theme.
     *
     * For an idea of the common page layouts see
     * {@link http://docs.moodle.org/dev/Themes_2.0#The_different_layouts_as_of_August_17th.2C_2010}
     * But please keep in mind that it may be (and normally is) out of date.
     * The only place to find an accurate up-to-date list of the page layouts
     * available for your version of Moodle is {@link theme/base/config.php}
     *
     * @param string $pagelayout the page layout this is. For example 'popup', 'home'.
     */
    public function set_pagelayout($pagelayout)
    {
    }
    /**
     * If context->id and pagetype are not enough to uniquely identify this page,
     * then you can set a subpage id as well. For example, the tags page sets
     *
     * @param string $subpage an arbitrary identifier that, along with context->id
     *      and pagetype, uniquely identifies this page.
     */
    public function set_subpage($subpage)
    {
    }
    /**
     * Adds a CSS class to the body tag of the page.
     *
     * @param string $class add this class name ot the class attribute on the body tag.
     * @throws coding_exception
     */
    public function add_body_class($class)
    {
    }
    /**
     * Adds an array of body classes to the body tag of this page.
     *
     * @param array $classes this utility method calls add_body_class for each array element.
     */
    public function add_body_classes($classes)
    {
    }
    /**
     * Sets the title for the page.
     * This is normally used within the title tag in the head of the page.
     *
     * @param string $title the title that should go in the <head> section of the HTML of this page.
     */
    public function set_title($title)
    {
    }
    /**
     * Sets the heading to use for the page.
     * This is normally used as the main heading at the top of the content.
     *
     * @param string $heading the main heading that should be displayed at the top of the <body>.
     * @param bool $applyformatting apply format_string() - by default true.
     */
    public function set_heading($heading, bool $applyformatting = \true)
    {
    }
    /**
     * Sets some HTML to use next to the heading {@link moodle_page::set_heading()}
     *
     * @param string $menu The menu/content to show in the heading
     */
    public function set_headingmenu($menu)
    {
    }
    /**
     * Set the course category this page belongs to manually.
     *
     * This automatically sets $PAGE->course to be the site course. You cannot
     * use this method if you have already set $PAGE->course - in that case,
     * the category must be the one that the course belongs to. This also
     * automatically sets the page context to the category context.
     *
     * @param int $categoryid The id of the category to set.
     * @throws coding_exception
     */
    public function set_category_by_id($categoryid)
    {
    }
    /**
     * Set a different path to use for the 'Moodle docs for this page' link.
     *
     * By default, it uses the pagetype, which is normally the same as the
     * script name. So, for example, for mod/quiz/attempt.php, pagetype is
     * mod-quiz-attempt, and so docspath is mod/quiz/attempt.
     *
     * @param string $path the path to use at the end of the moodle docs URL.
     */
    public function set_docs_path($path)
    {
    }
    /**
     * You should call this method from every page to set the URL that should be used to return to this page.
     *
     * Used, for example, by the blocks editing UI to know where to return the
     * user after an action.
     * For example, course/view.php does:
     *      $id = optional_param('id', 0, PARAM_INT);
     *      $PAGE->set_url('/course/view.php', array('id' => $id));
     *
     * @param moodle_url|string $url URL relative to $CFG->wwwroot or {@link moodle_url} instance
     * @param array $params parameters to add to the URL
     * @throws coding_exception
     */
    public function set_url($url, array $params = \null)
    {
    }
    /**
     * Make sure page URL does not contain the given URL parameter.
     *
     * This should not be necessary if the script has called set_url properly.
     * However, in some situations like the block editing actions; when the URL
     * has been guessed, it will contain dangerous block-related actions.
     * Therefore, the blocks code calls this function to clean up such parameters
     * before doing any redirect.
     *
     * @param string $param the name of the parameter to make sure is not in the
     * page URL.
     */
    public function ensure_param_not_in_url($param)
    {
    }
    /**
     * Sets an alternative version of this page.
     *
     * There can be alternate versions of some pages (for example an RSS feed version).
     * Call this method for each alternative version available.
     * For each alternative version a link will be included in the <head> tag.
     *
     * @param string $title The title to give the alternate version.
     * @param string|moodle_url $url The URL of the alternate version.
     * @param string $mimetype The mime-type of the alternate version.
     * @throws coding_exception
     */
    public function add_alternate_version($title, $url, $mimetype)
    {
    }
    /**
     * Specify a form control should be focused when the page has loaded.
     *
     * @param string $controlid the id of the HTML element to be focused.
     */
    public function set_focuscontrol($controlid)
    {
    }
    /**
     * Specify a fragment of HTML that goes where the 'Turn editing on' button normally goes.
     *
     * @param string $html the HTML to display there.
     */
    public function set_button($html)
    {
    }
    /**
     * Set the capability that allows users to edit blocks on this page.
     *
     * Normally the default of 'moodle/site:manageblocks' is used, but a few
     * pages like the My Moodle page need to use a different capability
     * like 'moodle/my:manageblocks'.
     *
     * @param string $capability a capability.
     */
    public function set_blocks_editing_capability($capability)
    {
    }
    /**
     * Some pages let you turn editing on for reasons other than editing blocks.
     * If that is the case, you can pass other capabilities that let the user
     * edit this page here.
     *
     * @param string|array $capability either a capability, or an array of capabilities.
     */
    public function set_other_editing_capability($capability)
    {
    }
    /**
     * Sets whether the browser should cache this page or not.
     *
     * @param bool $cacheable can this page be cached by the user's browser.
     */
    public function set_cacheable($cacheable)
    {
    }
    /**
     * Sets the page to periodically refresh
     *
     * This function must be called before $OUTPUT->header has been called or
     * a coding exception will be thrown.
     *
     * @param int $delay Sets the delay before refreshing the page, if set to null refresh is cancelled.
     * @throws coding_exception
     */
    public function set_periodic_refresh_delay($delay = \null)
    {
    }
    /**
     * Force this page to use a particular theme.
     *
     * Please use this cautiously.
     * It is only intended to be used by the themes selector admin page.
     *
     * @param string $themename the name of the theme to use.
     */
    public function force_theme($themename)
    {
    }
    /**
     * Reload theme settings.
     *
     * This is used when we need to reset settings
     * because they are now double cached in theme.
     */
    public function reload_theme()
    {
    }
    /**
     * @deprecated since Moodle 3.4
     */
    public function https_required()
    {
    }
    /**
     * @deprecated since Moodle 3.4
     */
    public function verify_https_required()
    {
    }
    // Initialisation methods =====================================================
    // These set various things up in a default way.
    /**
     * This method is called when the page first moves out of the STATE_BEFORE_HEADER
     * state. This is our last change to initialise things.
     */
    protected function starting_output()
    {
    }
    /**
     * Method for use by Moodle core to set up the theme. Do not
     * use this in your own code.
     *
     * Make sure the right theme for this page is loaded. Tell our
     * blocks_manager about the theme block regions, and then, if
     * we are $PAGE, set up the global $OUTPUT.
     *
     * @return void
     */
    public function initialise_theme_and_output()
    {
    }
    /**
     * For diagnostic/debugging purposes, find where the theme setup was triggered.
     *
     * @return null|array null if theme not yet setup. Stacktrace if it was.
     */
    public function get_where_theme_was_initialised()
    {
    }
    /**
     * Reset the theme and output for a new context. This only makes sense from
     * external::validate_context(). Do not cheat.
     *
     * @return string the name of the theme that should be used on this page.
     */
    public function reset_theme_and_output()
    {
    }
    /**
     * Work out the theme this page should use.
     *
     * This depends on numerous $CFG settings, and the properties of this page.
     *
     * @return string the name of the theme that should be used on this page.
     */
    protected function resolve_theme()
    {
    }
    /**
     * Sets ->pagetype from the script name. For example, if the script that was
     * run is mod/quiz/view.php, ->pagetype will be set to 'mod-quiz-view'.
     *
     * @param string $script the path to the script that should be used to
     * initialise ->pagetype. If not passed the $SCRIPT global will be used.
     * If legacy code has set $CFG->pagepath that will be used instead, and a
     * developer warning issued.
     */
    protected function initialise_default_pagetype($script = \null)
    {
    }
    /**
     * Initialises the CSS classes that will be added to body tag of the page.
     *
     * The function is responsible for adding all of the critical CSS classes
     * that describe the current page, and its state.
     * This includes classes that describe the following for example:
     *    - Current language
     *    - Language direction
     *    - YUI CSS initialisation
     *    - Pagelayout
     * These are commonly used in CSS to target specific types of pages.
     */
    protected function initialise_standard_body_classes()
    {
    }
    /**
     * Loads the activity record for the current CM object associated with this
     * page.
     *
     * This will load {@link moodle_page::$_module} with a row from the related
     * module table in the database.
     * For instance if {@link moodle_page::$_cm} is a forum then a row from the
     * forum table will be loaded.
     */
    protected function load_activity_record()
    {
    }
    /**
     * This function ensures that the category of the current course has been
     * loaded, and if not, the function loads it now.
     *
     * @return void
     * @throws coding_exception
     */
    protected function ensure_category_loaded()
    {
    }
    /**
     * Loads the requested category into the pages categories array.
     *
     * @param int $categoryid
     * @throws moodle_exception
     */
    protected function load_category($categoryid)
    {
    }
    /**
     * Ensures that the category the current course is within, as well as all of
     * its parent categories, have been loaded.
     *
     * @return void
     */
    protected function ensure_categories_loaded()
    {
    }
    /**
     * Ensure the theme has not been loaded yet. If it has an exception is thrown.
     *
     * @throws coding_exception
     */
    protected function ensure_theme_not_set()
    {
    }
    /**
     * Converts the provided URL into a CSS class that be used within the page.
     * This is primarily used to add the wwwroot to the body tag as a CSS class.
     *
     * @param string $url
     * @return string
     */
    protected function url_to_class_name($url)
    {
    }
    /**
     * Combines all of the required editing caps for the page and returns them
     * as an array.
     *
     * @return array
     */
    protected function all_editing_caps()
    {
    }
    /**
     * Returns true if the page URL has beem set.
     *
     * @return bool
     */
    public function has_set_url()
    {
    }
    /**
     * Gets set when the block actions for the page have been processed.
     *
     * @param bool $setting
     */
    public function set_block_actions_done($setting = \true)
    {
    }
    /**
     * Are popup notifications allowed on this page?
     * Popup notifications may be disallowed in situations such as while upgrading or completing a quiz
     *
     * @return bool true if popup notifications may be displayed
     */
    public function get_popup_notification_allowed()
    {
    }
    /**
     * Allow or disallow popup notifications on this page. Popups are allowed by default.
     *
     * @param bool $allowed true if notifications are allowed. False if not allowed. They are allowed by default.
     */
    public function set_popup_notification_allowed($allowed)
    {
    }
    /**
     * Returns the block region having made any required theme manipulations.
     *
     * @since Moodle 2.5.1 2.6
     * @param string $region
     * @return string
     */
    public function apply_theme_region_manipulations($region)
    {
    }
    /**
     * Add a report node and a specific report to the navigation.
     *
     * @param int $userid The user ID that we are looking to add this report node to.
     * @param array $nodeinfo Name and url of the final node that we are creating.
     */
    public function add_report_nodes($userid, $nodeinfo)
    {
    }
    /**
     * Add some HTML to the list of actions to render in the header actions menu.
     *
     * @param string $html The HTML to add.
     */
    public function add_header_action(string $html) : void
    {
    }
    /**
     * Get the list of HTML for actions to render in the header actions menu.
     *
     * @return string[]
     */
    public function get_header_actions() : array
    {
    }
    /**
     * Set the flag to indicate if the region main settings should be rendered as an action
     * in the header actions menu rather than at the top of the content.
     *
     * @param bool $value If the settings should be in the header.
     */
    public function set_include_region_main_settings_in_header_actions(bool $value) : void
    {
    }
    /**
     * Check if the  region main settings should be rendered as an action in the header actions
     * menu rather than at the top of the content.
     *
     * @return bool
     */
    public function include_region_main_settings_in_header_actions() : bool
    {
    }
}
/**
 * Base Moodle Exception class
 *
 * Although this class is defined here, you cannot throw a moodle_exception until
 * after moodlelib.php has been included (which will happen very soon).
 *
 * @package    core
 * @subpackage lib
 * @copyright  2008 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class moodle_exception extends \Exception
{
    /**
     * @var string The name of the string from error.php to print
     */
    public $errorcode;
    /**
     * @var string The name of module
     */
    public $module;
    /**
     * @var mixed Extra words and phrases that might be required in the error string
     */
    public $a;
    /**
     * @var string The url where the user will be prompted to continue. If no url is provided the user will be directed to the site index page.
     */
    public $link;
    /**
     * @var string Optional information to aid the debugging process
     */
    public $debuginfo;
    /**
     * Constructor
     * @param string $errorcode The name of the string from error.php to print
     * @param string $module name of module
     * @param string $link The url where the user will be prompted to continue. If no url is provided the user will be directed to the site index page.
     * @param mixed $a Extra words and phrases that might be required in the error string
     * @param string $debuginfo optional debugging information
     */
    function __construct($errorcode, $module = '', $link = '', $a = \NULL, $debuginfo = \null)
    {
    }
}
/**
 * Course/activity access exception.
 *
 * This exception is thrown from require_login()
 *
 * @package    core_access
 * @copyright  2010 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class require_login_exception extends \moodle_exception
{
    /**
     * Constructor
     * @param string $debuginfo Information to aid the debugging process
     */
    function __construct($debuginfo)
    {
    }
}
/**
 * Session timeout exception.
 *
 * This exception is thrown from require_login()
 *
 * @package    core_access
 * @copyright  2015 Andrew Nicols <andrew@nicols.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class require_login_session_timeout_exception extends \require_login_exception
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }
}
/**
 * Web service parameter exception class
 * @deprecated since Moodle 2.2 - use moodle exception instead
 * This exception must be thrown to the web service client when a web service parameter is invalid
 * The error string is gotten from webservice.php
 */
class webservice_parameter_exception extends \moodle_exception
{
    /**
     * Constructor
     * @param string $errorcode The name of the string from webservice.php to print
     * @param string $a The name of the parameter
     * @param string $debuginfo Optional information to aid debugging
     */
    function __construct($errorcode = \null, $a = '', $debuginfo = \null)
    {
    }
}
/**
 * Exceptions indicating user does not have permissions to do something
 * and the execution can not continue.
 *
 * @package    core_access
 * @copyright  2009 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class required_capability_exception extends \moodle_exception
{
    /**
     * Constructor
     * @param context $context The context used for the capability check
     * @param string $capability The required capability
     * @param string $errormessage The error message to show the user
     * @param string $stringfile
     */
    function __construct($context, $capability, $errormessage, $stringfile)
    {
    }
}
/**
 * Exception indicating programming error, must be fixed by a programer. For example
 * a core API might throw this type of exception if a plugin calls it incorrectly.
 *
 * @package    core
 * @subpackage lib
 * @copyright  2008 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class coding_exception extends \moodle_exception
{
    /**
     * Constructor
     * @param string $hint short description of problem
     * @param string $debuginfo detailed information how to fix problem
     */
    function __construct($hint, $debuginfo = \null)
    {
    }
}
/**
 * Exception indicating malformed parameter problem.
 * This exception is not supposed to be thrown when processing
 * user submitted data in forms. It is more suitable
 * for WS and other low level stuff.
 *
 * @package    core
 * @subpackage lib
 * @copyright  2009 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class invalid_parameter_exception extends \moodle_exception
{
    /**
     * Constructor
     * @param string $debuginfo some detailed information
     */
    function __construct($debuginfo = \null)
    {
    }
}
/**
 * Exception indicating malformed response problem.
 * This exception is not supposed to be thrown when processing
 * user submitted data in forms. It is more suitable
 * for WS and other low level stuff.
 */
class invalid_response_exception extends \moodle_exception
{
    /**
     * Constructor
     * @param string $debuginfo some detailed information
     */
    function __construct($debuginfo = \null)
    {
    }
}
/**
 * An exception that indicates something really weird happened. For example,
 * if you do switch ($context->contextlevel), and have one case for each
 * CONTEXT_... constant. You might throw an invalid_state_exception in the
 * default case, to just in case something really weird is going on, and
 * $context->contextlevel is invalid - rather than ignoring this possibility.
 *
 * @package    core
 * @subpackage lib
 * @copyright  2009 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class invalid_state_exception extends \moodle_exception
{
    /**
     * Constructor
     * @param string $hint short description of problem
     * @param string $debuginfo optional more detailed information
     */
    function __construct($hint, $debuginfo = \null)
    {
    }
}
/**
 * An exception that indicates incorrect permissions in $CFG->dataroot
 *
 * @package    core
 * @subpackage lib
 * @copyright  2010 Petr Skoda {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class invalid_dataroot_permissions extends \moodle_exception
{
    /**
     * Constructor
     * @param string $debuginfo optional more detailed information
     */
    function __construct($debuginfo = \NULL)
    {
    }
}
/**
 * An exception that indicates that file can not be served
 *
 * @package    core
 * @subpackage lib
 * @copyright  2010 Petr Skoda {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class file_serving_exception extends \moodle_exception
{
    /**
     * Constructor
     * @param string $debuginfo optional more detailed information
     */
    function __construct($debuginfo = \NULL)
    {
    }
}
/**
 * This class solves the problem of how to initialise $OUTPUT.
 *
 * The problem is caused be two factors
 * <ol>
 * <li>On the one hand, we cannot be sure when output will start. In particular,
 * an error, which needs to be displayed, could be thrown at any time.</li>
 * <li>On the other hand, we cannot be sure when we will have all the information
 * necessary to correctly initialise $OUTPUT. $OUTPUT depends on the theme, which
 * (potentially) depends on the current course, course categories, and logged in user.
 * It also depends on whether the current page requires HTTPS.</li>
 * </ol>
 *
 * So, it is hard to find a single natural place during Moodle script execution,
 * which we can guarantee is the right time to initialise $OUTPUT. Instead we
 * adopt the following strategy
 * <ol>
 * <li>We will initialise $OUTPUT the first time it is used.</li>
 * <li>If, after $OUTPUT has been initialised, the script tries to change something
 * that $OUTPUT depends on, we throw an exception making it clear that the script
 * did something wrong.
 * </ol>
 *
 * The only problem with that is, how do we initialise $OUTPUT on first use if,
 * it is going to be used like $OUTPUT->somthing(...)? Well that is where this
 * class comes in. Initially, we set up $OUTPUT = new bootstrap_renderer(). Then,
 * when any method is called on that object, we initialise $OUTPUT, and pass the call on.
 *
 * Note that this class is used before lib/outputlib.php has been loaded, so we
 * must be careful referring to classes/functions from there, they may not be
 * defined yet, and we must avoid fatal errors.
 *
 * @copyright 2009 Tim Hunt
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since     Moodle 2.0
 */
class bootstrap_renderer
{
    /**
     * Handles re-entrancy. Without this, errors or debugging output that occur
     * during the initialisation of $OUTPUT, cause infinite recursion.
     * @var boolean
     */
    protected $initialising = \false;
    /**
     * Have we started output yet?
     * @return boolean true if the header has been printed.
     */
    public function has_started()
    {
    }
    /**
     * Constructor - to be used by core code only.
     * @param string $method The method to call
     * @param array $arguments Arguments to pass to the method being called
     * @return string
     */
    public function __call($method, $arguments)
    {
    }
    /**
     * Returns nicely formatted error message in a div box.
     * @static
     * @param string $message error message
     * @param string $moreinfourl (ignored in early errors)
     * @param string $link (ignored in early errors)
     * @param array $backtrace
     * @param string $debuginfo
     * @return string
     */
    public static function early_error_content($message, $moreinfourl, $link, $backtrace, $debuginfo = \null)
    {
    }
    /**
     * This function should only be called by this class, or from exception handlers
     * @static
     * @param string $message error message
     * @param string $moreinfourl (ignored in early errors)
     * @param string $link (ignored in early errors)
     * @param array $backtrace
     * @param string $debuginfo extra information for developers
     * @return string
     */
    public static function early_error($message, $moreinfourl, $link, $backtrace, $debuginfo = \null, $errorcode = \null)
    {
    }
    /**
     * Early notification message
     * @static
     * @param string $message
     * @param string $classes usually notifyproblem or notifysuccess
     * @return string
     */
    public static function early_notification($message, $classes = 'notifyproblem')
    {
    }
    /**
     * Page should redirect message.
     * @static
     * @param string $encodedurl redirect url
     * @return string
     */
    public static function plain_redirect_message($encodedurl)
    {
    }
    /**
     * Early redirection page, used before full init of $PAGE global
     * @static
     * @param string $encodedurl redirect url
     * @param string $message redirect message
     * @param int $delay time in seconds
     * @return string redirect page
     */
    public static function early_redirect_message($encodedurl, $message, $delay)
    {
    }
    /**
     * Output basic html page.
     * @static
     * @param string $title page title
     * @param string $content page content
     * @param string $meta meta tag
     * @return string html page
     */
    public static function plain_page($title, $content, $meta = '')
    {
    }
}
/**
 * Native mysqli class representing moodle database interface.
 *
 * @package    core_dml
 * @copyright  2008 Petr Skoda (http://skodak.org)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mysqli_native_moodle_database extends \moodle_database
{
    use \moodle_read_slave_trait {
        can_use_readonly as read_slave_can_use_readonly;
    }
    /** @var mysqli $mysqli */
    protected $mysqli = \null;
    /** @var bool is compressed row format supported cache */
    protected $compressedrowformatsupported = \null;
    private $transactions_supported = \null;
    /**
     * Attempt to create the database
     * @param string $dbhost
     * @param string $dbuser
     * @param string $dbpass
     * @param string $dbname
     * @return bool success
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function create_database($dbhost, $dbuser, $dbpass, $dbname, array $dboptions = \null)
    {
    }
    /**
     * Detects if all needed PHP stuff installed.
     * Note: can be used before connect()
     * @return mixed true if ok, string if something
     */
    public function driver_installed()
    {
    }
    /**
     * Returns database family type - describes SQL dialect
     * Note: can be used before connect()
     * @return string db family name (mysql, postgres, mssql, oracle, etc.)
     */
    public function get_dbfamily()
    {
    }
    /**
     * Returns more specific database driver type
     * Note: can be used before connect()
     * @return string db type mysqli, pgsql, oci, mssql, sqlsrv
     */
    protected function get_dbtype()
    {
    }
    /**
     * Returns general database library name
     * Note: can be used before connect()
     * @return string db type pdo, native
     */
    protected function get_dblibrary()
    {
    }
    /**
     * Returns the current MySQL db engine.
     *
     * This is an ugly workaround for MySQL default engine problems,
     * Moodle is designed to work best on ACID compliant databases
     * with full transaction support. Do not use MyISAM.
     *
     * @return string or null MySQL engine name
     */
    public function get_dbengine()
    {
    }
    /**
     * Returns the current MySQL db collation.
     *
     * This is an ugly workaround for MySQL default collation problems.
     *
     * @return string or null MySQL collation name
     */
    public function get_dbcollation()
    {
    }
    /**
     * Set 'dbcollation' option
     *
     * @return string $dbcollation
     */
    private function detect_collation() : string
    {
    }
    /**
     * Tests if the Antelope file format is still supported or it has been removed.
     * When removed, only Barracuda file format is supported, given the XtraDB/InnoDB engine.
     *
     * @return bool True if the Antelope file format has been removed; otherwise, false.
     */
    protected function is_antelope_file_format_no_more_supported()
    {
    }
    /**
     * Get the row format from the database schema.
     *
     * @param string $table
     * @return string row_format name or null if not known or table does not exist.
     */
    public function get_row_format($table = \null)
    {
    }
    /**
     * Is this database compatible with compressed row format?
     * This feature is necessary for support of large number of text
     * columns in InnoDB/XtraDB database.
     *
     * @param bool $cached use cached result
     * @return bool true if table can be created or changed to compressed row format.
     */
    public function is_compressed_row_format_supported($cached = \true)
    {
    }
    /**
     * Check the database to see if innodb_file_per_table is on.
     *
     * @return bool True if on otherwise false.
     */
    public function is_file_per_table_enabled()
    {
    }
    /**
     * Check the database to see if innodb_large_prefix is on.
     *
     * @return bool True if on otherwise false.
     */
    public function is_large_prefix_enabled()
    {
    }
    /**
     * Determine if the row format should be set to compressed, dynamic, or default.
     *
     * Terrible kludge. If we're using utf8mb4 AND we're using InnoDB, we need to specify row format to
     * be either dynamic or compressed (default is compact) in order to allow for bigger indexes (MySQL
     * errors #1709 and #1071).
     *
     * @param  string $engine The database engine being used. Will be looked up if not supplied.
     * @param  string $collation The database collation to use. Will look up the current collation if not supplied.
     * @return string An sql fragment to add to sql statements.
     */
    public function get_row_format_sql($engine = \null, $collation = \null)
    {
    }
    /**
     * Returns localised database type name
     * Note: can be used before connect()
     * @return string
     */
    public function get_name()
    {
    }
    /**
     * Returns localised database configuration help.
     * Note: can be used before connect()
     * @return string
     */
    public function get_configuration_help()
    {
    }
    /**
     * Diagnose database and tables, this function is used
     * to verify database and driver settings, db engine types, etc.
     *
     * @return string null means everything ok, string means problem found.
     */
    public function diagnose()
    {
    }
    /**
     * Connect to db
     * @param string $dbhost The database host.
     * @param string $dbuser The database username.
     * @param string $dbpass The database username's password.
     * @param string $dbname The name of the database being connected to.e
     * @param mixed $prefix string means moodle db prefix, false used for external databases where prefix not used
     * @param array $dboptions driver specific options
     * @return bool success
     */
    public function raw_connect(string $dbhost, string $dbuser, string $dbpass, string $dbname, $prefix, array $dboptions = \null) : bool
    {
    }
    /**
     * Close database connection and release all resources
     * and memory (especially circular memory references).
     * Do NOT use connect() again, create a new instance if needed.
     */
    public function dispose()
    {
    }
    /**
     * Gets db handle currently used with queries
     * @return resource
     */
    protected function get_db_handle()
    {
    }
    /**
     * Sets db handle to be used with subsequent queries
     * @param resource $dbh
     * @return void
     */
    protected function set_db_handle($dbh) : void
    {
    }
    /**
     * Check if The query qualifies for readonly connection execution
     * Logging queries are exempt, those are write operations that circumvent
     * standard query_start/query_end paths.
     * @param int $type type of query
     * @param string $sql
     * @return bool
     */
    protected function can_use_readonly(int $type, string $sql) : bool
    {
    }
    /**
     * Returns database server info array
     * @return array Array containing 'description' and 'version' info
     */
    public function get_server_info()
    {
    }
    /**
     * Returns supported query parameter types
     * @return int bitmask of accepted SQL_PARAMS_*
     */
    protected function allowed_param_types()
    {
    }
    /**
     * Returns last error reported by database engine.
     * @return string error message
     */
    public function get_last_error()
    {
    }
    /**
     * Return tables in database WITHOUT current prefix
     * @param bool $usecache if true, returns list of cached tables.
     * @return array of table names in lowercase and without prefix
     */
    public function get_tables($usecache = \true)
    {
    }
    /**
     * Return table indexes - everything lowercased.
     * @param string $table The table we want to get indexes from.
     * @return array An associative array of indexes containing 'unique' flag and 'columns' being indexed
     */
    public function get_indexes($table)
    {
    }
    /**
     * Fetches detailed information about columns in table.
     *
     * @param string $table name
     * @return database_column_info[] array of database_column_info objects indexed with column names
     */
    protected function fetch_columns(string $table) : array
    {
    }
    /**
     * Indicates whether column information retrieved from `information_schema.columns` has default values quoted or not.
     * @return boolean True when default values are quoted (breaking change); otherwise, false.
     */
    protected function has_breaking_change_quoted_defaults()
    {
    }
    /**
     * Indicates whether SQL_MODE default value has changed in a not backward compatible way.
     * @return boolean True when SQL_MODE breaks BC; otherwise, false.
     */
    public function has_breaking_change_sqlmode()
    {
    }
    /**
     * Returns moodle column info for raw column from information schema.
     * @param stdClass $rawcolumn
     * @return stdClass standardised colum info
     */
    private function get_column_info(\stdClass $rawcolumn)
    {
    }
    /**
     * Normalise column type.
     * @param string $mysql_type
     * @return string one character
     * @throws dml_exception
     */
    private function mysqltype2moodletype($mysql_type)
    {
    }
    /**
     * Normalise values based in RDBMS dependencies (booleans, LOBs...)
     *
     * @param database_column_info $column column metadata corresponding with the value we are going to normalise
     * @param mixed $value value we are going to normalise
     * @return mixed the normalised value
     */
    protected function normalise_value($column, $value)
    {
    }
    /**
     * Is this database compatible with utf8?
     * @return bool
     */
    public function setup_is_unicodedb()
    {
    }
    /**
     * Do NOT use in code, to be used by database_manager only!
     * @param string|array $sql query
     * @param array|null $tablenames an array of xmldb table names affected by this request.
     * @return bool true
     * @throws ddl_change_structure_exception A DDL specific exception is thrown for any errors.
     */
    public function change_database_structure($sql, $tablenames = \null)
    {
    }
    /**
     * Very ugly hack which emulates bound parameters in queries
     * because prepared statements do not use query cache.
     */
    protected function emulate_bound_params($sql, array $params = \null)
    {
    }
    /**
     * Execute general sql query. Should be used only when no other method suitable.
     * Do NOT use this to make changes in db structure, use database_manager methods instead!
     * @param string $sql query
     * @param array $params query parameters
     * @return bool true
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function execute($sql, array $params = \null)
    {
    }
    /**
     * Get a number of records as a moodle_recordset using a SQL statement.
     *
     * Since this method is a little less readable, use of it should be restricted to
     * code where it's possible there might be large datasets being returned.  For known
     * small datasets use get_records_sql - it leads to simpler code.
     *
     * The return type is like:
     * @see function get_recordset.
     *
     * @param string $sql the SQL select query to execute.
     * @param array $params array of sql parameters
     * @param int $limitfrom return a subset of records, starting at this point (optional, required if $limitnum is set).
     * @param int $limitnum return a subset comprising this many records (optional, required if $limitfrom is set).
     * @return moodle_recordset instance
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function get_recordset_sql($sql, array $params = \null, $limitfrom = 0, $limitnum = 0)
    {
    }
    /**
     * Get all records from a table.
     *
     * This method works around potential memory problems and may improve performance,
     * this method may block access to table until the recordset is closed.
     *
     * @param string $table Name of database table.
     * @return moodle_recordset A moodle_recordset instance {@link function get_recordset}.
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function export_table_recordset($table)
    {
    }
    protected function create_recordset($result)
    {
    }
    /**
     * Get a number of records as an array of objects using a SQL statement.
     *
     * Return value is like:
     * @see function get_records.
     *
     * @param string $sql the SQL select query to execute. The first column of this SELECT statement
     *   must be a unique value (usually the 'id' field), as it will be used as the key of the
     *   returned array.
     * @param array $params array of sql parameters
     * @param int $limitfrom return a subset of records, starting at this point (optional, required if $limitnum is set).
     * @param int $limitnum return a subset comprising this many records (optional, required if $limitfrom is set).
     * @return array of objects, or empty array if no records were found
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function get_records_sql($sql, array $params = \null, $limitfrom = 0, $limitnum = 0)
    {
    }
    /**
     * Selects records and return values (first field) as an array using a SQL statement.
     *
     * @param string $sql The SQL query
     * @param array $params array of sql parameters
     * @return array of values
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function get_fieldset_sql($sql, array $params = \null)
    {
    }
    /**
     * Insert new record into database, as fast as possible, no safety checks, lobs not supported.
     * @param string $table name
     * @param mixed $params data record as object or array
     * @param bool $returnit return it of inserted record
     * @param bool $bulk true means repeated inserts expected
     * @param bool $customsequence true if 'id' included in $params, disables $returnid
     * @return bool|int true or new id
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function insert_record_raw($table, $params, $returnid = \true, $bulk = \false, $customsequence = \false)
    {
    }
    /**
     * Insert a record into a table and return the "id" field if required.
     *
     * Some conversions and safety checks are carried out. Lobs are supported.
     * If the return ID isn't required, then this just reports success as true/false.
     * $data is an object containing needed data
     * @param string $table The database table to be inserted into
     * @param object|array $dataobject A data object with values for one or more fields in the record
     * @param bool $returnid Should the id of the newly created record entry be returned? If this option is not requested then true/false is returned.
     * @return bool|int true or new id
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function insert_record($table, $dataobject, $returnid = \true, $bulk = \false)
    {
    }
    /**
     * Insert multiple records into database as fast as possible.
     *
     * Order of inserts is maintained, but the operation is not atomic,
     * use transactions if necessary.
     *
     * This method is intended for inserting of large number of small objects,
     * do not use for huge objects with text or binary fields.
     *
     * @since Moodle 2.7
     *
     * @param string $table  The database table to be inserted into
     * @param array|Traversable $dataobjects list of objects to be inserted, must be compatible with foreach
     * @return void does not return new record ids
     *
     * @throws coding_exception if data objects have different structure
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function insert_records($table, $dataobjects)
    {
    }
    /**
     * Insert records in chunks.
     *
     * Note: can be used only from insert_records().
     *
     * @param string $table
     * @param array $chunk
     * @param database_column_info[] $columns
     */
    protected function insert_chunk($table, array $chunk, array $columns)
    {
    }
    /**
     * Import a record into a table, id field is required.
     * Safety checks are NOT carried out. Lobs are supported.
     *
     * @param string $table name of database table to be inserted into
     * @param object $dataobject A data object with values for one or more fields in the record
     * @return bool true
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function import_record($table, $dataobject)
    {
    }
    /**
     * Update record in database, as fast as possible, no safety checks, lobs not supported.
     * @param string $table name
     * @param mixed $params data record as object or array
     * @param bool true means repeated updates expected
     * @return bool true
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function update_record_raw($table, $params, $bulk = \false)
    {
    }
    /**
     * Update a record in a table
     *
     * $dataobject is an object containing needed data
     * Relies on $dataobject having a variable "id" to
     * specify the record to update
     *
     * @param string $table The database table to be checked against.
     * @param object $dataobject An object with contents equal to fieldname=>fieldvalue. Must have an entry for 'id' to map to the table specified.
     * @param bool true means repeated updates expected
     * @return bool true
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function update_record($table, $dataobject, $bulk = \false)
    {
    }
    /**
     * Set a single field in every table record which match a particular WHERE clause.
     *
     * @param string $table The database table to be checked against.
     * @param string $newfield the field to set.
     * @param string $newvalue the value to set the field to.
     * @param string $select A fragment of SQL to be used in a where clause in the SQL call.
     * @param array $params array of sql parameters
     * @return bool true
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function set_field_select($table, $newfield, $newvalue, $select, array $params = \null)
    {
    }
    /**
     * Delete one or more records from a table which match a particular WHERE clause.
     *
     * @param string $table The database table to be checked against.
     * @param string $select A fragment of SQL to be used in a where clause in the SQL call (used to define the selection criteria).
     * @param array $params array of sql parameters
     * @return bool true
     * @throws dml_exception A DML specific exception is thrown for any errors.
     */
    public function delete_records_select($table, $select, array $params = \null)
    {
    }
    /**
     * Deletes records using a subquery, which is done with a strange DELETE...JOIN syntax in MySQL
     * because it performs very badly with normal subqueries.
     *
     * @param string $table Table to delete from
     * @param string $field Field in table to match
     * @param string $alias Name of single column in subquery e.g. 'id'
     * @param string $subquery Query that will return values of the field to delete
     * @param array $params Parameters for query
     * @throws dml_exception If there is any error
     */
    public function delete_records_subquery(string $table, string $field, string $alias, string $subquery, array $params = []) : void
    {
    }
    public function sql_cast_char2int($fieldname, $text = \false)
    {
    }
    public function sql_cast_char2real($fieldname, $text = \false)
    {
    }
    public function sql_equal($fieldname, $param, $casesensitive = \true, $accentsensitive = \true, $notequal = \false)
    {
    }
    /**
     * Returns 'LIKE' part of a query.
     *
     * Note that mysql does not support $casesensitive = true and $accentsensitive = false.
     * More information in http://bugs.mysql.com/bug.php?id=19567.
     *
     * @param string $fieldname usually name of the table column
     * @param string $param usually bound query parameter (?, :named)
     * @param bool $casesensitive use case sensitive search
     * @param bool $accensensitive use accent sensitive search (ignored if $casesensitive is true)
     * @param bool $notlike true means "NOT LIKE"
     * @param string $escapechar escape char for '%' and '_'
     * @return string SQL code fragment
     */
    public function sql_like($fieldname, $param, $casesensitive = \true, $accentsensitive = \true, $notlike = \false, $escapechar = '\\')
    {
    }
    /**
     * Returns the proper SQL to do CONCAT between the elements passed
     * Can take many parameters
     *
     * @param string $str,... 1 or more fields/strings to concat
     *
     * @return string The concat sql
     */
    public function sql_concat()
    {
    }
    /**
     * Returns the proper SQL to do CONCAT between the elements passed
     * with a given separator
     *
     * @param string $separator The string to use as the separator
     * @param array $elements An array of items to concatenate
     * @return string The concat SQL
     */
    public function sql_concat_join($separator = "' '", $elements = array())
    {
    }
    /**
     * Return SQL for performing group concatenation on given field/expression
     *
     * @param string $field
     * @param string $separator
     * @param string $sort
     * @return string
     */
    public function sql_group_concat(string $field, string $separator = ', ', string $sort = '') : string
    {
    }
    /**
     * Returns the SQL text to be used to calculate the length in characters of one expression.
     * @param string fieldname or expression to calculate its length in characters.
     * @return string the piece of SQL code to be used in the statement.
     */
    public function sql_length($fieldname)
    {
    }
    /**
     * Does this driver support regex syntax when searching
     */
    public function sql_regex_supported()
    {
    }
    /**
     * Return regex positive or negative match sql
     * @param bool $positivematch
     * @param bool $casesensitive
     * @return string or empty if not supported
     */
    public function sql_regex($positivematch = \true, $casesensitive = \false)
    {
    }
    /**
     * Returns the SQL to be used in order to an UNSIGNED INTEGER column to SIGNED.
     *
     * @deprecated since 2.3
     * @param string $fieldname The name of the field to be cast
     * @return string The piece of SQL code to be used in your statement.
     */
    public function sql_cast_2signed($fieldname)
    {
    }
    /**
     * Returns the SQL that allows to find intersection of two or more queries
     *
     * @since Moodle 2.8
     *
     * @param array $selects array of SQL select queries, each of them only returns fields with the names from $fields
     * @param string $fields comma-separated list of fields
     * @return string SQL query that will return only values that are present in each of selects
     */
    public function sql_intersect($selects, $fields)
    {
    }
    /**
     * Does this driver support tool_replace?
     *
     * @since Moodle 2.6.1
     * @return bool
     */
    public function replace_all_text_supported()
    {
    }
    public function session_lock_supported()
    {
    }
    /**
     * Obtain session lock
     * @param int $rowid id of the row with session record
     * @param int $timeout max allowed time to wait for the lock in seconds
     * @return void
     */
    public function get_session_lock($rowid, $timeout)
    {
    }
    public function release_session_lock($rowid)
    {
    }
    /**
     * Are transactions supported?
     * It is not responsible to run productions servers
     * on databases without transaction support ;-)
     *
     * MyISAM does not support support transactions.
     *
     * You can override this via the dbtransactions option.
     *
     * @return bool
     */
    protected function transactions_supported()
    {
    }
    /**
     * Driver specific start of real database transaction,
     * this can not be used directly in code.
     * @return void
     */
    protected function begin_transaction()
    {
    }
    /**
     * Driver specific commit of real database transaction,
     * this can not be used directly in code.
     * @return void
     */
    protected function commit_transaction()
    {
    }
    /**
     * Driver specific abort of real database transaction,
     * this can not be used directly in code.
     * @return void
     */
    protected function rollback_transaction()
    {
    }
    /**
     * Converts a table to either 'Compressed' or 'Dynamic' row format.
     *
     * @param string $tablename Name of the table to convert to the new row format.
     */
    public function convert_table_row_format($tablename)
    {
    }
    /**
     * Does this mysql instance support fulltext indexes?
     *
     * @return bool
     */
    public function is_fulltext_search_supported()
    {
    }
    /**
     * Fixes any table names that clash with reserved words.
     *
     * @param string $tablename The table name
     * @return string The fixed table name
     */
    protected function fix_table_name($tablename)
    {
    }
}
// PARAMETER HANDLING.
/**
 * Returns a particular value for the named variable, taken from
 * POST or GET.  If the parameter doesn't exist then an error is
 * thrown because we require this variable.
 *
 * This function should be used to initialise all required values
 * in a script that are based on parameters.  Usually it will be
 * used like this:
 *    $id = required_param('id', PARAM_INT);
 *
 * Please note the $type parameter is now required and the value can not be array.
 *
 * @param string $parname the name of the page parameter we want
 * @param string $type expected type of parameter
 * @return mixed
 * @throws coding_exception
 */
function required_param($parname, $type)
{
}
/**
 * Returns a particular array value for the named variable, taken from
 * POST or GET.  If the parameter doesn't exist then an error is
 * thrown because we require this variable.
 *
 * This function should be used to initialise all required values
 * in a script that are based on parameters.  Usually it will be
 * used like this:
 *    $ids = required_param_array('ids', PARAM_INT);
 *
 *  Note: arrays of arrays are not supported, only alphanumeric keys with _ and - are supported
 *
 * @param string $parname the name of the page parameter we want
 * @param string $type expected type of parameter
 * @return array
 * @throws coding_exception
 */
function required_param_array($parname, $type)
{
}
/**
 * Returns a particular value for the named variable, taken from
 * POST or GET, otherwise returning a given default.
 *
 * This function should be used to initialise all optional values
 * in a script that are based on parameters.  Usually it will be
 * used like this:
 *    $name = optional_param('name', 'Fred', PARAM_TEXT);
 *
 * Please note the $type parameter is now required and the value can not be array.
 *
 * @param string $parname the name of the page parameter we want
 * @param mixed  $default the default value to return if nothing is found
 * @param string $type expected type of parameter
 * @return mixed
 * @throws coding_exception
 */
function optional_param($parname, $default, $type)
{
}
/**
 * Returns a particular array value for the named variable, taken from
 * POST or GET, otherwise returning a given default.
 *
 * This function should be used to initialise all optional values
 * in a script that are based on parameters.  Usually it will be
 * used like this:
 *    $ids = optional_param('id', array(), PARAM_INT);
 *
 * Note: arrays of arrays are not supported, only alphanumeric keys with _ and - are supported
 *
 * @param string $parname the name of the page parameter we want
 * @param mixed $default the default value to return if nothing is found
 * @param string $type expected type of parameter
 * @return array
 * @throws coding_exception
 */
function optional_param_array($parname, $default, $type)
{
}
/**
 * Strict validation of parameter values, the values are only converted
 * to requested PHP type. Internally it is using clean_param, the values
 * before and after cleaning must be equal - otherwise
 * an invalid_parameter_exception is thrown.
 * Objects and classes are not accepted.
 *
 * @param mixed $param
 * @param string $type PARAM_ constant
 * @param bool $allownull are nulls valid value?
 * @param string $debuginfo optional debug information
 * @return mixed the $param value converted to PHP type
 * @throws invalid_parameter_exception if $param is not of given type
 */
function validate_param($param, $type, $allownull = \NULL_NOT_ALLOWED, $debuginfo = '')
{
}
/**
 * Makes sure array contains only the allowed types, this function does not validate array key names!
 *
 * <code>
 * $options = clean_param($options, PARAM_INT);
 * </code>
 *
 * @param array $param the variable array we are cleaning
 * @param string $type expected format of param after cleaning.
 * @param bool $recursive clean recursive arrays
 * @return array
 * @throws coding_exception
 */
function clean_param_array(array $param = \null, $type, $recursive = \false)
{
}
/**
 * Used by {@link optional_param()} and {@link required_param()} to
 * clean the variables and/or cast to specific types, based on
 * an options field.
 * <code>
 * $course->format = clean_param($course->format, PARAM_ALPHA);
 * $selectedgradeitem = clean_param($selectedgradeitem, PARAM_INT);
 * </code>
 *
 * @param mixed $param the variable we are cleaning
 * @param string $type expected format of param after cleaning.
 * @return mixed
 * @throws coding_exception
 */
function clean_param($param, $type)
{
}
/**
 * Whether the PARAM_* type is compatible in RTL.
 *
 * Being compatible with RTL means that the data they contain can flow
 * from right-to-left or left-to-right without compromising the user experience.
 *
 * Take URLs for example, they are not RTL compatible as they should always
 * flow from the left to the right. This also applies to numbers, email addresses,
 * configuration snippets, base64 strings, etc...
 *
 * This function tries to best guess which parameters can contain localised strings.
 *
 * @param string $paramtype Constant PARAM_*.
 * @return bool
 */
function is_rtl_compatible($paramtype)
{
}
/**
 * Makes sure the data is using valid utf8, invalid characters are discarded.
 *
 * Note: this function is not intended for full objects with methods and private properties.
 *
 * @param mixed $value
 * @return mixed with proper utf-8 encoding
 */
function fix_utf8($value)
{
}
/**
 * Return true if given value is integer or string with integer value
 *
 * @param mixed $value String or Int
 * @return bool true if number, false if not
 */
function is_number($value)
{
}
/**
 * Returns host part from url.
 *
 * @param string $url full url
 * @return string host, null if not found
 */
function get_host_from_url($url)
{
}
/**
 * Tests whether anything was returned by text editor
 *
 * This function is useful for testing whether something you got back from
 * the HTML editor actually contains anything. Sometimes the HTML editor
 * appear to be empty, but actually you get back a <br> tag or something.
 *
 * @param string $string a string containing HTML.
 * @return boolean does the string contain any actual content - that is text,
 * images, objects, etc.
 */
function html_is_blank($string)
{
}
/**
 * Set a key in global configuration
 *
 * Set a key/value pair in both this session's {@link $CFG} global variable
 * and in the 'config' database table for future sessions.
 *
 * Can also be used to update keys for plugin-scoped configs in config_plugin table.
 * In that case it doesn't affect $CFG.
 *
 * A NULL value will delete the entry.
 *
 * NOTE: this function is called from lib/db/upgrade.php
 *
 * @param string $name the key to set
 * @param string $value the value to set (without magic quotes)
 * @param string $plugin (optional) the plugin scope, default null
 * @return bool true or exception
 */
function set_config($name, $value, $plugin = \null)
{
}
/**
 * Get configuration values from the global config table
 * or the config_plugins table.
 *
 * If called with one parameter, it will load all the config
 * variables for one plugin, and return them as an object.
 *
 * If called with 2 parameters it will return a string single
 * value or false if the value is not found.
 *
 * NOTE: this function is called from lib/db/upgrade.php
 *
 * @static string|false $siteidentifier The site identifier is not cached. We use this static cache so
 *     that we need only fetch it once per request.
 * @param string $plugin full component name
 * @param string $name default null
 * @return mixed hash-like object or single value, return false no config found
 * @throws dml_exception
 */
function get_config($plugin, $name = \null)
{
}
/**
 * Removes a key from global configuration.
 *
 * NOTE: this function is called from lib/db/upgrade.php
 *
 * @param string $name the key to set
 * @param string $plugin (optional) the plugin scope
 * @return boolean whether the operation succeeded.
 */
function unset_config($name, $plugin = \null)
{
}
/**
 * Remove all the config variables for a given plugin.
 *
 * NOTE: this function is called from lib/db/upgrade.php
 *
 * @param string $plugin a plugin, for example 'quiz' or 'qtype_multichoice';
 * @return boolean whether the operation succeeded.
 */
function unset_all_config_for_plugin($plugin)
{
}
/**
 * Use this function to get a list of users from a config setting of type admin_setting_users_with_capability.
 *
 * All users are verified if they still have the necessary capability.
 *
 * @param string $value the value of the config setting.
 * @param string $capability the capability - must match the one passed to the admin_setting_users_with_capability constructor.
 * @param bool $includeadmins include administrators.
 * @return array of user objects.
 */
function get_users_from_config($value, $capability, $includeadmins = \true)
{
}
/**
 * Invalidates browser caches and cached data in temp.
 *
 * @return void
 */
function purge_all_caches()
{
}
/**
 * Selectively invalidate different types of cache.
 *
 * Purges the cache areas specified.  By default, this will purge all caches but can selectively purge specific
 * areas alone or in combination.
 *
 * @param bool[] $options Specific parts of the cache to purge. Valid options are:
 *        'muc'    Purge MUC caches?
 *        'theme'  Purge theme cache?
 *        'lang'   Purge language string cache?
 *        'js'     Purge javascript cache?
 *        'filter' Purge text filter cache?
 *        'other'  Purge all other caches?
 */
function purge_caches($options = [])
{
}
/**
 * Purge all non-MUC caches not otherwise purged in purge_caches.
 *
 * IMPORTANT - If you are adding anything here to do with the cache directory you should also have a look at
 * {@link phpunit_util::reset_dataroot()}
 */
function purge_other_caches()
{
}
/**
 * Get volatile flags
 *
 * @param string $type
 * @param int $changedsince default null
 * @return array records array
 */
function get_cache_flags($type, $changedsince = \null)
{
}
/**
 * Get volatile flags
 *
 * @param string $type
 * @param string $name
 * @param int $changedsince default null
 * @return string|false The cache flag value or false
 */
function get_cache_flag($type, $name, $changedsince = \null)
{
}
/**
 * Set a volatile flag
 *
 * @param string $type the "type" namespace for the key
 * @param string $name the key to set
 * @param string $value the value to set (without magic quotes) - null will remove the flag
 * @param int $expiry (optional) epoch indicating expiry - defaults to now()+ 24hs
 * @return bool Always returns true
 */
function set_cache_flag($type, $name, $value, $expiry = \null)
{
}
/**
 * Removes a single volatile flag
 *
 * @param string $type the "type" namespace for the key
 * @param string $name the key to set
 * @return bool
 */
function unset_cache_flag($type, $name)
{
}
/**
 * Garbage-collect volatile flags
 *
 * @return bool Always returns true
 */
function gc_cache_flags()
{
}
// USER PREFERENCE API.
/**
 * Refresh user preference cache. This is used most often for $USER
 * object that is stored in session, but it also helps with performance in cron script.
 *
 * Preferences for each user are loaded on first use on every page, then again after the timeout expires.
 *
 * @package  core
 * @category preference
 * @access   public
 * @param    stdClass         $user          User object. Preferences are preloaded into 'preference' property
 * @param    int              $cachelifetime Cache life time on the current page (in seconds)
 * @throws   coding_exception
 * @return   null
 */
function check_user_preferences_loaded(\stdClass $user, $cachelifetime = 120)
{
}
/**
 * Called from set/unset_user_preferences, so that the prefs can be correctly reloaded in different sessions.
 *
 * NOTE: internal function, do not call from other code.
 *
 * @package core
 * @access private
 * @param integer $userid the user whose prefs were changed.
 */
function mark_user_preferences_changed($userid)
{
}
/**
 * Sets a preference for the specified user.
 *
 * If a $user object is submitted it's 'preference' property is used for the preferences cache.
 *
 * When additional validation/permission check is needed it is better to use {@see useredit_update_user_preference()}
 *
 * @package  core
 * @category preference
 * @access   public
 * @param    string            $name  The key to set as preference for the specified user
 * @param    string            $value The value to set for the $name key in the specified user's
 *                                    record, null means delete current value.
 * @param    stdClass|int|null $user  A moodle user object or id, null means current user
 * @throws   coding_exception
 * @return   bool                     Always true or exception
 */
function set_user_preference($name, $value, $user = \null)
{
}
/**
 * Sets a whole array of preferences for the current user
 *
 * If a $user object is submitted it's 'preference' property is used for the preferences cache.
 *
 * @package  core
 * @category preference
 * @access   public
 * @param    array             $prefarray An array of key/value pairs to be set
 * @param    stdClass|int|null $user      A moodle user object or id, null means current user
 * @return   bool                         Always true or exception
 */
function set_user_preferences(array $prefarray, $user = \null)
{
}
/**
 * Unsets a preference completely by deleting it from the database
 *
 * If a $user object is submitted it's 'preference' property is used for the preferences cache.
 *
 * @package  core
 * @category preference
 * @access   public
 * @param    string            $name The key to unset as preference for the specified user
 * @param    stdClass|int|null $user A moodle user object or id, null means current user
 * @throws   coding_exception
 * @return   bool                    Always true or exception
 */
function unset_user_preference($name, $user = \null)
{
}
/**
 * Used to fetch user preference(s)
 *
 * If no arguments are supplied this function will return
 * all of the current user preferences as an array.
 *
 * If a name is specified then this function
 * attempts to return that particular preference value.  If
 * none is found, then the optional value $default is returned,
 * otherwise null.
 *
 * If a $user object is submitted it's 'preference' property is used for the preferences cache.
 *
 * @package  core
 * @category preference
 * @access   public
 * @param    string            $name    Name of the key to use in finding a preference value
 * @param    mixed|null        $default Value to be returned if the $name key is not set in the user preferences
 * @param    stdClass|int|null $user    A moodle user object or id, null means current user
 * @throws   coding_exception
 * @return   string|mixed|null          A string containing the value of a single preference. An
 *                                      array with all of the preferences or null
 */
function get_user_preferences($name = \null, $default = \null, $user = \null)
{
}
// FUNCTIONS FOR HANDLING TIME.
/**
 * Given Gregorian date parts in user time produce a GMT timestamp.
 *
 * @package core
 * @category time
 * @param int $year The year part to create timestamp of
 * @param int $month The month part to create timestamp of
 * @param int $day The day part to create timestamp of
 * @param int $hour The hour part to create timestamp of
 * @param int $minute The minute part to create timestamp of
 * @param int $second The second part to create timestamp of
 * @param int|float|string $timezone Timezone modifier, used to calculate GMT time offset.
 *             if 99 then default user's timezone is used {@link http://docs.moodle.org/dev/Time_API#Timezone}
 * @param bool $applydst Toggle Daylight Saving Time, default true, will be
 *             applied only if timezone is 99 or string.
 * @return int GMT timestamp
 */
function make_timestamp($year, $month = 1, $day = 1, $hour = 0, $minute = 0, $second = 0, $timezone = 99, $applydst = \true)
{
}
/**
 * Format a date/time (seconds) as weeks, days, hours etc as needed
 *
 * Given an amount of time in seconds, returns string
 * formatted nicely as years, days, hours etc as needed
 *
 * @package core
 * @category time
 * @uses MINSECS
 * @uses HOURSECS
 * @uses DAYSECS
 * @uses YEARSECS
 * @param int $totalsecs Time in seconds
 * @param stdClass $str Should be a time object
 * @return string A nicely formatted date/time string
 */
function format_time($totalsecs, $str = \null)
{
}
/**
 * Returns a formatted string that represents a date in user time.
 *
 * @package core
 * @category time
 * @param int $date the timestamp in UTC, as obtained from the database.
 * @param string $format strftime format. You should probably get this using
 *        get_string('strftime...', 'langconfig');
 * @param int|float|string $timezone by default, uses the user's time zone. if numeric and
 *        not 99 then daylight saving will not be added.
 *        {@link http://docs.moodle.org/dev/Time_API#Timezone}
 * @param bool $fixday If true (default) then the leading zero from %d is removed.
 *        If false then the leading zero is maintained.
 * @param bool $fixhour If true (default) then the leading zero from %I is removed.
 * @return string the formatted date/time.
 */
function userdate($date, $format = '', $timezone = 99, $fixday = \true, $fixhour = \true)
{
}
/**
 * Returns a html "time" tag with both the exact user date with timezone information
 * as a datetime attribute in the W3C format, and the user readable date and time as text.
 *
 * @package core
 * @category time
 * @param int $date the timestamp in UTC, as obtained from the database.
 * @param string $format strftime format. You should probably get this using
 *        get_string('strftime...', 'langconfig');
 * @param int|float|string $timezone by default, uses the user's time zone. if numeric and
 *        not 99 then daylight saving will not be added.
 *        {@link http://docs.moodle.org/dev/Time_API#Timezone}
 * @param bool $fixday If true (default) then the leading zero from %d is removed.
 *        If false then the leading zero is maintained.
 * @param bool $fixhour If true (default) then the leading zero from %I is removed.
 * @return string the formatted date/time.
 */
function userdate_htmltime($date, $format = '', $timezone = 99, $fixday = \true, $fixhour = \true)
{
}
/**
 * Returns a formatted date ensuring it is UTF-8.
 *
 * If we are running under Windows convert to Windows encoding and then back to UTF-8
 * (because it's impossible to specify UTF-8 to fetch locale info in Win32).
 *
 * @param int $date the timestamp - since Moodle 2.9 this is a real UTC timestamp
 * @param string $format strftime format.
 * @param int|float|string $tz the user timezone
 * @return string the formatted date/time.
 * @since Moodle 2.3.3
 */
function date_format_string($date, $format, $tz = 99)
{
}
/**
 * Given a $time timestamp in GMT (seconds since epoch),
 * returns an array that represents the Gregorian date in user time
 *
 * @package core
 * @category time
 * @param int $time Timestamp in GMT
 * @param float|int|string $timezone user timezone
 * @return array An array that represents the date in user time
 */
function usergetdate($time, $timezone = 99)
{
}
/**
 * Given a GMT timestamp (seconds since epoch), offsets it by
 * the timezone.  eg 3pm in India is 3pm GMT - 7 * 3600 seconds
 *
 * NOTE: this function does not include DST properly,
 *       you should use the PHP date stuff instead!
 *
 * @package core
 * @category time
 * @param int $date Timestamp in GMT
 * @param float|int|string $timezone user timezone
 * @return int
 */
function usertime($date, $timezone = 99)
{
}
/**
 * Get a formatted string representation of an interval between two unix timestamps.
 *
 * E.g.
 * $intervalstring = get_time_interval_string(12345600, 12345660);
 * Will produce the string:
 * '0d 0h 1m'
 *
 * @param int $time1 unix timestamp
 * @param int $time2 unix timestamp
 * @param string $format string (can be lang string) containing format chars: https://www.php.net/manual/en/dateinterval.format.php.
 * @return string the formatted string describing the time difference, e.g. '10d 11h 45m'.
 */
function get_time_interval_string(int $time1, int $time2, string $format = '') : string
{
}
/**
 * Given a time, return the GMT timestamp of the most recent midnight
 * for the current user.
 *
 * @package core
 * @category time
 * @param int $date Timestamp in GMT
 * @param float|int|string $timezone user timezone
 * @return int Returns a GMT timestamp
 */
function usergetmidnight($date, $timezone = 99)
{
}
/**
 * Returns a string that prints the user's timezone
 *
 * @package core
 * @category time
 * @param float|int|string $timezone user timezone
 * @return string
 */
function usertimezone($timezone = 99)
{
}
/**
 * Returns a float or a string which denotes the user's timezone
 * A float value means that a simple offset from GMT is used, while a string (it will be the name of a timezone in the database)
 * means that for this timezone there are also DST rules to be taken into account
 * Checks various settings and picks the most dominant of those which have a value
 *
 * @package core
 * @category time
 * @param float|int|string $tz timezone to calculate GMT time offset before
 *        calculating user timezone, 99 is default user timezone
 *        {@link http://docs.moodle.org/dev/Time_API#Timezone}
 * @return float|string
 */
function get_user_timezone($tz = 99)
{
}
/**
 * Calculates the Daylight Saving Offset for a given date/time (timestamp)
 * - Note: Daylight saving only works for string timezones and not for float.
 *
 * @package core
 * @category time
 * @param int $time must NOT be compensated at all, it has to be a pure timestamp
 * @param int|float|string $strtimezone user timezone
 * @return int
 */
function dst_offset_on($time, $strtimezone = \null)
{
}
/**
 * Calculates when the day appears in specific month
 *
 * @package core
 * @category time
 * @param int $startday starting day of the month
 * @param int $weekday The day when week starts (normally taken from user preferences)
 * @param int $month The month whose day is sought
 * @param int $year The year of the month whose day is sought
 * @return int
 */
function find_day_in_month($startday, $weekday, $month, $year)
{
}
/**
 * Calculate the number of days in a given month
 *
 * @package core
 * @category time
 * @param int $month The month whose day count is sought
 * @param int $year The year of the month whose day count is sought
 * @return int
 */
function days_in_month($month, $year)
{
}
/**
 * Calculate the position in the week of a specific calendar day
 *
 * @package core
 * @category time
 * @param int $day The day of the date whose position in the week is sought
 * @param int $month The month of the date whose position in the week is sought
 * @param int $year The year of the date whose position in the week is sought
 * @return int
 */
function dayofweek($day, $month, $year)
{
}
// USER AUTHENTICATION AND LOGIN.
/**
 * Returns full login url.
 *
 * Any form submissions for authentication to this URL must include username,
 * password as well as a logintoken generated by \core\session\manager::get_login_token().
 *
 * @return string login url
 */
function get_login_url()
{
}
/**
 * This function checks that the current user is logged in and has the
 * required privileges
 *
 * This function checks that the current user is logged in, and optionally
 * whether they are allowed to be in a particular course and view a particular
 * course module.
 * If they are not logged in, then it redirects them to the site login unless
 * $autologinguest is set and {@link $CFG}->autologinguests is set to 1 in which
 * case they are automatically logged in as guests.
 * If $courseid is given and the user is not enrolled in that course then the
 * user is redirected to the course enrolment page.
 * If $cm is given and the course module is hidden and the user is not a teacher
 * in the course then the user is redirected to the course home page.
 *
 * When $cm parameter specified, this function sets page layout to 'module'.
 * You need to change it manually later if some other layout needed.
 *
 * @package    core_access
 * @category   access
 *
 * @param mixed $courseorid id of the course or course object
 * @param bool $autologinguest default true
 * @param object $cm course module object
 * @param bool $setwantsurltome Define if we want to set $SESSION->wantsurl, defaults to
 *             true. Used to avoid (=false) some scripts (file.php...) to set that variable,
 *             in order to keep redirects working properly. MDL-14495
 * @param bool $preventredirect set to true in scripts that can not redirect (CLI, rss feeds, etc.), throws exceptions
 * @return mixed Void, exit, and die depending on path
 * @throws coding_exception
 * @throws require_login_exception
 * @throws moodle_exception
 */
function require_login($courseorid = \null, $autologinguest = \true, $cm = \null, $setwantsurltome = \true, $preventredirect = \false)
{
}
/**
 * A convenience function for where we must be logged in as admin
 * @return void
 */
function require_admin()
{
}
/**
 * This function just makes sure a user is logged out.
 *
 * @package    core_access
 * @category   access
 */
function require_logout()
{
}
/**
 * Weaker version of require_login()
 *
 * This is a weaker version of {@link require_login()} which only requires login
 * when called from within a course rather than the site page, unless
 * the forcelogin option is turned on.
 * @see require_login()
 *
 * @package    core_access
 * @category   access
 *
 * @param mixed $courseorid The course object or id in question
 * @param bool $autologinguest Allow autologin guests if that is wanted
 * @param object $cm Course activity module if known
 * @param bool $setwantsurltome Define if we want to set $SESSION->wantsurl, defaults to
 *             true. Used to avoid (=false) some scripts (file.php...) to set that variable,
 *             in order to keep redirects working properly. MDL-14495
 * @param bool $preventredirect set to true in scripts that can not redirect (CLI, rss feeds, etc.), throws exceptions
 * @return void
 * @throws coding_exception
 */
function require_course_login($courseorid, $autologinguest = \true, $cm = \null, $setwantsurltome = \true, $preventredirect = \false)
{
}
/**
 * Validates a user key, checking if the key exists, is not expired and the remote ip is correct.
 *
 * @param  string $keyvalue the key value
 * @param  string $script   unique script identifier
 * @param  int $instance    instance id
 * @return stdClass the key entry in the user_private_key table
 * @since Moodle 3.2
 * @throws moodle_exception
 */
function validate_user_key($keyvalue, $script, $instance)
{
}
/**
 * Require key login. Function terminates with error if key not found or incorrect.
 *
 * @uses NO_MOODLE_COOKIES
 * @uses PARAM_ALPHANUM
 * @param string $script unique script identifier
 * @param int $instance optional instance id
 * @param string $keyvalue The key. If not supplied, this will be fetched from the current session.
 * @return int Instance ID
 */
function require_user_key_login($script, $instance = \null, $keyvalue = \null)
{
}
/**
 * Creates a new private user access key.
 *
 * @param string $script unique target identifier
 * @param int $userid
 * @param int $instance optional instance id
 * @param string $iprestriction optional ip restricted access
 * @param int $validuntil key valid only until given data
 * @return string access key value
 */
function create_user_key($script, $userid, $instance = \null, $iprestriction = \null, $validuntil = \null)
{
}
/**
 * Delete the user's new private user access keys for a particular script.
 *
 * @param string $script unique target identifier
 * @param int $userid
 * @return void
 */
function delete_user_key($script, $userid)
{
}
/**
 * Gets a private user access key (and creates one if one doesn't exist).
 *
 * @param string $script unique target identifier
 * @param int $userid
 * @param int $instance optional instance id
 * @param string $iprestriction optional ip restricted access
 * @param int $validuntil key valid only until given date
 * @return string access key value
 */
function get_user_key($script, $userid, $instance = \null, $iprestriction = \null, $validuntil = \null)
{
}
/**
 * Modify the user table by setting the currently logged in user's last login to now.
 *
 * @return bool Always returns true
 */
function update_user_login_times()
{
}
/**
 * Determines if a user has completed setting up their account.
 *
 * The lax mode (with $strict = false) has been introduced for special cases
 * only where we want to skip certain checks intentionally. This is valid in
 * certain mnet or ajax scenarios when the user cannot / should not be
 * redirected to edit their profile. In most cases, you should perform the
 * strict check.
 *
 * @param stdClass $user A {@link $USER} object to test for the existence of a valid name and email
 * @param bool $strict Be more strict and assert id and custom profile fields set, too
 * @return bool
 */
function user_not_fully_set_up($user, $strict = \true)
{
}
/**
 * Check whether the user has exceeded the bounce threshold
 *
 * @param stdClass $user A {@link $USER} object
 * @return bool true => User has exceeded bounce threshold
 */
function over_bounce_threshold($user)
{
}
/**
 * Used to increment or reset email sent count
 *
 * @param stdClass $user object containing an id
 * @param bool $reset will reset the count to 0
 * @return void
 */
function set_send_count($user, $reset = \false)
{
}
/**
 * Increment or reset user's email bounce count
 *
 * @param stdClass $user object containing an id
 * @param bool $reset will reset the count to 0
 */
function set_bounce_count($user, $reset = \false)
{
}
/**
 * Determines if the logged in user is currently moving an activity
 *
 * @param int $courseid The id of the course being tested
 * @return bool
 */
function ismoving($courseid)
{
}
/**
 * Returns a persons full name
 *
 * Given an object containing all of the users name values, this function returns a string with the full name of the person.
 * The result may depend on system settings or language. 'override' will force the alternativefullnameformat to be used. In
 * English, fullname as well as alternativefullnameformat is set to 'firstname lastname' by default. But you could have
 * fullname set to 'firstname lastname' and alternativefullnameformat set to 'firstname middlename alternatename lastname'.
 *
 * @param stdClass $user A {@link $USER} object to get full name of.
 * @param bool $override If true then the alternativefullnameformat format rather than fullnamedisplay format will be used.
 * @return string
 */
function fullname($user, $override = \false)
{
}
/**
 * Reduces lines of duplicated code for getting user name fields.
 *
 * See also {@link user_picture::unalias()}
 *
 * @param object $addtoobject Object to add user name fields to.
 * @param object $secondobject Object that contains user name field information.
 * @param string $prefix prefix to be added to all fields (including $additionalfields) e.g. authorfirstname.
 * @param array $additionalfields Additional fields to be matched with data in the second object.
 * The key can be set to the user table field name.
 * @return object User name fields.
 */
function username_load_fields_from_object($addtoobject, $secondobject, $prefix = \null, $additionalfields = \null)
{
}
/**
 * Returns an array of values in order of occurance in a provided string.
 * The key in the result is the character postion in the string.
 *
 * @param array $values Values to be found in the string format
 * @param string $stringformat The string which may contain values being searched for.
 * @return array An array of values in order according to placement in the string format.
 */
function order_in_string($values, $stringformat)
{
}
/**
 * Returns whether a given authentication plugin exists.
 *
 * @param string $auth Form of authentication to check for. Defaults to the global setting in {@link $CFG}.
 * @return boolean Whether the plugin is available.
 */
function exists_auth_plugin($auth)
{
}
/**
 * Checks if a given plugin is in the list of enabled authentication plugins.
 *
 * @param string $auth Authentication plugin.
 * @return boolean Whether the plugin is enabled.
 */
function is_enabled_auth($auth)
{
}
/**
 * Returns an authentication plugin instance.
 *
 * @param string $auth name of authentication plugin
 * @return auth_plugin_base An instance of the required authentication plugin.
 */
function get_auth_plugin($auth)
{
}
/**
 * Returns array of active auth plugins.
 *
 * @param bool $fix fix $CFG->auth if needed. Only set if logged in as admin.
 * @return array
 */
function get_enabled_auth_plugins($fix = \false)
{
}
/**
 * Returns true if an internal authentication method is being used.
 * if method not specified then, global default is assumed
 *
 * @param string $auth Form of authentication required
 * @return bool
 */
function is_internal_auth($auth)
{
}
/**
 * Returns true if the user is a 'restored' one.
 *
 * Used in the login process to inform the user and allow him/her to reset the password
 *
 * @param string $username username to be checked
 * @return bool
 */
function is_restored_user($username)
{
}
/**
 * Returns an array of user fields
 *
 * @return array User field/column names
 */
function get_user_fieldnames()
{
}
/**
 * Returns the string of the language for the new user.
 *
 * @return string language for the new user
 */
function get_newuser_language()
{
}
/**
 * Creates a bare-bones user record
 *
 * @todo Outline auth types and provide code example
 *
 * @param string $username New user's username to add to record
 * @param string $password New user's password to add to record
 * @param string $auth Form of authentication required
 * @return stdClass A complete user object
 */
function create_user_record($username, $password, $auth = 'manual')
{
}
/**
 * Will update a local user record from an external source (MNET users can not be updated using this method!).
 *
 * @param string $username user's username to update the record
 * @return stdClass A complete user object
 */
function update_user_record($username)
{
}
/**
 * Will update a local user record from an external source (MNET users can not be updated using this method!).
 *
 * @param int $id user id
 * @return stdClass A complete user object
 */
function update_user_record_by_id($id)
{
}
/**
 * Will truncate userinfo as it comes from auth_get_userinfo (from external auth) which may have large fields.
 *
 * @param array $info Array of user properties to truncate if needed
 * @return array The now truncated information that was passed in
 */
function truncate_userinfo(array $info)
{
}
/**
 * Marks user deleted in internal user database and notifies the auth plugin.
 * Also unenrols user from all roles and does other cleanup.
 *
 * Any plugin that needs to purge user data should register the 'user_deleted' event.
 *
 * @param stdClass $user full user object before delete
 * @return boolean success
 * @throws coding_exception if invalid $user parameter detected
 */
function delete_user(\stdClass $user)
{
}
/**
 * Retrieve the guest user object.
 *
 * @return stdClass A {@link $USER} object
 */
function guest_user()
{
}
/**
 * Authenticates a user against the chosen authentication mechanism
 *
 * Given a username and password, this function looks them
 * up using the currently selected authentication mechanism,
 * and if the authentication is successful, it returns a
 * valid $user object from the 'user' table.
 *
 * Uses auth_ functions from the currently active auth module
 *
 * After authenticate_user_login() returns success, you will need to
 * log that the user has logged in, and call complete_user_login() to set
 * the session up.
 *
 * Note: this function works only with non-mnet accounts!
 *
 * @param string $username  User's username (or also email if $CFG->authloginviaemail enabled)
 * @param string $password  User's password
 * @param bool $ignorelockout useful when guessing is prevented by other mechanism such as captcha or SSO
 * @param int $failurereason login failure reason, can be used in renderers (it may disclose if account exists)
 * @param mixed logintoken If this is set to a string it is validated against the login token for the session.
 * @return stdClass|false A {@link $USER} object or false if error
 */
function authenticate_user_login($username, $password, $ignorelockout = \false, &$failurereason = \null, $logintoken = \false)
{
}
/**
 * Call to complete the user login process after authenticate_user_login()
 * has succeeded. It will setup the $USER variable and other required bits
 * and pieces.
 *
 * NOTE:
 * - It will NOT log anything -- up to the caller to decide what to log.
 * - this function does not set any cookies any more!
 *
 * @param stdClass $user
 * @return stdClass A {@link $USER} object - BC only, do not use
 */
function complete_user_login($user)
{
}
/**
 * Check a password hash to see if it was hashed using the legacy hash algorithm (md5).
 *
 * @param string $password String to check.
 * @return boolean True if the $password matches the format of an md5 sum.
 */
function password_is_legacy_hash($password)
{
}
/**
 * Compare password against hash stored in user object to determine if it is valid.
 *
 * If necessary it also updates the stored hash to the current format.
 *
 * @param stdClass $user (Password property may be updated).
 * @param string $password Plain text password.
 * @return bool True if password is valid.
 */
function validate_internal_user_password($user, $password)
{
}
/**
 * Calculate hash for a plain text password.
 *
 * @param string $password Plain text password to be hashed.
 * @param bool $fasthash If true, use a low cost factor when generating the hash
 *                       This is much faster to generate but makes the hash
 *                       less secure. It is used when lots of hashes need to
 *                       be generated quickly.
 * @return string The hashed password.
 *
 * @throws moodle_exception If a problem occurs while generating the hash.
 */
function hash_internal_user_password($password, $fasthash = \false)
{
}
/**
 * Update password hash in user object (if necessary).
 *
 * The password is updated if:
 * 1. The password has changed (the hash of $user->password is different
 *    to the hash of $password).
 * 2. The existing hash is using an out-of-date algorithm (or the legacy
 *    md5 algorithm).
 *
 * Updating the password will modify the $user object and the database
 * record to use the current hashing algorithm.
 * It will remove Web Services user tokens too.
 *
 * @param stdClass $user User object (password property may be updated).
 * @param string $password Plain text password.
 * @param bool $fasthash If true, use a low cost factor when generating the hash
 *                       This is much faster to generate but makes the hash
 *                       less secure. It is used when lots of hashes need to
 *                       be generated quickly.
 * @return bool Always returns true.
 */
function update_internal_user_password($user, $password, $fasthash = \false)
{
}
/**
 * Get a complete user record, which includes all the info in the user record.
 *
 * Intended for setting as $USER session variable
 *
 * @param string $field The user field to be checked for a given value.
 * @param string $value The value to match for $field.
 * @param int $mnethostid
 * @param bool $throwexception If true, it will throw an exception when there's no record found or when there are multiple records
 *                              found. Otherwise, it will just return false.
 * @return mixed False, or A {@link $USER} object.
 */
function get_complete_user_data($field, $value, $mnethostid = \null, $throwexception = \false)
{
}
/**
 * Validate a password against the configured password policy
 *
 * @param string $password the password to be checked against the password policy
 * @param string $errmsg the error message to display when the password doesn't comply with the policy.
 * @param stdClass $user the user object to perform password validation against. Defaults to null if not provided.
 *
 * @return bool true if the password is valid according to the policy. false otherwise.
 */
function check_password_policy($password, &$errmsg, $user = \null)
{
}
/**
 * When logging in, this function is run to set certain preferences for the current SESSION.
 */
function set_login_session_preferences()
{
}
/**
 * Delete a course, including all related data from the database, and any associated files.
 *
 * @param mixed $courseorid The id of the course or course object to delete.
 * @param bool $showfeedback Whether to display notifications of each action the function performs.
 * @return bool true if all the removals succeeded. false if there were any failures. If this
 *             method returns false, some of the removals will probably have succeeded, and others
 *             failed, but you have no way of knowing which.
 */
function delete_course($courseorid, $showfeedback = \true)
{
}
/**
 * Clear a course out completely, deleting all content but don't delete the course itself.
 *
 * This function does not verify any permissions.
 *
 * Please note this function also deletes all user enrolments,
 * enrolment instances and role assignments by default.
 *
 * $options:
 *  - 'keep_roles_and_enrolments' - false by default
 *  - 'keep_groups_and_groupings' - false by default
 *
 * @param int $courseid The id of the course that is being deleted
 * @param bool $showfeedback Whether to display notifications of each action the function performs.
 * @param array $options extra options
 * @return bool true if all the removals succeeded. false if there were any failures. If this
 *             method returns false, some of the removals will probably have succeeded, and others
 *             failed, but you have no way of knowing which.
 */
function remove_course_contents($courseid, $showfeedback = \true, array $options = \null)
{
}
/**
 * Change dates in module - used from course reset.
 *
 * @param string $modname forum, assignment, etc
 * @param array $fields array of date fields from mod table
 * @param int $timeshift time difference
 * @param int $courseid
 * @param int $modid (Optional) passed if specific mod instance in course needs to be updated.
 * @return bool success
 */
function shift_course_mod_dates($modname, $fields, $timeshift, $courseid, $modid = 0)
{
}
/**
 * This function will empty a course of user data.
 * It will retain the activities and the structure of the course.
 *
 * @param object $data an object containing all the settings including courseid (without magic quotes)
 * @return array status array of array component, item, error
 */
function reset_course_userdata($data)
{
}
/**
 * Generate an email processing address.
 *
 * @param int $modid
 * @param string $modargs
 * @return string Returns email processing address
 */
function generate_email_processing_address($modid, $modargs)
{
}
/**
 * ?
 *
 * @todo Finish documenting this function
 *
 * @param string $modargs
 * @param string $body Currently unused
 */
function moodle_process_email($modargs, $body)
{
}
// CORRESPONDENCE.
/**
 * Get mailer instance, enable buffering, flush buffer or disable buffering.
 *
 * @param string $action 'get', 'buffer', 'close' or 'flush'
 * @return moodle_phpmailer|null mailer instance if 'get' used or nothing
 */
function get_mailer($action = 'get')
{
}
/**
 * A helper function to test for email diversion
 *
 * @param string $email
 * @return bool Returns true if the email should be diverted
 */
function email_should_be_diverted($email)
{
}
/**
 * Generate a unique email Message-ID using the moodle domain and install path
 *
 * @param string $localpart An optional unique message id prefix.
 * @return string The formatted ID ready for appending to the email headers.
 */
function generate_email_messageid($localpart = \null)
{
}
/**
 * Send an email to a specified user
 *
 * @param stdClass $user  A {@link $USER} object
 * @param stdClass $from A {@link $USER} object
 * @param string $subject plain text subject line of the email
 * @param string $messagetext plain text version of the message
 * @param string $messagehtml complete html version of the message (optional)
 * @param string $attachment a file on the filesystem, either relative to $CFG->dataroot or a full path to a file in one of
 *          the following directories: $CFG->cachedir, $CFG->dataroot, $CFG->dirroot, $CFG->localcachedir, $CFG->tempdir
 * @param string $attachname the name of the file (extension indicates MIME)
 * @param bool $usetrueaddress determines whether $from email address should
 *          be sent out. Will be overruled by user profile setting for maildisplay
 * @param string $replyto Email address to reply to
 * @param string $replytoname Name of reply to recipient
 * @param int $wordwrapwidth custom word wrap width, default 79
 * @return bool Returns true if mail was sent OK and false if there was an error.
 */
function email_to_user($user, $from, $subject, $messagetext, $messagehtml = '', $attachment = '', $attachname = '', $usetrueaddress = \true, $replyto = '', $replytoname = '', $wordwrapwidth = 79)
{
}
/**
 * Check to see if a user's real email address should be used for the "From" field.
 *
 * @param  object $from The user object for the user we are sending the email from.
 * @param  object $user The user object that we are sending the email to.
 * @param  array $unused No longer used.
 * @return bool Returns true if we can use the from user's email adress in the "From" field.
 */
function can_send_from_real_email_address($from, $user, $unused = \null)
{
}
/**
 * Generate a signoff for emails based on support settings
 *
 * @return string
 */
function generate_email_signoff()
{
}
/**
 * Sets specified user's password and send the new password to the user via email.
 *
 * @param stdClass $user A {@link $USER} object
 * @param bool $fasthash If true, use a low cost factor when generating the hash for speed.
 * @return bool|string Returns "true" if mail was sent OK and "false" if there was an error
 */
function setnew_password_and_mail($user, $fasthash = \false)
{
}
/**
 * Resets specified user's password and send the new password to the user via email.
 *
 * @param stdClass $user A {@link $USER} object
 * @return bool Returns true if mail was sent OK and false if there was an error.
 */
function reset_password_and_mail($user)
{
}
/**
 * Send email to specified user with confirmation text and activation link.
 *
 * @param stdClass $user A {@link $USER} object
 * @param string $confirmationurl user confirmation URL
 * @return bool Returns true if mail was sent OK and false if there was an error.
 */
function send_confirmation_email($user, $confirmationurl = \null)
{
}
/**
 * Sends a password change confirmation email.
 *
 * @param stdClass $user A {@link $USER} object
 * @param stdClass $resetrecord An object tracking metadata regarding password reset request
 * @return bool Returns true if mail was sent OK and false if there was an error.
 */
function send_password_change_confirmation_email($user, $resetrecord)
{
}
/**
 * Sends an email containing information on how to change your password.
 *
 * @param stdClass $user A {@link $USER} object
 * @return bool Returns true if mail was sent OK and false if there was an error.
 */
function send_password_change_info($user)
{
}
/**
 * Check that an email is allowed.  It returns an error message if there was a problem.
 *
 * @param string $email Content of email
 * @return string|false
 */
function email_is_not_allowed($email)
{
}
// FILE HANDLING.
/**
 * Returns local file storage instance
 *
 * @return file_storage
 */
function get_file_storage($reset = \false)
{
}
/**
 * Returns local file storage instance
 *
 * @return file_browser
 */
function get_file_browser()
{
}
/**
 * Returns file packer
 *
 * @param string $mimetype default application/zip
 * @return file_packer
 */
function get_file_packer($mimetype = 'application/zip')
{
}
/**
 * Returns current name of file on disk if it exists.
 *
 * @param string $newfile File to be verified
 * @return string Current name of file on disk if true
 */
function valid_uploaded_file($newfile)
{
}
/**
 * Returns the maximum size for uploading files.
 *
 * There are seven possible upload limits:
 * 1. in Apache using LimitRequestBody (no way of checking or changing this)
 * 2. in php.ini for 'upload_max_filesize' (can not be changed inside PHP)
 * 3. in .htaccess for 'upload_max_filesize' (can not be changed inside PHP)
 * 4. in php.ini for 'post_max_size' (can not be changed inside PHP)
 * 5. by the Moodle admin in $CFG->maxbytes
 * 6. by the teacher in the current course $course->maxbytes
 * 7. by the teacher for the current module, eg $assignment->maxbytes
 *
 * These last two are passed to this function as arguments (in bytes).
 * Anything defined as 0 is ignored.
 * The smallest of all the non-zero numbers is returned.
 *
 * @todo Finish documenting this function
 *
 * @param int $sitebytes Set maximum size
 * @param int $coursebytes Current course $course->maxbytes (in bytes)
 * @param int $modulebytes Current module ->maxbytes (in bytes)
 * @param bool $unused This parameter has been deprecated and is not used any more.
 * @return int The maximum size for uploading files.
 */
function get_max_upload_file_size($sitebytes = 0, $coursebytes = 0, $modulebytes = 0, $unused = \false)
{
}
/**
 * Returns the maximum size for uploading files for the current user
 *
 * This function takes in account {@link get_max_upload_file_size()} the user's capabilities
 *
 * @param context $context The context in which to check user capabilities
 * @param int $sitebytes Set maximum size
 * @param int $coursebytes Current course $course->maxbytes (in bytes)
 * @param int $modulebytes Current module ->maxbytes (in bytes)
 * @param stdClass $user The user
 * @param bool $unused This parameter has been deprecated and is not used any more.
 * @return int The maximum size for uploading files.
 */
function get_user_max_upload_file_size($context, $sitebytes = 0, $coursebytes = 0, $modulebytes = 0, $user = \null, $unused = \false)
{
}
/**
 * Returns an array of possible sizes in local language
 *
 * Related to {@link get_max_upload_file_size()} - this function returns an
 * array of possible sizes in an array, translated to the
 * local language.
 *
 * The list of options will go up to the minimum of $sitebytes, $coursebytes or $modulebytes.
 *
 * If $coursebytes or $sitebytes is not 0, an option will be included for "Course/Site upload limit (X)"
 * with the value set to 0. This option will be the first in the list.
 *
 * @uses SORT_NUMERIC
 * @param int $sitebytes Set maximum size
 * @param int $coursebytes Current course $course->maxbytes (in bytes)
 * @param int $modulebytes Current module ->maxbytes (in bytes)
 * @param int|array $custombytes custom upload size/s which will be added to list,
 *        Only value/s smaller then maxsize will be added to list.
 * @return array
 */
function get_max_upload_sizes($sitebytes = 0, $coursebytes = 0, $modulebytes = 0, $custombytes = \null)
{
}
/**
 * Returns an array with all the filenames in all subdirectories, relative to the given rootdir.
 *
 * If excludefiles is defined, then that file/directory is ignored
 * If getdirs is true, then (sub)directories are included in the output
 * If getfiles is true, then files are included in the output
 * (at least one of these must be true!)
 *
 * @todo Finish documenting this function. Add examples of $excludefile usage.
 *
 * @param string $rootdir A given root directory to start from
 * @param string|array $excludefiles If defined then the specified file/directory is ignored
 * @param bool $descend If true then subdirectories are recursed as well
 * @param bool $getdirs If true then (sub)directories are included in the output
 * @param bool $getfiles  If true then files are included in the output
 * @return array An array with all the filenames in all subdirectories, relative to the given rootdir
 */
function get_directory_list($rootdir, $excludefiles = '', $descend = \true, $getdirs = \false, $getfiles = \true)
{
}
/**
 * Adds up all the files in a directory and works out the size.
 *
 * @param string $rootdir  The directory to start from
 * @param string $excludefile A file to exclude when summing directory size
 * @return int The summed size of all files and subfiles within the root directory
 */
function get_directory_size($rootdir, $excludefile = '')
{
}
/**
 * Converts bytes into display form
 *
 * @static string $gb Localized string for size in gigabytes
 * @static string $mb Localized string for size in megabytes
 * @static string $kb Localized string for size in kilobytes
 * @static string $b Localized string for size in bytes
 * @param int $size  The size to convert to human readable form
 * @return string
 */
function display_size($size)
{
}
/**
 * Cleans a given filename by removing suspicious or troublesome characters
 *
 * @see clean_param()
 * @param string $string file name
 * @return string cleaned file name
 */
function clean_filename($string)
{
}
// STRING TRANSLATION.
/**
 * Returns the code for the current language
 *
 * @category string
 * @return string
 */
function current_language()
{
}
/**
 * Returns parent language of current active language if defined
 *
 * @category string
 * @param string $lang null means current language
 * @return string
 */
function get_parent_language($lang = \null)
{
}
/**
 * Force the current language to get strings and dates localised in the given language.
 *
 * After calling this function, all strings will be provided in the given language
 * until this function is called again, or equivalent code is run.
 *
 * @param string $language
 * @return string previous $SESSION->forcelang value
 */
function force_current_language($language)
{
}
/**
 * Returns current string_manager instance.
 *
 * The param $forcereload is needed for CLI installer only where the string_manager instance
 * must be replaced during the install.php script life time.
 *
 * @category string
 * @param bool $forcereload shall the singleton be released and new instance created instead?
 * @return core_string_manager
 */
function get_string_manager($forcereload = \false)
{
}
/**
 * Returns a localized string.
 *
 * Returns the translated string specified by $identifier as
 * for $module.  Uses the same format files as STphp.
 * $a is an object, string or number that can be used
 * within translation strings
 *
 * eg 'hello {$a->firstname} {$a->lastname}'
 * or 'hello {$a}'
 *
 * If you would like to directly echo the localized string use
 * the function {@link print_string()}
 *
 * Example usage of this function involves finding the string you would
 * like a local equivalent of and using its identifier and module information
 * to retrieve it.<br/>
 * If you open moodle/lang/en/moodle.php and look near line 278
 * you will find a string to prompt a user for their word for 'course'
 * <code>
 * $string['course'] = 'Course';
 * </code>
 * So if you want to display the string 'Course'
 * in any language that supports it on your site
 * you just need to use the identifier 'course'
 * <code>
 * $mystring = '<strong>'. get_string('course') .'</strong>';
 * or
 * </code>
 * If the string you want is in another file you'd take a slightly
 * different approach. Looking in moodle/lang/en/calendar.php you find
 * around line 75:
 * <code>
 * $string['typecourse'] = 'Course event';
 * </code>
 * If you want to display the string "Course event" in any language
 * supported you would use the identifier 'typecourse' and the module 'calendar'
 * (because it is in the file calendar.php):
 * <code>
 * $mystring = '<h1>'. get_string('typecourse', 'calendar') .'</h1>';
 * </code>
 *
 * As a last resort, should the identifier fail to map to a string
 * the returned string will be [[ $identifier ]]
 *
 * In Moodle 2.3 there is a new argument to this function $lazyload.
 * Setting $lazyload to true causes get_string to return a lang_string object
 * rather than the string itself. The fetching of the string is then put off until
 * the string object is first used. The object can be used by calling it's out
 * method or by casting the object to a string, either directly e.g.
 *     (string)$stringobject
 * or indirectly by using the string within another string or echoing it out e.g.
 *     echo $stringobject
 *     return "<p>{$stringobject}</p>";
 * It is worth noting that using $lazyload and attempting to use the string as an
 * array key will cause a fatal error as objects cannot be used as array keys.
 * But you should never do that anyway!
 * For more information {@link lang_string}
 *
 * @category string
 * @param string $identifier The key identifier for the localized string
 * @param string $component The module where the key identifier is stored,
 *      usually expressed as the filename in the language pack without the
 *      .php on the end but can also be written as mod/forum or grade/export/xls.
 *      If none is specified then moodle.php is used.
 * @param string|object|array $a An object, string or number that can be used
 *      within translation strings
 * @param bool $lazyload If set to true a string object is returned instead of
 *      the string itself. The string then isn't calculated until it is first used.
 * @return string The localized string.
 * @throws coding_exception
 */
function get_string($identifier, $component = '', $a = \null, $lazyload = \false)
{
}
/**
 * Converts an array of strings to their localized value.
 *
 * @param array $array An array of strings
 * @param string $component The language module that these strings can be found in.
 * @return stdClass translated strings.
 */
function get_strings($array, $component = '')
{
}
/**
 * Prints out a translated string.
 *
 * Prints out a translated string using the return value from the {@link get_string()} function.
 *
 * Example usage of this function when the string is in the moodle.php file:<br/>
 * <code>
 * echo '<strong>';
 * print_string('course');
 * echo '</strong>';
 * </code>
 *
 * Example usage of this function when the string is not in the moodle.php file:<br/>
 * <code>
 * echo '<h1>';
 * print_string('typecourse', 'calendar');
 * echo '</h1>';
 * </code>
 *
 * @category string
 * @param string $identifier The key identifier for the localized string
 * @param string $component The module where the key identifier is stored. If none is specified then moodle.php is used.
 * @param string|object|array $a An object, string or number that can be used within translation strings
 */
function print_string($identifier, $component = '', $a = \null)
{
}
/**
 * Returns a list of charset codes
 *
 * Returns a list of charset codes. It's hardcoded, so they should be added manually
 * (checking that such charset is supported by the texlib library!)
 *
 * @return array And associative array with contents in the form of charset => charset
 */
function get_list_of_charsets()
{
}
/**
 * Returns a list of valid and compatible themes
 *
 * @return array
 */
function get_list_of_themes()
{
}
/**
 * Factory function for emoticon_manager
 *
 * @return emoticon_manager singleton
 */
function get_emoticon_manager()
{
}
// ENCRYPTION.
/**
 * rc4encrypt
 *
 * @param string $data        Data to encrypt.
 * @return string             The now encrypted data.
 */
function rc4encrypt($data)
{
}
/**
 * rc4decrypt
 *
 * @param string $data        Data to decrypt.
 * @return string             The now decrypted data.
 */
function rc4decrypt($data)
{
}
/**
 * Based on a class by Mukul Sabharwal [mukulsabharwal @ yahoo.com]
 *
 * @todo Finish documenting this function
 *
 * @param string $pwd The password to use when encrypting or decrypting
 * @param string $data The data to be decrypted/encrypted
 * @param string $case Either 'de' for decrypt or '' for encrypt
 * @return string
 */
function endecrypt($pwd, $data, $case)
{
}
// ENVIRONMENT CHECKING.
/**
 * This method validates a plug name. It is much faster than calling clean_param.
 *
 * @param string $name a string that might be a plugin name.
 * @return bool if this string is a valid plugin name.
 */
function is_valid_plugin_name($name)
{
}
/**
 * Get a list of all the plugins of a given type that define a certain API function
 * in a certain file. The plugin component names and function names are returned.
 *
 * @param string $plugintype the type of plugin, e.g. 'mod' or 'report'.
 * @param string $function the part of the name of the function after the
 *      frankenstyle prefix. e.g 'hook' if you are looking for functions with
 *      names like report_courselist_hook.
 * @param string $file the name of file within the plugin that defines the
 *      function. Defaults to lib.php.
 * @return array with frankenstyle plugin names as keys (e.g. 'report_courselist', 'mod_forum')
 *      and the function names as values (e.g. 'report_courselist_hook', 'forum_hook').
 */
function get_plugin_list_with_function($plugintype, $function, $file = 'lib.php')
{
}
/**
 * Get a list of all the plugins that define a certain API function in a certain file.
 *
 * @param string $function the part of the name of the function after the
 *      frankenstyle prefix. e.g 'hook' if you are looking for functions with
 *      names like report_courselist_hook.
 * @param string $file the name of file within the plugin that defines the
 *      function. Defaults to lib.php.
 * @param bool $include Whether to include the files that contain the functions or not.
 * @return array with [plugintype][plugin] = functionname
 */
function get_plugins_with_function($function, $file = 'lib.php', $include = \true)
{
}
/**
 * Lists plugin-like directories within specified directory
 *
 * This function was originally used for standard Moodle plugins, please use
 * new core_component::get_plugin_list() now.
 *
 * This function is used for general directory listing and backwards compatility.
 *
 * @param string $directory relative directory from root
 * @param string $exclude dir name to exclude from the list (defaults to none)
 * @param string $basedir full path to the base dir where $plugin resides (defaults to $CFG->dirroot)
 * @return array Sorted array of directory names found under the requested parameters
 */
function get_list_of_plugins($directory = 'mod', $exclude = '', $basedir = '')
{
}
/**
 * Invoke plugin's callback functions
 *
 * @param string $type plugin type e.g. 'mod'
 * @param string $name plugin name
 * @param string $feature feature name
 * @param string $action feature's action
 * @param array $params parameters of callback function, should be an array
 * @param mixed $default default value if callback function hasn't been defined, or if it retursn null.
 * @return mixed
 *
 * @todo Decide about to deprecate and drop plugin_callback() - MDL-30743
 */
function plugin_callback($type, $name, $feature, $action, $params = \null, $default = \null)
{
}
/**
 * Invoke component's callback functions
 *
 * @param string $component frankenstyle component name, e.g. 'mod_quiz'
 * @param string $function the rest of the function name, e.g. 'cron' will end up calling 'mod_quiz_cron'
 * @param array $params parameters of callback function
 * @param mixed $default default value if callback function hasn't been defined, or if it retursn null.
 * @return mixed
 */
function component_callback($component, $function, array $params = array(), $default = \null)
{
}
/**
 * Determine if a component callback exists and return the function name to call. Note that this
 * function will include the required library files so that the functioname returned can be
 * called directly.
 *
 * @param string $component frankenstyle component name, e.g. 'mod_quiz'
 * @param string $function the rest of the function name, e.g. 'cron' will end up calling 'mod_quiz_cron'
 * @return mixed Complete function name to call if the callback exists or false if it doesn't.
 * @throws coding_exception if invalid component specfied
 */
function component_callback_exists($component, $function)
{
}
/**
 * Call the specified callback method on the provided class.
 *
 * If the callback returns null, then the default value is returned instead.
 * If the class does not exist, then the default value is returned.
 *
 * @param   string      $classname The name of the class to call upon.
 * @param   string      $methodname The name of the staticically defined method on the class.
 * @param   array       $params The arguments to pass into the method.
 * @param   mixed       $default The default value.
 * @return  mixed       The return value.
 */
function component_class_callback($classname, $methodname, array $params, $default = \null)
{
}
/**
 * Checks whether a plugin supports a specified feature.
 *
 * @param string $type Plugin type e.g. 'mod'
 * @param string $name Plugin name e.g. 'forum'
 * @param string $feature Feature code (FEATURE_xx constant)
 * @param mixed $default default value if feature support unknown
 * @return mixed Feature result (false if not supported, null if feature is unknown,
 *         otherwise usually true but may have other feature-specific value such as array)
 * @throws coding_exception
 */
function plugin_supports($type, $name, $feature, $default = \null)
{
}
/**
 * Returns true if the current version of PHP is greater that the specified one.
 *
 * @todo Check PHP version being required here is it too low?
 *
 * @param string $version The version of php being tested.
 * @return bool
 */
function check_php_version($version = '5.2.4')
{
}
/**
 * Determine if moodle installation requires update.
 *
 * Checks version numbers of main code and all plugins to see
 * if there are any mismatches.
 *
 * @return bool
 */
function moodle_needs_upgrading()
{
}
/**
 * Returns the major version of this site
 *
 * Moodle version numbers consist of three numbers separated by a dot, for
 * example 1.9.11 or 2.0.2. The first two numbers, like 1.9 or 2.0, represent so
 * called major version. This function extracts the major version from either
 * $CFG->release (default) or eventually from the $release variable defined in
 * the main version.php.
 *
 * @param bool $fromdisk should the version if source code files be used
 * @return string|false the major version like '2.3', false if could not be determined
 */
function moodle_major_version($fromdisk = \false)
{
}
// MISCELLANEOUS.
/**
 * Gets the system locale
 *
 * @return string Retuns the current locale.
 */
function moodle_getlocale()
{
}
/**
 * Sets the system locale
 *
 * @category string
 * @param string $locale Can be used to force a locale
 */
function moodle_setlocale($locale = '')
{
}
/**
 * Count words in a string.
 *
 * Words are defined as things between whitespace.
 *
 * @category string
 * @param string $string The text to be searched for words. May be HTML.
 * @return int The count of words in the specified string
 */
function count_words($string)
{
}
/**
 * Count letters in a string.
 *
 * Letters are defined as chars not in tags and different from whitespace.
 *
 * @category string
 * @param string $string The text to be searched for letters. May be HTML.
 * @return int The count of letters in the specified text.
 */
function count_letters($string)
{
}
/**
 * Generate and return a random string of the specified length.
 *
 * @param int $length The length of the string to be created.
 * @return string
 */
function random_string($length = 15)
{
}
/**
 * Generate a complex random string (useful for md5 salts)
 *
 * This function is based on the above {@link random_string()} however it uses a
 * larger pool of characters and generates a string between 24 and 32 characters
 *
 * @param int $length Optional if set generates a string to exactly this length
 * @return string
 */
function complex_random_string($length = \null)
{
}
/**
 * Try to generates cryptographically secure pseudo-random bytes.
 *
 * Note this is achieved by fallbacking between:
 *  - PHP 7 random_bytes().
 *  - OpenSSL openssl_random_pseudo_bytes().
 *  - In house random generator getting its entropy from various, hard to guess, pseudo-random sources.
 *
 * @param int $length requested length in bytes
 * @return string binary data
 */
function random_bytes_emulate($length)
{
}
/**
 * Given some text (which may contain HTML) and an ideal length,
 * this function truncates the text neatly on a word boundary if possible
 *
 * @category string
 * @param string $text text to be shortened
 * @param int $ideal ideal string length
 * @param boolean $exact if false, $text will not be cut mid-word
 * @param string $ending The string to append if the passed string is truncated
 * @return string $truncate shortened string
 */
function shorten_text($text, $ideal = 30, $exact = \false, $ending = '...')
{
}
/**
 * Shortens a given filename by removing characters positioned after the ideal string length.
 * When the filename is too long, the file cannot be created on the filesystem due to exceeding max byte size.
 * Limiting the filename to a certain size (considering multibyte characters) will prevent this.
 *
 * @param string $filename file name
 * @param int $length ideal string length
 * @param bool $includehash Whether to include a file hash in the shortened version. This ensures uniqueness.
 * @return string $shortened shortened file name
 */
function shorten_filename($filename, $length = \MAX_FILENAME_SIZE, $includehash = \false)
{
}
/**
 * Shortens a given array of filenames by removing characters positioned after the ideal string length.
 *
 * @param array $path The paths to reduce the length.
 * @param int $length Ideal string length
 * @param bool $includehash Whether to include a file hash in the shortened version. This ensures uniqueness.
 * @return array $result Shortened paths in array.
 */
function shorten_filenames(array $path, $length = \MAX_FILENAME_SIZE, $includehash = \false)
{
}
/**
 * Given dates in seconds, how many weeks is the date from startdate
 * The first week is 1, the second 2 etc ...
 *
 * @param int $startdate Timestamp for the start date
 * @param int $thedate Timestamp for the end date
 * @return string
 */
function getweek($startdate, $thedate)
{
}
/**
 * Returns a randomly generated password of length $maxlen.  inspired by
 *
 * {@link http://www.phpbuilder.com/columns/jesus19990502.php3} and
 * {@link http://es2.php.net/manual/en/function.str-shuffle.php#73254}
 *
 * @param int $maxlen  The maximum size of the password being generated.
 * @return string
 */
function generate_password($maxlen = 10)
{
}
/**
 * Given a float, prints it nicely.
 * Localized floats must not be used in calculations!
 *
 * The stripzeros feature is intended for making numbers look nicer in small
 * areas where it is not necessary to indicate the degree of accuracy by showing
 * ending zeros. If you turn it on with $decimalpoints set to 3, for example,
 * then it will display '5.4' instead of '5.400' or '5' instead of '5.000'.
 *
 * @param float $float The float to print
 * @param int $decimalpoints The number of decimal places to print. -1 is a special value for auto detect (full precision).
 * @param bool $localized use localized decimal separator
 * @param bool $stripzeros If true, removes final zeros after decimal point. It will be ignored and the trailing zeros after
 *                         the decimal point are always striped if $decimalpoints is -1.
 * @return string locale float
 */
function format_float($float, $decimalpoints = 1, $localized = \true, $stripzeros = \false)
{
}
/**
 * Converts locale specific floating point/comma number back to standard PHP float value
 * Do NOT try to do any math operations before this conversion on any user submitted floats!
 *
 * @param string $localefloat locale aware float representation
 * @param bool $strict If true, then check the input and return false if it is not a valid number.
 * @return mixed float|bool - false or the parsed float.
 */
function unformat_float($localefloat, $strict = \false)
{
}
/**
 * Given a simple array, this shuffles it up just like shuffle()
 * Unlike PHP's shuffle() this function works on any machine.
 *
 * @param array $array The array to be rearranged
 * @return array
 */
function swapshuffle($array)
{
}
/**
 * Like {@link swapshuffle()}, but works on associative arrays
 *
 * @param array $array The associative array to be rearranged
 * @return array
 */
function swapshuffle_assoc($array)
{
}
/**
 * Given an arbitrary array, and a number of draws,
 * this function returns an array with that amount
 * of items.  The indexes are retained.
 *
 * @todo Finish documenting this function
 *
 * @param array $array
 * @param int $draws
 * @return array
 */
function draw_rand_array($array, $draws)
{
}
/**
 * Calculate the difference between two microtimes
 *
 * @param string $a The first Microtime
 * @param string $b The second Microtime
 * @return string
 */
function microtime_diff($a, $b)
{
}
/**
 * Given a list (eg a,b,c,d,e) this function returns
 * an array of 1->a, 2->b, 3->c etc
 *
 * @param string $list The string to explode into array bits
 * @param string $separator The separator used within the list string
 * @return array The now assembled array
 */
function make_menu_from_list($list, $separator = ',')
{
}
/**
 * Creates an array that represents all the current grades that
 * can be chosen using the given grading type.
 *
 * Negative numbers
 * are scales, zero is no grade, and positive numbers are maximum
 * grades.
 *
 * @todo Finish documenting this function or better deprecated this completely!
 *
 * @param int $gradingtype
 * @return array
 */
function make_grades_menu($gradingtype)
{
}
/**
 * make_unique_id_code
 *
 * @todo Finish documenting this function
 *
 * @uses $_SERVER
 * @param string $extra Extra string to append to the end of the code
 * @return string
 */
function make_unique_id_code($extra = '')
{
}
/**
 * Function to check the passed address is within the passed subnet
 *
 * The parameter is a comma separated string of subnet definitions.
 * Subnet strings can be in one of three formats:
 *   1: xxx.xxx.xxx.xxx/nn or xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx/nnn          (number of bits in net mask)
 *   2: xxx.xxx.xxx.xxx-yyy or  xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx::xxxx-yyyy (a range of IP addresses in the last group)
 *   3: xxx.xxx or xxx.xxx. or xxx:xxx:xxxx or xxx:xxx:xxxx.                  (incomplete address, a bit non-technical ;-)
 * Code for type 1 modified from user posted comments by mediator at
 * {@link http://au.php.net/manual/en/function.ip2long.php}
 *
 * @param string $addr    The address you are checking
 * @param string $subnetstr    The string of subnet addresses
 * @return bool
 */
function address_in_subnet($addr, $subnetstr)
{
}
/**
 * For outputting debugging info
 *
 * @param string $string The string to write
 * @param string $eol The end of line char(s) to use
 * @param string $sleep Period to make the application sleep
 *                      This ensures any messages have time to display before redirect
 */
function mtrace($string, $eol = "\n", $sleep = 0)
{
}
/**
 * Replace 1 or more slashes or backslashes to 1 slash
 *
 * @param string $path The path to strip
 * @return string the path with double slashes removed
 */
function cleardoubleslashes($path)
{
}
/**
 * Is the current ip in a given list?
 *
 * @param string $list
 * @return bool
 */
function remoteip_in_list($list)
{
}
/**
 * Returns most reliable client address
 *
 * @param string $default If an address can't be determined, then return this
 * @return string The remote IP address
 */
function getremoteaddr($default = '0.0.0.0')
{
}
/**
 * Cleans an ip address. Internal addresses are now allowed.
 * (Originally local addresses were not allowed.)
 *
 * @param string $addr IPv4 or IPv6 address
 * @param bool $compress use IPv6 address compression
 * @return string normalised ip address string, null if error
 */
function cleanremoteaddr($addr, $compress = \false)
{
}
/**
 * Is IP address a public address?
 *
 * @param string $ip The ip to check
 * @return bool true if the ip is public
 */
function ip_is_public($ip)
{
}
/**
 * This function will make a complete copy of anything it's given,
 * regardless of whether it's an object or not.
 *
 * @param mixed $thing Something you want cloned
 * @return mixed What ever it is you passed it
 */
function fullclone($thing)
{
}
/**
 * Used to make sure that $min <= $value <= $max
 *
 * Make sure that value is between min, and max
 *
 * @param int $min The minimum value
 * @param int $value The value to check
 * @param int $max The maximum value
 * @return int
 */
function bounded_number($min, $value, $max)
{
}
/**
 * Check if there is a nested array within the passed array
 *
 * @param array $array
 * @return bool true if there is a nested array false otherwise
 */
function array_is_nested($array)
{
}
/**
 * get_performance_info() pairs up with init_performance_info()
 * loaded in setup.php. Returns an array with 'html' and 'txt'
 * values ready for use, and each of the individual stats provided
 * separately as well.
 *
 * @return array
 */
function get_performance_info()
{
}
/**
 * Renames a file or directory to a unique name within the same directory.
 *
 * This function is designed to avoid any potential race conditions, and select an unused name.
 *
 * @param string $filepath Original filepath
 * @param string $prefix Prefix to use for the temporary name
 * @return string|bool New file path or false if failed
 * @since Moodle 3.10
 */
function rename_to_unused_name(string $filepath, string $prefix = '_temp_')
{
}
/**
 * Delete directory or only its content
 *
 * @param string $dir directory path
 * @param bool $contentonly
 * @return bool success, true also if dir does not exist
 */
function remove_dir($dir, $contentonly = \false)
{
}
/**
 * Detect if an object or a class contains a given property
 * will take an actual object or the name of a class
 *
 * @param mix $obj Name of class or real object to test
 * @param string $property name of property to find
 * @return bool true if property exists
 */
function object_property_exists($obj, $property)
{
}
/**
 * Converts an object into an associative array
 *
 * This function converts an object into an associative array by iterating
 * over its public properties. Because this function uses the foreach
 * construct, Iterators are respected. It works recursively on arrays of objects.
 * Arrays and simple values are returned as is.
 *
 * If class has magic properties, it can implement IteratorAggregate
 * and return all available properties in getIterator()
 *
 * @param mixed $var
 * @return array
 */
function convert_to_array($var)
{
}
/**
 * Detect a custom script replacement in the data directory that will
 * replace an existing moodle script
 *
 * @return string|bool full path name if a custom script exists, false if no custom script exists
 */
function custom_script_path()
{
}
/**
 * Returns whether or not the user object is a remote MNET user. This function
 * is in moodlelib because it does not rely on loading any of the MNET code.
 *
 * @param object $user A valid user object
 * @return bool        True if the user is from a remote Moodle.
 */
function is_mnet_remote_user($user)
{
}
/**
 * This function will search for browser prefereed languages, setting Moodle
 * to use the best one available if $SESSION->lang is undefined
 */
function setup_lang_from_browser()
{
}
/**
 * Check if $url matches anything in proxybypass list
 *
 * Any errors just result in the proxy being used (least bad)
 *
 * @param string $url url to check
 * @return boolean true if we should bypass the proxy
 */
function is_proxybypass($url)
{
}
/**
 * Check if the passed navigation is of the new style
 *
 * @param mixed $navigation
 * @return bool true for yes false for no
 */
function is_newnav($navigation)
{
}
/**
 * Checks whether the given variable name is defined as a variable within the given object.
 *
 * This will NOT work with stdClass objects, which have no class variables.
 *
 * @param string $var The variable name
 * @param object $object The object to check
 * @return boolean
 */
function in_object_vars($var, $object)
{
}
/**
 * Returns an array without repeated objects.
 * This function is similar to array_unique, but for arrays that have objects as values
 *
 * @param array $array
 * @param bool $keepkeyassoc
 * @return array
 */
function object_array_unique($array, $keepkeyassoc = \true)
{
}
/**
 * Is a userid the primary administrator?
 *
 * @param int $userid int id of user to check
 * @return boolean
 */
function is_primary_admin($userid)
{
}
/**
 * Returns the site identifier
 *
 * @return string $CFG->siteidentifier, first making sure it is properly initialised.
 */
function get_site_identifier()
{
}
/**
 * Check whether the given password has no more than the specified
 * number of consecutive identical characters.
 *
 * @param string $password   password to be checked against the password policy
 * @param integer $maxchars  maximum number of consecutive identical characters
 * @return bool
 */
function check_consecutive_identical_characters($password, $maxchars)
{
}
/**
 * Helper function to do partial function binding.
 * so we can use it for preg_replace_callback, for example
 * this works with php functions, user functions, static methods and class methods
 * it returns you a callback that you can pass on like so:
 *
 * $callback = partial('somefunction', $arg1, $arg2);
 *     or
 * $callback = partial(array('someclass', 'somestaticmethod'), $arg1, $arg2);
 *     or even
 * $obj = new someclass();
 * $callback = partial(array($obj, 'somemethod'), $arg1, $arg2);
 *
 * and then the arguments that are passed through at calltime are appended to the argument list.
 *
 * @param mixed $function a php callback
 * @param mixed $arg1,... $argv arguments to partially bind with
 * @return array Array callback
 */
function partial()
{
}
/**
 * helper function to load up and initialise the mnet environment
 * this must be called before you use mnet functions.
 *
 * @return mnet_environment the equivalent of old $MNET global
 */
function get_mnet_environment()
{
}
/**
 * during xmlrpc server code execution, any code wishing to access
 * information about the remote peer must use this to get it.
 *
 * @return mnet_remote_client the equivalent of old $MNETREMOTE_CLIENT global
 */
function get_mnet_remote_client()
{
}
/**
 * during the xmlrpc server code execution, this will be called
 * to setup the object returned by {@link get_mnet_remote_client}
 *
 * @param mnet_remote_client $client the client to set up
 * @throws moodle_exception
 */
function set_mnet_remote_client($client)
{
}
/**
 * return the jump url for a given remote user
 * this is used for rewriting forum post links in emails, etc
 *
 * @param stdclass $user the user to get the idp url for
 */
function mnet_get_idp_jump_url($user)
{
}
/**
 * Gets the homepage to use for the current user
 *
 * @return int One of HOMEPAGE_*
 */
function get_home_page()
{
}
/**
 * Gets the name of a course to be displayed when showing a list of courses.
 * By default this is just $course->fullname but user can configure it. The
 * result of this function should be passed through print_string.
 * @param stdClass|core_course_list_element $course Moodle course object
 * @return string Display name of course (either fullname or short + fullname)
 */
function get_course_display_name_for_list($course)
{
}
/**
 * Safe analogue of unserialize() that can only parse arrays
 *
 * Arrays may contain only integers or strings as both keys and values. Nested arrays are allowed.
 * Note: If any string (key or value) has semicolon (;) as part of the string parsing will fail.
 * This is a simple method to substitute unnecessary unserialize() in code and not intended to cover all possible cases.
 *
 * @param string $expression
 * @return array|bool either parsed array or false if parsing was impossible.
 */
function unserialize_array($expression)
{
}
/**
 * Get human readable name describing the given callable.
 *
 * This performs syntax check only to see if the given param looks like a valid function, method or closure.
 * It does not check if the callable actually exists.
 *
 * @param callable|string|array $callable
 * @return string|bool Human readable name of callable, or false if not a valid callable.
 */
function get_callable_name($callable)
{
}
/**
 * Tries to guess if $CFG->wwwroot is publicly accessible or not.
 * Never put your faith on this function and rely on its accuracy as there might be false positives.
 * It just performs some simple checks, and mainly is used for places where we want to hide some options
 * such as site registration when $CFG->wwwroot is not publicly accessible.
 * Good thing is there is no false negative.
 * Note that it's possible to force the result of this check by specifying $CFG->site_is_public in config.php
 *
 * @return bool
 */
function site_is_public()
{
}
/**
 * Default exception handler.
 *
 * @param Exception $ex
 * @return void -does not return. Terminates execution!
 */
function default_exception_handler($ex)
{
}
/**
 * Default error handler, prevents some white screens.
 * @param int $errno
 * @param string $errstr
 * @param string $errfile
 * @param int $errline
 * @return bool false means use default error handler
 */
function default_error_handler($errno, $errstr, $errfile, $errline)
{
}
/**
 * Unconditionally abort all database transactions, this function
 * should be called from exception handlers only.
 * @return void
 */
function abort_all_db_transactions()
{
}
/**
 * This function encapsulates the tests for whether an exception was thrown in
 * early init -- either during setup.php or during init of $OUTPUT.
 *
 * If another exception is thrown then, and if we do not take special measures,
 * we would just get a very cryptic message "Exception thrown without a stack
 * frame in Unknown on line 0". That makes debugging very hard, so we do take
 * special measures in default_exception_handler, with the help of this function.
 *
 * @param array $backtrace the stack trace to analyse.
 * @return boolean whether the stack trace is somewhere in output initialisation.
 */
function is_early_init($backtrace)
{
}
/**
 * Abort execution by throwing of a general exception,
 * default exception handler displays the error message in most cases.
 *
 * @param string $errorcode The name of the language string containing the error message.
 *      Normally this should be in the error.php lang file.
 * @param string $module The language file to get the error message from.
 * @param string $link The url where the user will be prompted to continue.
 *      If no url is provided the user will be directed to the site index page.
 * @param object $a Extra words and phrases that might be required in the error string
 * @param string $debuginfo optional debugging information
 * @return void, always throws exception!
 */
function print_error($errorcode, $module = 'error', $link = '', $a = \null, $debuginfo = \null)
{
}
/**
 * Returns detailed information about specified exception.
 * @param exception $ex
 * @return object
 */
function get_exception_info($ex)
{
}
/**
 * Generate a V4 UUID.
 *
 * Unique is hard. Very hard. Attempt to use the PECL UUID function if available, and if not then revert to
 * constructing the uuid using mt_rand.
 *
 * It is important that this token is not solely based on time as this could lead
 * to duplicates in a clustered environment (especially on VMs due to poor time precision).
 *
 * @see https://tools.ietf.org/html/rfc4122
 *
 * @deprecated since Moodle 3.8 MDL-61038 - please do not use this function any more.
 * @see \core\uuid::generate()
 *
 * @return string The uuid.
 */
function generate_uuid()
{
}
/**
 * Returns the Moodle Docs URL in the users language for a given 'More help' link.
 *
 * There are three cases:
 *
 * 1. In the normal case, $path will be a short relative path 'component/thing',
 * like 'mod/folder/view' 'group/import'. This gets turned into an link to
 * MoodleDocs in the user's language, and for the appropriate Moodle version.
 * E.g. 'group/import' may become 'http://docs.moodle.org/2x/en/group/import'.
 * The 'http://docs.moodle.org' bit comes from $CFG->docroot.
 *
 * This is the only option that should be used in standard Moodle code. The other
 * two options have been implemented because they are useful for third-party plugins.
 *
 * 2. $path may be an absolute URL, starting http:// or https://. In this case,
 * the link is used as is.
 *
 * 3. $path may start %%WWWROOT%%, in which case that is replaced by
 * $CFG->wwwroot to make the link.
 *
 * @param string $path the place to link to. See above for details.
 * @return string The MoodleDocs URL in the user's language. for example @link http://docs.moodle.org/2x/en/$path}
 */
function get_docs_url($path = \null)
{
}
/**
 * Formats a backtrace ready for output.
 *
 * This function does not include function arguments because they could contain sensitive information
 * not suitable to be exposed in a response.
 *
 * @param array $callers backtrace array, as returned by debug_backtrace().
 * @param boolean $plaintext if false, generates HTML, if true generates plain text.
 * @return string formatted backtrace, ready for output.
 */
function format_backtrace($callers, $plaintext = \false)
{
}
/**
 * This function makes the return value of ini_get consistent if you are
 * setting server directives through the .htaccess file in apache.
 *
 * Current behavior for value set from php.ini On = 1, Off = [blank]
 * Current behavior for value set from .htaccess On = On, Off = Off
 * Contributed by jdell @ unr.edu
 *
 * @param string $ini_get_arg The argument to get
 * @return bool True for on false for not
 */
function ini_get_bool($ini_get_arg)
{
}
/**
 * This function verifies the sanity of PHP configuration
 * and stops execution if anything critical found.
 */
function setup_validate_php_configuration()
{
}
/**
 * Initialise global $CFG variable.
 * @private to be used only from lib/setup.php
 */
function initialise_cfg()
{
}
/**
 * Initialises $FULLME and friends. Private function. Should only be called from
 * setup.php.
 */
function initialise_fullme()
{
}
/**
 * Initialises $FULLME and friends for command line scripts.
 * This is a private method for use by initialise_fullme.
 */
function initialise_fullme_cli()
{
}
/**
 * Get the URL that PHP/the web server thinks it is serving. Private function
 * used by initialise_fullme. In your code, use $PAGE->url, $SCRIPT, etc.
 * @return array in the same format that parse_url returns, with the addition of
 *      a 'fullpath' element, which includes any slasharguments path.
 */
function setup_get_remote_url()
{
}
/**
 * Try to work around the 'max_input_vars' restriction if necessary.
 */
function workaround_max_input_vars()
{
}
/**
 * Merge parsed POST chunks.
 *
 * NOTE: this is not perfect, but it should work in most cases hopefully.
 *
 * @param array $target
 * @param array $values
 */
function merge_query_params(array &$target, array $values)
{
}
/**
 * Initializes our performance info early.
 *
 * Pairs up with get_performance_info() which is actually
 * in moodlelib.php. This function is here so that we can
 * call it before all the libs are pulled in.
 *
 * @uses $PERF
 */
function init_performance_info()
{
}
/**
 * Indicates whether we are in the middle of the initial Moodle install.
 *
 * Very occasionally it is necessary avoid running certain bits of code before the
 * Moodle installation has completed. The installed flag is set in admin/index.php
 * after Moodle core and all the plugins have been installed, but just before
 * the person doing the initial install is asked to choose the admin password.
 *
 * @return boolean true if the initial install is not complete.
 */
function during_initial_install()
{
}
/**
 * Function to raise the memory limit to a new value.
 * Will respect the memory limit if it is higher, thus allowing
 * settings in php.ini, apache conf or command line switches
 * to override it.
 *
 * The memory limit should be expressed with a constant
 * MEMORY_STANDARD, MEMORY_EXTRA or MEMORY_HUGE.
 * It is possible to use strings or integers too (eg:'128M').
 *
 * @param mixed $newlimit the new memory limit
 * @return bool success
 */
function raise_memory_limit($newlimit)
{
}
/**
 * Function to reduce the memory limit to a new value.
 * Will respect the memory limit if it is lower, thus allowing
 * settings in php.ini, apache conf or command line switches
 * to override it
 *
 * The memory limit should be expressed with a string (eg:'64M')
 *
 * @param string $newlimit the new memory limit
 * @return bool
 */
function reduce_memory_limit($newlimit)
{
}
/**
 * Converts numbers like 10M into bytes.
 *
 * @param string $size The size to be converted
 * @return int
 */
function get_real_size($size = 0)
{
}
/**
 * Try to disable all output buffering and purge
 * all headers.
 *
 * @access private to be called only from lib/setup.php !
 * @return void
 */
function disable_output_buffering()
{
}
/**
 * Check whether a major upgrade is needed.
 *
 * That is defined as an upgrade that changes something really fundamental
 * in the database, so nothing can possibly work until the database has
 * been updated, and that is defined by the hard-coded version number in
 * this function.
 *
 * @return bool
 */
function is_major_upgrade_required()
{
}
/**
 * Redirect to the Notifications page if a major upgrade is required, and
 * terminate the current user session.
 */
function redirect_if_major_upgrade_required()
{
}
/**
 * Makes sure that upgrade process is not running
 *
 * To be inserted in the core functions that can not be called by pluigns during upgrade.
 * Core upgrade should not use any API functions at all.
 * See {@link http://docs.moodle.org/dev/Upgrade_API#Upgrade_code_restrictions}
 *
 * @throws moodle_exception if executed from inside of upgrade script and $warningonly is false
 * @param bool $warningonly if true displays a warning instead of throwing an exception
 * @return bool true if executed from outside of upgrade process, false if from inside upgrade process and function is used for warning only
 */
function upgrade_ensure_not_running($warningonly = \false)
{
}
/**
 * Function to check if a directory exists and by default create it if not exists.
 *
 * Previously this was accepting paths only from dataroot, but we now allow
 * files outside of dataroot if you supply custom paths for some settings in config.php.
 * This function does not verify that the directory is writable.
 *
 * NOTE: this function uses current file stat cache,
 *       please use clearstatcache() before this if you expect that the
 *       directories may have been removed recently from a different request.
 *
 * @param string $dir absolute directory path
 * @param boolean $create directory if does not exist
 * @param boolean $recursive create directory recursively
 * @return boolean true if directory exists or created, false otherwise
 */
function check_dir_exists($dir, $create = \true, $recursive = \true)
{
}
/**
 * Create a new unique directory within the specified directory.
 *
 * @param string $basedir The directory to create your new unique directory within.
 * @param bool $exceptiononerror throw exception if error encountered
 * @return string The created directory
 * @throws invalid_dataroot_permissions
 */
function make_unique_writable_directory($basedir, $exceptiononerror = \true)
{
}
/**
 * Create a directory and make sure it is writable.
 *
 * @private
 * @param string $dir  the full path of the directory to be created
 * @param bool $exceptiononerror throw exception if error encountered
 * @return string|false Returns full path to directory if successful, false if not; may throw exception
 */
function make_writable_directory($dir, $exceptiononerror = \true)
{
}
/**
 * Protect a directory from web access.
 * Could be extended in the future to support other mechanisms (e.g. other webservers).
 *
 * @private
 * @param string $dir  the full path of the directory to be protected
 */
function protect_directory($dir)
{
}
/**
 * Create a directory under dataroot and make sure it is writable.
 * Do not use for temporary and cache files - see make_temp_directory() and make_cache_directory().
 *
 * @param string $directory  the full path of the directory to be created under $CFG->dataroot
 * @param bool $exceptiononerror throw exception if error encountered
 * @return string|false Returns full path to directory if successful, false if not; may throw exception
 */
function make_upload_directory($directory, $exceptiononerror = \true)
{
}
/**
 * Get a per-request storage directory in the tempdir.
 *
 * The directory is automatically cleaned up during the shutdown handler.
 *
 * @param   bool    $exceptiononerror throw exception if error encountered
 * @param   bool    $forcecreate Force creation of a new parent directory
 * @return  string  Returns full path to directory if successful, false if not; may throw exception
 */
function get_request_storage_directory($exceptiononerror = \true, bool $forcecreate = \false)
{
}
/**
 * Create a per-request directory and make sure it is writable.
 * This can only be used during the current request and will be tidied away
 * automatically afterwards.
 *
 * A new, unique directory is always created within a shared base request directory.
 *
 * In some exceptional cases an alternative base directory may be required. This can be accomplished using the
 * $forcecreate parameter. Typically this will only be requried where the file may be required during a shutdown handler
 * which may or may not be registered after a previous request directory has been created.
 *
 * @param   bool    $exceptiononerror throw exception if error encountered
 * @param   bool    $forcecreate Force creation of a new parent directory
 * @return  string  The full path to directory if successful, false if not; may throw exception
 */
function make_request_directory($exceptiononerror = \true, bool $forcecreate = \false)
{
}
/**
 * Get the full path of a directory under $CFG->backuptempdir.
 *
 * @param string $directory  the relative path of the directory under $CFG->backuptempdir
 * @return string|false Returns full path to directory given a valid string; otherwise, false.
 */
function get_backup_temp_directory($directory)
{
}
/**
 * Create a directory under $CFG->backuptempdir and make sure it is writable.
 *
 * Do not use for storing generic temp files - see make_temp_directory() instead for this purpose.
 *
 * Backup temporary files must be on a shared storage.
 *
 * @param string $directory  the relative path of the directory to be created under $CFG->backuptempdir
 * @param bool $exceptiononerror throw exception if error encountered
 * @return string|false Returns full path to directory if successful, false if not; may throw exception
 */
function make_backup_temp_directory($directory, $exceptiononerror = \true)
{
}
/**
 * Create a directory under tempdir and make sure it is writable.
 *
 * Where possible, please use make_request_directory() and limit the scope
 * of your data to the current HTTP request.
 *
 * Do not use for storing cache files - see make_cache_directory(), and
 * make_localcache_directory() instead for this purpose.
 *
 * Temporary files must be on a shared storage, and heavy usage is
 * discouraged due to the performance impact upon clustered environments.
 *
 * @param string $directory  the full path of the directory to be created under $CFG->tempdir
 * @param bool $exceptiononerror throw exception if error encountered
 * @return string|false Returns full path to directory if successful, false if not; may throw exception
 */
function make_temp_directory($directory, $exceptiononerror = \true)
{
}
/**
 * Create a directory under cachedir and make sure it is writable.
 *
 * Note: this cache directory is shared by all cluster nodes.
 *
 * @param string $directory  the full path of the directory to be created under $CFG->cachedir
 * @param bool $exceptiononerror throw exception if error encountered
 * @return string|false Returns full path to directory if successful, false if not; may throw exception
 */
function make_cache_directory($directory, $exceptiononerror = \true)
{
}
/**
 * Create a directory under localcachedir and make sure it is writable.
 * The files in this directory MUST NOT change, use revisions or content hashes to
 * work around this limitation - this means you can only add new files here.
 *
 * The content of this directory gets purged automatically on all cluster nodes
 * after calling purge_all_caches() before new data is written to this directory.
 *
 * Note: this local cache directory does not need to be shared by cluster nodes.
 *
 * @param string $directory the relative path of the directory to be created under $CFG->localcachedir
 * @param bool $exceptiononerror throw exception if error encountered
 * @return string|false Returns full path to directory if successful, false if not; may throw exception
 */
function make_localcache_directory($directory, $exceptiononerror = \true)
{
}
/**
 * Webserver access user logging
 */
function set_access_log_user()
{
}