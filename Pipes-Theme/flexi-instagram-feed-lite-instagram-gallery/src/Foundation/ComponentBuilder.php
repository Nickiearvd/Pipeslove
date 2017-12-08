<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

class ComponentBuilder
{
    /**
     *  Create component builder.
     */
    public function __construct()
    {
    }

    /**
     *  Generate attributes for.
     *
     *  @param string   $attrs  Attributes array.
     *
     *  @return string  Returns an array with generated attributes.
     */
    public function attributes($attrs)
    {
        $result = [];

        foreach ($attrs as $key => $value)
        {
            if ($value === null)
            {
                continue;
            }

            if ($key === 'toggled')
            {
                $result[$key] = 'checked="checked"';
            }
            else
            {
                $result[$key] = "$key=\"$value\"";
            }
        }

        return $result;
    }

    /**
     *  Generate HTML for input-switch.
     *
     *  @param string   $id         Input id.
     *  @param string   $name       Name.
     *  @param boolean  $toggled    Whether is toggled.
     *  @param boolean  $disabled   Whether is disabled.
     *
     *  @return string  Returns the generated HTML.
     */
    public function input_switch($id, $name = null, $toggled = false, $disabled = false)
    {
        $name = (is_string($name) ? ' name="' . $name . '"' : '');
        $toggled = ($toggled ? ' checked="checked"' : '');
        $disabled = ($disabled ? ' disabled="disabled"' : '');

        return (
            "<label for=\"{$id}\" class=\"flexi-input-switch-holder\">" .
                "<input type=\"checkbox\" id=\"{$id}\"{$name}{$toggled}{$disabled} />" .
                "<span class=\"flexi-input-switch\">" .
                    "<span class=\"flexi-thumb\"></span>" .
                "</span>" .
            "</label>"
        );
    }

    /**
     *  Generate HTML for input checkbox.
     *
     *  @param string   $id         Input id.
     *  @param string   $caption    Caption.
     *  @param boolean  $checked    Whether is checked.
     *  @param boolean  $disabled   Whether is disabled.
     *
     *  @return string  Retuns the generated HTML.
     */
    public function checkbox($id, $caption = null, $checked = false, $disabled = false)
    {
        if (is_array($id))
        {
            $attrs = array_merge(
            [
                'class' => '',
                'for'   => $id['id']
            ], $id);

            $checked = (isset($id['checked']) ? $id['checked'] : false);
            $disabled = (isset($id['disabled']) ? $id['disabled'] : false);
            $caption = $attrs['caption'];
            $attrs['class'] = 'flexi-checkbox' . (!empty($attrs['class']) ? ' ' . $attrs['class'] : '');

            unset($attrs['id']);
            unset($attrs['caption']);
            unset($attrs['checked']);
        }
        else
        {
            $attrs =
            [
                'class'  => 'flexi-checkbox',
                'for'    => $id
            ];
        }

        $checked = ($checked ? ' checked="checked"' : '');
        $disabled = ($disabled ? ' disabled="disabled"' : '');

        return (
            '<label ' . implode(' ', $this->attributes($attrs)) . '>' .
                '<span class="flexi-caption">' . $caption . '</span>' .
                '<input type="checkbox" id="' . $attrs['for'] .'"' . $checked . $disabled .' />' .
                '<span class="flexi-checkmark"></span>' .
            '</label>'
        );
    }

    /**
     *  Generate HTML for checkbox group.
     *
     *  @param string   $attrs  Attributes.
     *
     *  @return string  Retuns the generated HTML.
     */
    public function checkbox_group($attrs)
    {
        $content = '';

        foreach ($attrs['items'] as $item)
        {
            $content .= $this->checkbox($item);
        }

        unset($attrs['items']);

        $attrs['class'] = 'flexi-checkbox-group' . (!empty($attrs['class']) ? ' ' . $attrs['class'] : '');

        return '<div ' . implode(' ', $this->attributes($attrs)) . '>' . $content . '</div>';
    }

    /**
     *  Generate HTML for input.
     *
     *  @param string   $type       Input type.
     *  @param string   $id         Input id.
     *  @param string   $name       Name.
     *  @param string   $value      Value.
     *  @param boolean  $disabled   Whether is disabled.
     *
     *  @return string  Returns the generated HTML.
     */
    public function input($type, $id = null, $name = null, $value = null, $disabled = false)
    {
        if (is_array($type))
        {
            $attrs = array_merge(
            [
                'type'  => 'text',
                'class' => '',
            ], $type);
        }
        else
        {
            $attrs =
            [
                'type'  => $type,
                'id'    => $id,
                'name'  => $name,
                'value' => $value
            ];
        }

        return '<input ' . implode(' ', $this->attributes($attrs)) . ' />';
    }

    /**
     *  Generate HTML for text input.
     *
     *  @param string   $id         Input id.
     *  @param string   $name       Name.
     *  @param string   $value      Value.
     *  @param boolean  $disabled   Whether is disabled.
     *
     *  @return string  Returns the generated HTML.
     */
    public function input_text($id, $name = null, $value = null, $disabled = false)
    {
        if (is_array($id))
        {
            $attrs = $id;
            $attrs['type'] = 'text';
            $attrs['class'] = 'flexi-text-field' . (!empty($attrs['class']) ? ' ' . $attrs['class'] : '');
        }
        else
        {
            $attrs = [
                'type'      => 'text',
                'class'     => 'flexi-text-field',
                'id'        => $id,
                'name'      => $name,
                'value'     => $value,
                'disabled'  => $disabled
            ];
        }

        return $this->input($attrs);
    }

