<?php

class acf_field_contact extends acf_field
{

	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function __construct()
	{	$contact_options = array('name' => 'Name','email' => 'Email','phone' => 'Phone','fax' => 'Fax','address' => 'Address','city' => 'City','state' => 'State','zipcode' => 'Zip Code');
		foreach($contact_options as $option => $val)
		{
			$contact .= $option." : ".$val."\n";//.get_field($key,"options");
		}
		// vars
		$this->name = 'contact';
		$this->label = __("Contact Info",'acf');
		$this->category = __("Choice",'acf');
		$this->defaults = array(
			'layout'		=>	'horizontal',
			'choices'		=>	$contact,
			'default_value'	=>	'',
		);
		
		
		// do not delete!
    	parent::__construct();
	}
		
	
	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function create_field( $field )
	{
		// value must be array
		if( !is_array($field['value']) )
		{
			// perhaps this is a default value with new lines in it?
			if( strpos($field['value'], "\n") !== false )
			{
				// found multiple lines, explode it
				$field['value'] = explode("\n", $field['value']);
			}
			else
			{
				$field['value'] = array( $field['value'] );
			}
		}
		
		
		// trim value
		$field['value'] = array_map('trim', $field['value']);
		
		
		echo '<input type="hidden" name="' . $field['name'] . '" value="" />';
		echo '<ul class="checkbox_list ' . $field['class'] . ' ' . $field['layout'] . '">';
		
		
		// checkbox saves an array
		$field['name'] .= '[]';
		
		$contact_options = array('name' => 'Name','email' => 'Email','phone' => 'Phone','fax' => 'Fax','address' => 'Address','city' => 'City','state' => 'State','zipcode' => 'Zip Code');
		// foreach choices
		foreach($contact_options as $key => $value)
		{
			$selected = '';
			if( in_array($key, $field['value']) )
			{
				$selected = 'checked="yes"';
			}
			if( isset($field['disabled']) && in_array($key, $field['disabled']) )
			{
				$selected .= ' disabled="true"';
			}
			
			
			// ID
			// each checkbox ID is generated with the $key, however, the first checkbox must not use $key so that it matches the field's label for attribute
			$id = $field['id'];
			
			if( $key > 1 )
			{
				$id .= '-' . $key;
			}
			echo '<li><label><input id="' . $id . '" type="checkbox" class="' . $field['class'] . '" name="' . $field['name'] . '" value="' . $key . '" ' . $selected . ' />' . $value . '</label></li>';
		}
		
		echo '</ul>';
		echo '<ul class="c-list">';
		// foreach choices
		foreach($contact_options as $key => $val){
			echo '<li rel="'.$key.'">'.$val.': <strong>'.get_field($key,"options").'</strong></li>';
		}
		
		echo '</ul>';
	}
	
	
	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/
	
	function create_options( $field )
	{
		// vars
		$key = $field['name'];
		
		
		// implode checkboxes so they work in a textarea
		if( is_array($field['choices']) )
		{		
			foreach( $field['choices'] as $k => $v )
			{
				$field['choices'][ $k ] = $k . ' : ' . $v;
			}
			$field['choices'] = implode("\n", $field['choices']);
		}
		
		?>
<tr style="display:none;" class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label for=""><?php _e("Choices",'acf'); ?></label>
		<p><?php _e("Enter each choice on a new line.",'acf'); ?></p>
		<p><?php _e("For more control, you may specify both a value and label like this:",'acf'); ?></p>
		<p><?php _e("red : Red",'acf'); ?><br /><?php _e("blue : Blue",'acf'); ?></p>
	</td>
	<td>
		<?php
		
		do_action('acf/create_field', array(
			'type'	=>	'textarea',
			'class' => 	'textarea field_option-choices',
			'name'	=>	'fields['.$key.'][choices]',
			'value'	=>	$field['choices'],
		));
		
		?>
	</td>
</tr>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label for=""><?php _e("Contact Information",'acf'); ?></label>
		<p><?php _e("Each line of contact information is listed here.",'acf'); ?></p>
	</td>
	<td>
		<ul class="contact-list">
		<?php
		$contact_options = array('name' => 'Name','email' => 'Email','phone' => 'Phone','fax' => 'Fax','address' => 'Address','city' => 'City','state' => 'State','zipcode' => 'Zip Code');
		foreach($contact_options as $key => $val){
			echo '<li rel="'.$key.'">'.$val.': <strong>'.get_field($key,"options").'</strong></li>';
		}
		?>
		</ul>
	</td>
</tr>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Default Value",'acf'); ?></label>
		<p class="description"><?php _e("Enter each default value on a new line",'acf'); ?></p>
	</td>
	<td>
		<?php
		
		do_action('acf/create_field', array(
			'type'	=>	'textarea',
			'name'	=>	'fields['.$key.'][default_value]',
			'value'	=>	$field['default_value'],
		));
		
		?>
	</td>
</tr>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label for=""><?php _e("Layout",'acf'); ?></label>
	</td>
	<td>
		<?php
		
		do_action('acf/create_field', array(
			'type'	=>	'radio',
			'name'	=>	'fields['.$key.'][layout]',
			'value'	=>	$field['layout'],
			'layout' => 'horizontal', 
			'choices' => array(
				'vertical' => __("Vertical",'acf'), 
				'horizontal' => __("Horizontal",'acf')
			)
		));
		
		?>
	</td>
</tr>
		<?php
		
	}
	
}










new acf_field_contact();

?>