##Api

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
