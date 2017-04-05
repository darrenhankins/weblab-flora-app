# Flora-App
### Weblab Capstone Project Links

- [GitHub](git@github.com:darrenhankins/weblab-flora-app.git)
- [Web](http://dphankins.com/weblab-flora-app/index.php)


### Project Scope
Build responsive web UI open to the public, allowing users the ability to submit plant data (see DELIVERABLES) gathered at plant site location. Provide administrative end user the ability to view data in browser in a simple list format that can also be downloaded to a PDF or Excel file.

### Deliverables
##### Responsive user data entry form will include the following:
- Name Individual
  - User input field (1)
- Unique ID
  - Alphanumeric
  - Non-sequential
- Time Stamp
  - database assigned on data entry
- Plant Name
  - User input field (1)
- Soil Type
  - radio buttons
    - Sand
    - Silt
    - Clay
    - Loam
    - Peat
    - Gravel
    - Rocky)
- Location
  - Geo-Location via Google Maps (HTML Geolocation API)
    - **Works only on Firefox**
    - Off location - User input field (1)
- Weather Conditions
  - radio buttons
    - cloudy
    - sunny
    - rainy)
- Notes
  - User input field

### Administrative access point

1.     Password protected area (.htaccess)
  - universal user name / password
2.     Responsive design
3.     List order by database entry date
4.     Downloadable format (PDF or Excel format)

### Solution
#### Data Collection
Utilize HTML5, PHP and JavaScript to create a responsive UI form for data submission to a MySQL database.
#### Data Retrieval
Utilize .htaccess to secure administrative access point with generic user name and password. Utilize PHP to retrieve current data from the MySQL database. Utilize HTML and PHP to create a responsive UI list of the data with the ability to download data into a PDF or Excel format.
