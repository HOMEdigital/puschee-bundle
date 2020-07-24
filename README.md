# pushee-bundle

Adds the ability to send notifications from the Contao backend to Clients how have allowed the browser to receive 
notifications via FCM.

## Installation

```
composer require home/pushee-bundle
```
Navigate to `/contao/install` and update your database.

## Usage

1. Create a new `FCM - Pushee` Frontend-Module and fill in your Firebase configuration and Cloud Messaging server key.
2. Add the created Module to the `page-layout` of your `theme`. Now clients will be prompt to enable push notifications.
3. To Send a push message, navigate to the `Push Benachrichtigung` section of the content area.
4. Enter a message `title` and `body` and click `senden`.
5. The message will then be send to all clients how have enabled to receive notifications.

## Notes

If someone enables notifications there client_id will be saved in the contao database.

After sending a push notification the result will be processed and client_id's that are no valid will be removed.

Sending push notifications is not possible when there are no clients registered, or the FCM server key is missing.
