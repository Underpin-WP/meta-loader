# Underpin Meta Loader

Loader That assists with accessing metadata to a WordPress website.

## Installation

### Using Composer

`composer require underpin/meta-record-type-loader`

### Manually

This plugin uses a built-in autoloader, so as long as it is required _before_
Underpin, it should work as-expected.

`require_once(__DIR__ . '/underpin-meta-record-types/meta-record-types.php');`

## Setup

1. Install Underpin. See [Underpin Docs](https://www.github.com/underpin-wp/underpin)
1. Register new metadata fields as-needed.

## Example

A very basic example could look something like this.

```php
// Register meta record type
underpin()->meta()->add( 'example-meta-field', [
	'key'           => 'unique_meta_key',
	'description'   => 'Description of the purpose of this field',
	'name'          => 'Human-readable name',
	'default_value' => false,
	'type'          => 'post', // Metadata type. Can be post or user, or any custom meta type.
] );
```

Alternatively, you can extend `Meta_Record_Type` and reference the extended class directly, like so:

```php
underpin()->meta()->add('meta-record-type-key','Namespace\To\Class');
```

## Accessing Metadata

### Basic Example

```php
// Fetch from global context
$object_id = 1;
underpin()->meta()->get_meta( 'example-meta-field',$object_id );
```

### Access when object is directly accessible

```php
// Fetch, given a meta factory
$meta = underpin()->meta()->get('example-meta-field');
$object_id = 1;

$meta->get( $object_id );
```

### Using Registry Filter method to get all user meta

```php
// Fetch all registered user meta

// Filter the registry for user meta fields.
$registered_user_meta = underpin()->meta()->filter(['type' => 'user']);
$values = [];
$user_id = 1;

foreach($registered_user_meta as $object){
  $values[underpin()->meta()->get_key($object)] = $object->get( $user_id );    
}
```

### Reset all registered post meta for a specified post

```php
// Fetch all registered post meta
// Filter the registry for post meta fields.
$registered_user_meta = underpin()->meta()->filter(['type' => 'post']);
$post_id = 1;

foreach($registered_user_meta as $object){
  $object->reset( $post_id );    
}
```