class RenameColumnScorelocalteam < ActiveRecord::Migration
  def change
  	rename_column :games, :scoreLocalTeam, :scorelocalteam
  end
end
