# DB Structure

## Content

id, user_id, type, name, description, timestamps

## Derived_content

id, content_id, name, plugin

=> cascade delete for content_id

## Users

id, email, password, timestamps

## Roles

id, name, timestamps

## User_roles

id, user_id, role_id, timestamps

## Permissions

id, user_id, role_id, content_id, action, timestamps

## Plugins

id, name, active, timestamps

# Plugins

All functionality will be contained in plugins.

* MUST provide a PluginServiceProvider
* MUST define auth actions
* MUST be able to toggle on/off (db table)
* MAY define frontend and backend routes seperated (with their own controllers and views in the plugin)
* => MUST name routes and prefix MUST be plugin name
* MAY provide event listener for 'content.created'

..install functionality


## Album

Probably the most complex plugin.  

* MUST be able to set gallery image
* MUST be able to reference derived_content
* MUST provide admin

### DB Structure

#### Albums

id, name, description, content_key, timestamps

#### Album_content

id, album_id, content_id, timestamps

### Routes

* /albums


## ImageResize

Offers configurable derived content.

### DB Structure

#### Conf_image_resize

id, name, width, height, timestamps

# Themes

Should allow for theming but provide just a default basic theme.
Plugins should provide a view but a theme should be able to override it.

Controllers should return theme('view.name') instead of view('view.name')
