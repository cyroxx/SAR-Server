#Databases




##emergency_cases
~~~~
| id                      | int(10) unsigned |
| boat_status             | varchar(255)     |
| boat_condition          | varchar(255)     |
| boat_type               | varchar(255)     |
| other_involved          | varchar(255)     |
| engine_working          | varchar(255)     |
| passenger_count         | int(11)          |
| women_on_board          | varchar(255)     |
| children_on_board       | varchar(255)     |
| disabled_on_board       | varchar(255)     |
| additional_informations | text             |
| operation_area          | int(11)          |
| user_id                 | int(11)          |
| created_at              | timestamp        |
| updated_at              | timestamp        |
~~~~

##emergency_case_locations
~~~~
| id                | int(10) unsigned |
| emergency_case_id | int(11)          |
| lat               | double(10,7)     |
| lon               | double(10,7)     |
| accuracy          | int(11)          |
| created_at        | timestamp        |
| updated_at        | timestamp        |
| connection_type   | varchar(60)      |
~~~~

##operation_areas
~~~~
| id                  | int(10) unsigned |
| title               | varchar(255)     |
| polygon_coordinates | text             |
| user_id             | int(11)          |
| active              | int(11)          |
| created_at          | timestamp        |
| updated_at          | timestamp        | 
~~~~

##messages
~~~~
| id           | int(10) unsigned |
| message_type | varchar(255)     |
| author_id    | int(11)          |
| text         | text             |
| seen_by      | text             |
| received_by  | text             |
| created_at   | timestamp        |
| updated_at   | timestamp        |
~~~~

##vehicles
~~~~
| id                   | int(10) unsigned |
| user_id              | int(11)          | (linked user)
| title                | varchar(255)     |
| type                 | varchar(255)     |
| sat_number           | varchar(255)     | (sat phone numer)
| public               | int(1)           |
| key                  | varchar(255)     |
| marker_color         | varchar(6)       |
| location_alarm       | tinyint(1)       | (if true location alarm for 12/24nm zone activated)
| location_alarm_mails | varchar(255)     | (mails for location alarm comma separated)
| logo_url             | varchar(255)     | (logo is scraped if logo_url is changed)
| sog                  | double(8,2)      | (spead over ground)
| created_at           | timestamp        |
| updated_at           | timestamp        |
~~~~

##vehicle_locations
~~~~
| id              | int(10) unsigned |
| vehicle_id      | int(11)          |
| lat             | double(10,7)     |
| lon             | double(10,7)     |
| connection_type | varchar(255)     |
| created_at      | timestamp        |
| updated_at      | timestamp        |
~~~~
