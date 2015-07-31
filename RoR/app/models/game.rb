class Game < ActiveRecord::Base
	belongs_to :season
	belongs_to :team, class_name: "Team", foreign_key: "localteam_id"
	belongs_to :team, class_name: "Team", foreign_key: "visiting_id"

	
end 