class CreateSeason < ActiveRecord::Migration
  def change
    create_table :seasons do |t|
    	t.string :name    	
    	t.datetime :seasonbegin
    	t.datetime :seasonend
    	t.timestamps
    end
  end
end
