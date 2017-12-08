<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Facades\Component;

class FieldBuilder
{
    /**
     *  Create field builder.
     */
    public function __construct()
    {
    }

    /**
     *  Generate fields.
     *
     *  @param array    $fields Array of fields to be generated.
     *
     *  @return string  Returns the generated HTML.
     */
    public function generate_fields($fields)
    {
        $fields_html = '';

        foreach ($fields as $id => $field)
        {
            $field['id'] = $id;
            $field_function_name = $field['type'] . '_field';
            unset($field['type']);
            $fields_html .= call_user_func(array($this, str_replace('-', '_', $field_function_name)), $field);
        }

        return $fields_html;
    }

    /**
     *  Generate field container.
     *
     *  @param string   $label          Field label.
     *  @param string   $content        Field content.
     *  @param string   $description    Field description.
     *  @param array    $attrs          Attributes added on field parent.
     *
     *  @return string  Returns the generated HTML.
     */
    public function generate_field_container($label, $content, $description = null, $attrs = null)
    {
        $attrs = (isset($attrs) ? $attrs : []);
        $attrs['class'] = 'flexi-field' . (isset($attrs['class']) ? ' ' . $attrs['class'] : '');
        $attrs = (is_array($attrs) ? implode(' ', Component::attributes($attrs)) : '');

        return (
            '<div ' . $attrs .'>' .
                (!empty($label) ? "<label>{$label}</label>" : '') .
                $content .
                (!empty($description) ? "<p class=\"flexi-description\">{$description}</p>" : '') .
            '</div>'
        );
    }

