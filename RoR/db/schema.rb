# encoding: UTF-8
# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 20150803172652) do

  create_table "games", force: :cascade do |t|
    t.integer  "season_id"
    t.integer  "scorelocalteam",    default: -1
    t.integer  "scorevisitingteam", default: -1
    t.datetime "game_at"
    t.datetime "created_at"
    t.datetime "updated_at"
    t.integer  "localteam_id"
    t.integer  "visitingteam_id"
  end

  create_table "predictions", force: :cascade do |t|
    t.integer  "user_id"
    t.integer  "game_id"
    t.integer  "scorelocalteam",    default: 0
    t.integer  "double",            default: 0
    t.integer  "scorevisitingteam", default: 0
    t.datetime "prediction_at"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "seasons", force: :cascade do |t|
    t.string   "name"
    t.datetime "seasonbegin"
    t.datetime "seasonend"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "teams", force: :cascade do |t|
    t.string   "name"
    t.string   "image"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "users", force: :cascade do |t|
    t.string   "name"
    t.string   "lastname"
    t.string   "username"
    t.string   "email"
    t.string   "password_digest"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

end
