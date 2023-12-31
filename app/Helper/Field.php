<?php

namespace Helper;

/**
 * to create dynamic fields for modules
 */
class Field
{
    public static $months = [
        "1" => 'يناير',
        "2" => 'فبراير',
        "3" => 'مارس',
        "4" => 'أبريل',
        "5" => 'مايو',
        "6" => 'يونيو',
        "7" => 'يوليو',
        "8" => 'أغسطس',
        "9" => 'سبتمبر',
        "10" => 'أكتوبر',
        "11" => 'نوفمبر',
        "12" => 'ديسمبر'
    ];

    public static $hijriMonths = [
        "1" => 'محرم',
        "2" => 'صفر',
        "3" => 'ربيع الأول',
        "4" => 'ربيع الثاني',
        "5" => 'جمادى الأول',
        "6" => 'جمادى الآخرة',
        "7" => 'رجب',
        "8" => 'شعبان',
        "9" => 'رمضان',
        "10" => 'شوال',
        "11" => 'ذو القعدة',
        "12" => 'ذو الحجة'
    ];

    function __construct()
    {
    }

    private static function hasError($name)
    {
        if (session()->has('errors')) {
            if (session()->get('errors')->has($name)) {
                return 'has-error';
            }
        }
    }

    /**
     * @param $name
     * @return string
     */
    private static function getError($name)
    {
        if (session()->has('errors')) {
            $error = session()->get('errors')->first($name);
            return '<span class="help-block"><strong>' . $error . '</strong></span>';
        }
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @return string
     */
    public static function text($name, $label, $value = null, $required = 'true')
    {
        return view('layouts.partials.form-fields.text', compact('name', 'label', 'value', 'required'));
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @return string
     */
    public static function email($name, $label, $value = null, $required = 'true')
    {
        return view('layouts.partials.form-fields.email', compact('name', 'label', 'value', 'required'));
    }

    /**
     * @param $name
     * @param $label
     * @return string
     */
    public static function number($name, $label, $value = null, $required = 'true')
    {
        return view('layouts.partials.form-fields.number', compact('name', 'label', 'value', 'required'));
    }

    /**
     * @param $name
     * @param $label
     * @return string
     */
    public static function password($name, $label, $required = 'true')
    {
        return view('layouts.partials.form-fields.password', compact('name', 'label', 'required'));
    }

    /**
     * @param $name
     * @param $label
     * @param $options
     * @param string $plugin
     * @param string $placeholder
     * @param null $selected
     * @return string
     */
    public static function select($name, $label, $options, $selected = null, $required = 'true')
    {
        $placeholder = __('admin_panel.choose');
        return view('layouts.partials.form-fields.select', compact('name', 'label', 'options', 'selected', 'placeholder','required'));
    }

    /**
     * @param $name
     * @param $label
     * @param $options
     * @param null $value
     * @return string
     */
    public static function checkBox($name, $label, $options, $value = null, $required = 'true')
    {
        return view('layouts.partials.form-fields.check-box', compact('name', 'label', 'options','required'));
    }
    /**
     * @param $name
     * @param $label
     * @param $check -> checked
     */
    public static function radio($name, $label, $options, $checked = null, $required = 'true')
    {
        return view('layouts.partials.form-fields.radio', compact('name', 'label', 'options', 'checked','required'));
    }

        /**
     * @param $name
     * @param $label
     * @return string
     */
    public static function textarea($name, $label, $value = null, $required = 'true')
    {
        return view('layouts.partials.form-fields.textarea', compact('name', 'label', 'value','required'));
    }

        /**
     * @param $name
     * @param $label
     * @return string
     */
    public static function fileWithPreview($name, $label, $multiFile = false, $required = 'true')
    {

        return view('layouts.partials.form-fields.file-with-preview', compact('name', 'label', 'multiFile','required'));
    }


    /**
     * @param $name
     * @param $label
     * @param $options
     * @param string $plugin
     * @param string $placeholder
     * @param null $selected
     * @return string
     */
    public static function multiFileUpload($name, $label, $plugin = "file_upload_preview", $required = 'true')
    {
        return view('layouts.partials.form-fields.multiFile-upload', compact('name', 'label', 'plugin', 'required'));
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @return string
     */
    public static function dateTime($name, $label, $value = null, $required = 'true')
    {
        return view('layouts.partials.form-fields.date-time', compact('name', 'label', 'value', 'required'));
    }

        /**
     * @param $name
     * @param $label
     * @param $plugin
     * @param $max
     * @param $min
     * @param $value
     * @return string
     */
    public static function dateRange($name, $label, $value = null, $max = null, $min = null, $required = 'true')
    {
        return view('layouts.partials.form-fields.date-range', compact('name', 'label', 'value', 'max', 'min', 'required'));
    }
}
