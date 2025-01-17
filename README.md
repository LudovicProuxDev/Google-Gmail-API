# Google Gmail API

- Create and name a project in the [Google Cloud Console](https://console.cloud.google.com/projectcreate)

- Enable [Gmail API](https://console.cloud.google.com/apis/library/gmail.googleapis.com) for the project

- Go to [Credentials](https://console.cloud.google.com/apis/credentials), click on *CREATE CREDENTIALS* and follow the next instructions:

1. Select *OAuth Client ID*

2. For *Application type*, choose *Web application* and name the app

3. Add *Authorised redirect URIs* for the project

4. Click on *CREATE*

5. A popup opens after the creation of the credentials and *DOWNLOAD JSON*: the file contains the client for the web application of the project

- Get the JSON file in the project into the */clientsecret* folder

- Rename the last part 'MY-CLIENT-SECRET-JSON' of 'GOOGLE_CLIENT_FILE' constant by the whole name of the client secret file into */consts.php*
```php
<?php

define("ROUTE_INDEX", "http://" . $_SERVER['HTTP_HOST'] . "/");
define("ROUTE_OAUTH2", "http://" . $_SERVER['HTTP_HOST'] . "/oauth2.php");
define("GOOGLE_CLIENT_FILE", "clientsecret/MY-CLIENT-SECRET-JSON");

```

- Get the libraries
```bash
composer install
```

- Run the project to show the dump of emails

## Resources

https://cloud.google.com/resource-manager/docs/creating-managing-projects?hl=en

https://developers.google.com/gmail/api/reference/rest?apix=true

https://github.com/googleapis/google-api-php-client/blob/main/docs/oauth-web.md#create-authorization-credentials

https://github.com/googleapis/google-api-php-client/blob/main/docs/oauth-server.md
