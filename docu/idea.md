#SAR App

##Components
###SAR-Sever

Adminstration
	User & authentication logic

	Dashboard

	Operation areas
		Create
		Update
		Delete
	Vehicles
		Create
		Update
		Delete
Api

	Version Prefix (backward compatibility) 
	Init
		Update Token if necessary
		Return
			Vehicles
				vehicle_locations
			Cases (not archived)
				case_locations
			Messages (last n)
	Update
		Update Token if necessary
		Return
			Vehicles
				vehicle_locations
			Cases (where updated_at > last_updated)
				case_locations
			Messages (where updated_at > last_updated)

	Case
		Get
		Post
		Put
	
	Vehicle
		Get
		
	Vehicle position
		Post


###SAR-Client

Navigation
	Show vehicles as filters (with time of last connection)
	Show case statuses as filters
	Show connection status of the client (online/offline)

Caseview
	Clickable reload function
	Update case
	Show possible ETA of all vehicles in the DB
	Filter cases

Mapview
	Offline map functionality
	Show cases
	Show vehicles
	Filter cases and vehicles

Chat & Log
	Show messages
	Write Messages
	Filter function (only messages, only log, all)
	Hashtag function for cases to mark cases



##Milestones

Api 0.1 

Connect client to the new API

Set up sandbox environment for tests and training (will be used by crews for training also)

Set up the live system

First tests in operational usage
