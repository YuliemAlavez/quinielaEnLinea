class ChangeColumnScorelocalteamAndScorevisitingteam < ActiveRecord::Migration
  def change
  	change_column :games, :scorelocalteam, :integer, :default => -1
  	change_column :games, :scorevisitingteam, :integer, :default => -1
  end
end
