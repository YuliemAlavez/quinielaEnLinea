class CreateGames < ActiveRecord::Migration
  def change
    create_table :games do |t|
    	t.integer :season_id
    	t.integer :team_id, :team_id
    	t.integer :scoreLocalTeam, :scoreVisitingTeam
    	t.datetime :game_at
    	t.timestamps
    end    
  end
end
