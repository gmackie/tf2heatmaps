class CreateMaps < ActiveRecord::Migration
  def change
    create_table :maps do |t|
      t.string :mapname
      t.string :version
      t.string :gametype
      t.integer :kills
      t.integer :user_id

      t.timestamps
    end
    add_index :maps, [:user_id, :created_at]
  end
end
