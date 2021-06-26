# Trinity Home Page v2

Full-width home page design featuring a video banner.

## Dependencies

This plugin requires [Advanced Custom Fields
Pro](https://www.advancedcustomfields.com/pro) to be installed and activated.

## Working with ACF

This plugin uses ACF to save user-generated content, and to fetch that content
from the database. The plugin provides its own ACF field groups.

The `acf/php` directory contains PHP code that registers all the ACF fields that
the plugin uses. However, ACF field groups created from PHP code will not
display in the list of field groups in the WordPress admin area. This means that
the field groups used by this plugin aren't editable using the ACF UI, which
makes it considerably harder to make changes to ACF field groups.

To make life easier, the `acf/json` directory contains a JSON export of each
field group used by this plugin. These JSON representations of the ACF field
groups should have a corresponding PHP version. For example, the file
`banner.json` is located at `acf/json/banner.json`, and the corresponding PHP
file is located at `acf/php/banner.php`.

So, how does having a redundant JSON file make it easier to edit ACF? **The JSON
version can be imported into the development environment. Once imported, the
field groups will show up in the field group list, and can be edited using the
ACF UI.**

### Modifying existing field groups

After you've imported a field group using an ACF JSON file and made changes to
it, you'll need to export the ACF code and save it in the appropriate location
inside the `acf` directory.

To export, go to the `Custom Fields → Tools` section of the admin area, and
perform these steps:

1. Export the JSON version, and save it to the correct location in `acf/json`.
   Unless you are adding a brand new field group, this will involve overwriting
   one of the existing files in that directory.
2. Generate the PHP code, and copy it to the clipboard.
3. Open the appropriate file in the `acf/php` directory and replace the PHP code
   with what you copied to your clipboard. Make sure not to remove the opening
   PHP tag or namespace declaration.
4. Towards the bottom of the file, you'll see an array key called `location`.
   This `location` array **must** be modified – details
   [below](#how-to-update-the-location-array).

The PHP and JSON versions of a field group should be identical. If you're
exporting one, it's a good idea to export the other one too, which should
prevent them from ever getting out-of-sync.

### How to update the `location` array

The `location` array tells ACF where and when to load the ACF field group. In
the case of this plugin, we want to load our ACF field groups only when the
current page is using the template provided by our plugin ("Home Page v2"). If
a page uses that template, we want our field groups to be displayed.

When the PHP code is generated during export, the `location` array looks
something like this:

```php
'location' => array(
  array(
    array(
      'param' => 'page_template',
      'operator' => '==',
      'value' => '/path/to/plugin/templates/home-page-v2.php',
    ),
  ),
),
```

There is a problem with this, though. The value `value` key is a hard-coded path
which indicates the location of the "Home Page v2" template. The problem is that
the actual path to this template file will vary in different environments. The
generated path is local to the development environment, and unless the path is
the same across all environments, this will break outside of the development
environment.

If this were to break as I described, you would notice that no ACF field groups
are shown when the "Home Page v2" template is selected.

To fix this issue, replace the value of the `value` key with the following
method call:

```php
'location' => array(
  array(
    array(
      'param' => 'page_template',
      'operator' => '==',
      'value' => Template::absolute_path(),
    ),
  ),
),
```

The call to `Template::absolute_path()` uses WordPress APIs to dynamically build
the correct path to the template file, and will ensure that the plugin's ACF
field groups display correctly.