    /**
     *  Generate switch field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function switch_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'name'          => null,
            'toggled'       => false,
            'description'   => null
        ], $attrs));

        $field_attrs = null;

        $is_disabled = !empty($attrs['only-in-pro']);

        if ($is_disabled)
        {
            $field_attrs = ['class' => 'flexi-disabled flexi-only-in-pro'];
        }

        return $this->generate_field_container($label, Component::input_switch($id, $name, $toggled, $is_disabled), $description, $field_attrs);
    }

    /**
     *  Generate text field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function input_text_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));

        unset($attrs['label']);
        unset($attrs['description']);

        $field_attrs = null;

        $is_disabled = !empty($attrs['only-in-pro']);

        if ($is_disabled)
        {
            $field_attrs = ['class' => 'flexi-disabled flexi-only-in-pro'];
            $attrs['disabled'] = true;
        }

        return $this->generate_field_container($label, Component::input_text($attrs), $description, $field_attrs);
    }

    /**
     *  Generate color field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function input_color_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));

        unset($attrs['label']);
        unset($attrs['description']);

        $field_attrs = null;

        $is_disabled = !empty($attrs['only-in-pro']);

        if ($is_disabled)
        {
            $field_attrs = ['class' => 'flexi-disabled flexi-only-in-pro'];
            $attrs['disabled'] = true;
        }

        return $this->generate_field_container($label, Component::input_color($attrs), $description, $field_attrs);
    }

    /**
     *  Generate select field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function select_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));

        unset($attrs['label']);
        unset($attrs['description']);

        $field_attrs = null;

        $is_disabled = !empty($attrs['only-in-pro']);

        if ($is_disabled)
        {
            $field_attrs = ['class' => 'flexi-disabled flexi-only-in-pro'];
            $attrs['disabled'] = true;
        }

        return $this->generate_field_container($label, Component::select($attrs), $description, $field_attrs);
    }

    /**
     *  Generate profanity field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function profanity_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));

        unset($attrs['label']);
        unset($attrs['description']);

        $field_attrs = ['class' => 'flexi-profanity-field'];

        $is_disabled = !empty($attrs['only-in-pro']);

        if ($is_disabled)
        {
            $field_attrs['class'] .= ' flexi-disabled flexi-only-in-pro';
            $attrs['disabled'] = true;
        }


        $content = '<a href="#" class="flexi-button flexi-profanity-edit">Edit</a>' .
                   (!empty($description) ? "<p class=\"flexi-description\">{$description}</p>" : '') .
                   Component::textarea($attrs);

        return $this->generate_field_container($label, $content, null, $field_attrs);
    }

    /**
     *  Generate checkbox field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function checkbox_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));

        unset($attrs['label']);
        unset($attrs['description']);

        return $this->generate_field_container($label, Component::checkbox($attrs));
    }

    /**
     *  Generate checkbox group field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function checkbox_group_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));

        $description = (!empty($attrs['description']) ? $attrs['description'] : '');

        unset($attrs['label']);
        unset($attrs['description']);

        return $this->generate_field_container($label, Component::checkbox_group($attrs) . '<p class="flexi-description" style="max-width: 280px">' . $description . '</p>');
    }

    /**
     *  Generate button field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function button_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));

        unset($attrs['label']);
        unset($attrs['description']);

        $field_attrs = null;

        $is_disabled = !empty($attrs['only-in-pro']);

        if ($is_disabled)
        {
            $field_attrs = ['class' => 'flexi-disabled flexi-only-in-pro'];
            $attrs['disabled'] = true;
        }

        return $this->generate_field_container($label, Component::button($attrs), null, $field_attrs);
    }

    /**
     *  Generate progress button field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function progress_button_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));

        unset($attrs['label']);
        unset($attrs['description']);

        $field_attrs = null;

        $is_disabled = !empty($attrs['only-in-pro']);

        if ($is_disabled)
        {
            $field_attrs = ['class' => 'flexi-disabled flexi-only-in-pro'];
            $attrs['disabled'] = true;
        }

        return $this->generate_field_container($label, Component::progress_button($attrs), null, $field_attrs);
    }

    /**
     *  Generate textarea field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function textarea_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));


        $content = '';

        $expandable = isset($attrs['expandable']) && $attrs['expandable'];

        if ($expandable)
        {
            $content = '<a href="#" class="flexi-button flexi-textarea-edit">Edit</a>' .
                        (!empty($description) ? "<p class=\"flexi-description\">{$description}</p>" : '');
        }

        unset($attrs['label']);
        unset($attrs['description']);
        unset($attrs['expandable']);

        $field_attrs = ($expandable ? ['class' => 'flexi-expandable'] : ['class' => '']);

        $is_disabled = !empty($attrs['only-in-pro']);

        if ($is_disabled)
        {
            $field_attrs['class'] .= ' flexi-disabled flexi-only-in-pro';
            $attrs['disabled'] = true;
        }

        return $this->generate_field_container($label, $content . Component::textarea($attrs), null, $field_attrs);
    }

    /**
     *  Generate feeds field.
     *
     *  @param array    $attrs  Field attributes.
     *
     *  @return string  Returns the generated HTML.
     */
    public function feeds_field($attrs)
    {
        extract(array_merge(
        [
            'label'         => '',
            'description'   => null
        ], $attrs));

        unset($attrs['label']);
        unset($attrs['description']);

        $field_attrs = ['id' => $attrs['id'], 'class' => 'flexi-feeds-field'];

        $is_disabled = !empty($attrs['only-in-pro']);

        if ($is_disabled)
        {
            $field_attrs['class'] .= ' flexi-only-in-pro';
        }

        $content = Component::button([
            // 'class'         => 'flexi-add-feed',
            'caption'       => '+ add',
            'only-in-pro'   => (!empty($attrs['only-in-pro']) ? $attrs['only-in-pro'] : null)
        ]);
        $content .= (!empty($description) ? "<p class=\"flexi-description\">{$description}</p>" : '');
        $content .= '<div class="flexi-feeds">';

        if (!empty($attrs['feeds']))
        {
            foreach ($attrs['feeds'] as $feed)
            {
                $content .= '<div class="flexi-feed" data-feed="' . $feed['feed'] . '" data-network="' . $feed['network'] . '" data-type="' . $feed['type'] . '">';
                $content .=     '<span class="caption">' . $feed['value'] . '</span>';
                $content .=     '<a href="#" class="flexi-action-remove"></a>';
                $content .= '</div>';
            }
        }

        $content .= '</div>';

        return $this->generate_field_container($label, $content, null, $field_attrs);
    }
}
