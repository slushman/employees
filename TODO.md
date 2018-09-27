Reconsider fields and metaboxes.

When a new field is created, nothing should happen in the constructor.

Once an instance of the field is created:
	1) Set the context
	2) Set the attributes, including new attributes specifically for that field type.
		This will require rethinking how to remove empty attributes.
		Will there need to be a separate default attributes array?
			If so, how do we add new defaults for specific field types?
			If not, do we clean the attributes array or check for empty attribute values as it is output into the element?
	3) Set the properties, including properties specifically for that field type.
	4) Output

I think this will help testability.

Use the admin\class-fields-metabox.php to actually display the fields, similar to how its currently done in the admin.



For metabox output:

Should the P tags here be in views? Should there be logic built into the fields that allows for different wrapping elements?




Taxonomy

* Get sorting working on the columns: first name, last name, display order