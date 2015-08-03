class CreatePredictions < ActiveRecord::Migration
  def change
    create_table :predictions do |t|
    	t.integer :user_id
    	t.integer :game_id    	
    	t.integer :scorelocalteam, default: 0
    	t.integer :double, default:0
    	t.integer :scorevisitingteam, default: 0
    	t.datetime :prediction_at
    	t.timestamps
    end
  end
end
