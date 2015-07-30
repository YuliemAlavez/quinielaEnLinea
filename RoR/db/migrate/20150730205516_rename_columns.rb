class RenameColumns < ActiveRecord::Migration
  def change
  	rename_column :games, :scoreLocalTeam, :scoreLocalTeam
  	rename_column :games, :scoreVisitingTeam, :scorevisitingteam
  end
end
