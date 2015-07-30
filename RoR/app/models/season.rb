class Season < ActiveRecord::Base
	has_many :games, :dependent => :destroy
	accepts_nested_attributes_for :games
end