class Game < ActiveRecord::Base
	belongs_to :season
	belongs_to :localteam, class_name: "Team", foreign_key: "localteam_id"
	belongs_to :visitingteam, class_name: "Team", foreign_key: "visitingteam_id"

	
end 