    /**
     *  Generate HTML for color input.
     *
     *  @param string   $id         Input id.
     *  @param string   $name       Name.
     *  @param string   $value      Value.
     *
     *  @return string  Returns the generated HTML.
     */
    public function input_color($id, $name = null, $value = null)
    {
        if (is_array($id))
        {
            $attrs = $id;
            $attrs['type'] = 'text';
            $attrs['class'] = 'flexi-color-field' . (!empty($attrs['class']) ? ' ' . $attrs['class'] : '');
        }
        else
        {
            $attrs = [
                'type'  => 'text',
                'class' => 'flexi-color-field',
                'id'    => $id,
                'name'  => $name,
                'value' => $value
            ];
        }

        return (
            '<div class="flexi-input-color-holder">' .
                '<span class="flexi-input-color-spot"></span>' .
                $this->input($attrs) .
                (empty($attrs['disabled']) || !$attrs['disabled'] ?
                    '<div class="flexi-color-picker" tabindex="1" style="display: none;">' .
                        '<a href="#" class="flexi-color-picker-close"></a>' .
                        '<div class="flexi-color-picker-colorlayer">' .
                            '<div class="flexi-color-picker-colorlayer-overlay">' .
                                '<div class="flexi-color-picker-colorlayer-select"></div>' .
                            '</div>' .
                        '</div>' .
                        '<div class="flexi-color-picker-hue">' .
                            '<div class="flexi-color-picker-hue-select"></div>' .
                        '</div>' .
                    '</div>' : '') .
            '</div>'
        );
    }

    /**
     *  Generate HTML for select.
     *
     *  @param string   $id         Input id.
     *  @param string   $name       Name.
     *  @param array    $options    Value.
     *
     *  @return string  Returns the generated HTML.
     */
    public function select($id, $name = null, $options = null)
    {
        if (is_array($id))
        {
            $options = $id['options'];

            unset($id['options']);

            $attrs = array_merge(
            [
                'class' => '',
            ], $id);

            $attrs['class'] = 'flexi-select-field' . (!empty($attrs['class']) ? ' ' . $attrs['class'] : '');
        }
        else
        {
            $attrs =
            [
                'class' => 'flexi-select-field',
                'id'    => $id,
                'name'  => $name
            ];
        }

        $options_html = '';

        foreach ($options as $key => $value)
        {
            $options_html .= '<option value="' . $key . '">' . $value . '</option>';
        }

        return '<select ' . implode(' ', $this->attributes($attrs)) . '>' . $options_html . '</select>';
    }

    /**
     *  Generate HTML for textarea.
     *
     *  @param string   $id         Input id.
     *  @param string   $name       Name.
     *  @param array    $value      Value.
     *
     *  @return string  Returns the generated HTML.
     */
    public function textarea($id, $name = null, $value = null)
    {
        if (is_array($id))
        {
            $value = (isset($id['value']) ? $id['value'] : '');
            unset($id['value']);

            $attrs = array_merge(
            [
                'class' => '',
            ], $id);

            $attrs['class'] = 'flexi-textarea' . (!empty($attrs['class']) ? ' ' . $attrs['class'] : '');
        }
        else
        {
            $attrs =
            [
                'class' => 'flexi-textarea',
                'id'    => $id,
                'name'  => $name
            ];
        }


        return '<textarea ' . implode(' ', $this->attributes($attrs)) . '>' . $value . '</textarea>';
    }

    /**
     *  Generate HTML for button.
     *
     *  @param string   $id         Input id.
     *  @param string   $caption    Button caption.
     *
     *  @return string  Returns the generated HTML.
     */
    public function button($id, $caption = null)
    {
        if (is_array($id))
        {
            $caption = (isset($id['caption']) ? $id['caption'] : '');

            unset($id['caption']);

            $attrs = array_merge([
                'href'  => '#',
                'class' => ''
            ], $id);

            $attrs['class'] = 'flexi-button' . (!empty($attrs['class']) ? ' ' . $attrs['class'] : '');
        }
        else
        {
            $attrs =
            [
                'href'  => '#',
                'class' => 'flexi-button',
                'id'    => $id
            ];
        }

        return '<a ' . implode(' ', $this->attributes($attrs)) . '>' . $caption .'</a>';
    }

    /**
     *  Generate HTML for progress-button.
     *
     *  @param string   $id         Input id.
     *  @param string   $caption    Button caption.
     *
     *  @return string  Returns the generated HTML.
     */
    public function progress_button($id, $caption = null)
    {
        if (is_array($id))
        {
            $caption = (isset($id['caption']) ? $id['caption'] : '');

            unset($id['caption']);

            $attrs = array_merge([
                'href'  => '#',
                'class' => ''
            ], $id);

            $attrs['class'] = 'flexi-progress-button flexi-button' . (!empty($attrs['class']) ? ' ' . $attrs['class'] : '');
        }
        else
        {
            $attrs =
            [
                'href'  => '#',
                'class' => 'flexi-progress-button flexi-button',
                'id'    => $id
            ];
        }

        return (
            '<a ' . implode(' ', $this->attributes($attrs)) . '>' .
                '<span class="flexi-progress-button-caption">' . $caption . '</span>' .
                '<svg class="progress-circle" width="38" height="38"><path d="M19,1.5c9.7,0,17.5,7.8,17.5,17.5S28.7,36.5,19,36.5S1.5,28.7,1.5,19S9.3,1.5,19,1.5z" /></svg>' .
                '<svg class="checkmark" width="38" height="38"><path d="M16.5,27l10.6-16.1"/><path d="M16.5,27L10.6,22"/></svg>' .
                '<svg class="cross" width="38" height="38"><path d="M19,19l-8-8"/><path d="M19,19l8,8"/><path d="M19,19l-8,8"/><path d="M19,19l8-8"/></svg>' .
            '</a>');

        return '<a ' . implode(' ', $this->attributes($attrs)) . '>' . $caption .'</a>';
    }
}
