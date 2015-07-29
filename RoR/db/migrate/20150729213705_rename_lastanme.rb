class RenameLastanme < ActiveRecord::Migration
  def change
  	rename_column :users,:lastanme,:lastname
  end
end
