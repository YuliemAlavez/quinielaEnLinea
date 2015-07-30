class AddColumnVisitingAndLocalTeam < ActiveRecord::Migration
  def change
  	add_column :games, :localteam_id, :integer
  	add_column :games, :visitingteam_id, :integer 
  end
end
