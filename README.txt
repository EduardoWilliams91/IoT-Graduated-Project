Blecon_SQL.txt- Creates a table in a database containing fields for device ID, timestamp and location. Timestamp is made the primary key. 

In100_for_blecon.cfg - Upload to the IN100 config tool and run in RAM on IN100 device. Makes IN100 discoverable by a blecon hotspot which allows you to register it to a blecon network.
Device spotted events can then be routed to Blecon networks. Note that no data is able to be sent to Blecon networks with the IN100. At the time of this writing it can only be spotted 
by a Blecon hotspot

Blecon_event_handler.php - Post to personal website and route blecon events to the event handler. It accepts json post requests from the blecon network and extracts timestamp, 
device ID and location. Database credentials need to be added to this file and the appropriate table needs to be created in that database using the Blecon_SQL file in this repository

Bluetooth_Button.cfg- Set up a custom configuration to trigger an event when the button is pressed. After the button is pressed, it will trigger a broadcast. The pin status will change from LOW to HIGH once the button is pressed.
