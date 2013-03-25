<?php

class VP_Util_Reflection
{

	public static function is_multiselectable($object)
	{
		if(is_object($object))
		{
			if($object instanceof VP_MultiSelectable)
				return true;
		}
		elseif(is_string($object))
		{
			$class = self::field_class_from_type($object);
			if(function_exists('class_implements'))
			{
				$interfaces = class_implements($class);
				if(isset($interfaces['VP_MultiSelectable']))
					return true;
			}
			else
			{
				$dummy = new $class;
				if($dummy instanceof VP_MultiSelectable)
					return true;
				unset($dummy);
			}
		}
		return false;
	}


	public static function field_type_from_class($class)
	{
		$prefix = array('VP_Control_Field_', 'VP_Option_Control_Field_');
		return strtolower(str_replace($prefix, '', $class));
	}

	public static function field_class_from_type($type)
	{
		// default prefix
		$prefix = 'VP_Control_Field_';

		// special case
		if($type === 'impexp')
			$prefix = 'VP_Option_Control_Field_';
			
		$class = $prefix . $type;
		return $class;
	}

}